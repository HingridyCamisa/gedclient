<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\AvisoCobrancaView;
use App\user;
use App\Mail\ExpiraContrato;
use App\Mail\ExpiraProspecao;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Email;
use App\Mail\Geral;
use App\Jobs\SendEmailGeral;

class AvisosExpiraNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expira:avisoNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifica assim sobre os avisos a expirar nesse dia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    
    public function handle()
    {   
        $users=User::where('status',1)->get();
        $avisos = AvisoCobrancaView::expirar()->get();
        $avisosMore = AvisoCobrancaView::expirarMore()->get();

        //avisos more
        if ($avisosMore->count() != 0)
        {
            foreach ($users as $key => $user) {
                $data=[
                    'to'=> $user->email,
                    'assunto' => 'Avisos a Expirar nos proximos 30 dias',
                    'name_cliente' => $user->name,
                    'user_id' => $user->id,
                    'message' => 'This use external sorce from avisos.',
                    'table_name' => 'avisocobranca_view',
                    'table_id' => 'aviso_expirar',
                    'view_file' => 'exipiraAviso',
                    'type' => 'aviso_expirar',
                ];	

                $this->email($data,$avisosMore);
            }
        }

        if ($avisos->count() != 0)
        {
            foreach ($users as $key => $user) {
                $data=[
                    'to'=> $user->email,
                    'assunto' => 'Avisos a notificar',
                    'name_cliente' => $user->name,
                    'user_id' => $user->id,
                    'message' => 'This use external sorce from avisos.',
                    'table_name' => 'avisocobranca_view',
                    'table_id' => 'aviso_expirar',
                    'view_file' => 'exipiraAviso',
                    'type' => 'aviso_expirar',
                ];	

                $this->email($data,$avisos);
            }
        }
        
     

        $this->info('Notificacao entregue com sucesso. A Notificar: '.$avisos->count().', A expirar: '.$avisosMore->count());
    }

    private function email($data,$table_data)
    { 
        $id=Email::create($data);
        $id=$id->id;

        //Mail::to($data['to'])->send(new Geral($data));

        $emailJob = (new SendEmailGeral($data,$id,$table_data));
        dispatch($emailJob);
    }

}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Contrato;
use App\Prospecao;
use App\user;
use Illuminate\Support\Facades\Mail;
use App\Email;
use App\Mail\Geral;
use App\Jobs\SendEmailGeral;

class ExpiraNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expira:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifica assim sobre os contratos a expirar nesse dia';

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
        $contrartos=Contrato::expirarEsteMes()->get();
        $prospecao=Prospecao::expirarEsteMes()->get();
        $users=User::where('status',1)->get();

        //dd($contrartos,$prospecao);

        if ($contrartos->count() !=0)
        {
            foreach ($users as $key => $user) {
                $data=[
                    'to'=> $user->email,
                    'assunto' => 'Contratos a Expirar Este mês.',
                    'name_cliente' => $user->name,
                    'user_id' => $user->id,
                    'message' => 'This use external sorce from contrato.',
                    'table_name' => 'contrato',
                    'table_id' => 'contrato_expirar',
                    'view_file' => 'exipiraContrato',
                    'type' => 'contrato_expirar',
                ];	

                $this->email($data);
            }
        }

        
        if ($prospecao->count()!=0)
        {
            foreach ($users as $key => $user) {
                $data=[
                    'to'=> $user->email,
                    'assunto' => 'Prospeções a Espirar nos proximos 30 dias',
                    'name_cliente' => $user->name,
                    'user_id' => $user->id,
                    'message' => 'This use external sorce from prospecao.',
                    'table_name' => 'prospecao',
                    'table_id' => 'prospecao_expirar',
                    'view_file' => 'exipiraProspecao',
                    'type' => 'prospecao_expirar',
                ];	

                $this->email($data);
            }
        }
        
     

        $this->info('Notificacao entregue com sucesso ');
    }
    
    private function email($data)
    { 
        $id=Email::create($data);
        $id=$id->id;

        Mail::to($data['to'])->send(new Geral($data,$id));

        //$emailJob = (new SendEmailGeral($data,$id));
        //dispatch($emailJob);
    }
}

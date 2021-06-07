<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Contrato;
use App\Prospecao;
use App\user;
use App\Mail\ExpiraContrato;
use App\Mail\ExpiraProspecao;
use Illuminate\Support\Facades\Mail;

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
        $user=User::get()->toArray();
        $today=Carbon::today();
        $today=$today->addDays(30);
        $contrartos=Contrato::where('data_proximo_pagamento',$today)->where('status',1)->get();
        $prospecao=Prospecao::where('data_prevista_fim',$today)->where('status',1)->get();

        if ($contrartos->count()>0)
        {
            Mail::to($user)->send(new ExpiraContrato($contrartos));	
        }
        if ($prospecao->count()>0)
        {
        	Mail::to($user)->send(new ExpiraProspecao($prospecao));
        }
        
        
     

        $this->info('Notificacao entregue com sucesso '.$contrartos->count().' '.$today);
    }
}

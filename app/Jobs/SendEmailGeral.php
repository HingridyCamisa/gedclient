<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\Geral;
use App\Email;
use App\Mail\ExpiraContrato;
use App\Mail\ExpiraProspecao;
use App\Mail\ExpiraAvisos;
use App\User;

class SendEmailGeral implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $id;
    public function __construct($data,$id)
    {
       $this->data=$data; 
       $this->id=$id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        switch ($this->data['type']) {
            case 'geral':
                Mail::to($this->data['to'])->send(new Geral($this->data));
                break;
            case 'aviso_expirar':
                Mail::to($this->data['to'])->send(new ExpiraAvisos($this->data));	
                break;
            case 'contrato_expirar':
                Mail::to($this->data['to'])->send(new ExpiraContrato($this->data));	
                break;
            case 'prospecao_expirar':
                Mail::to($this->data['to'])->send(new ExpiraProspecao($this->data));	
                break;
            
            default:
                # code...
                break;
        }
        $data=Email::find($this->id);
        $data->status=0;
        $data->save();
    }
}

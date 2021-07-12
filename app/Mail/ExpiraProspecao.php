<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\Prospecao;

class ExpiraProspecao extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $messg;
    public function __construct($messg)
    {
        $this->messg=$messg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     
        $this->messg;
        
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        $data = Prospecao::where("prospecaos.status",1)
                    ->whereBetween('data_prevista_fim',[$start,$end])
                    ->get();

        
        return $this->subject($this->messg['assunto'])->from('software@amanaseguros.co.mz','AMANA SEGUROS')->replyTo('noreply@amanaseguros.co.mz', 'Amana Seguros')->view('emails.expiraProspecao',compact(['data']));
    }
}

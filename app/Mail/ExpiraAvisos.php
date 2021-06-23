<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
use App\AvisoCobrancaView;

class ExpiraAvisos extends Mailable
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
        $data = AvisoCobrancaView::expirar()->get();

        return $this->subject($this->messg['assunto'])->from('info@amanaseguros.co.mz','AMANA SEGUROS')->replyTo('noreply@amanaseguros.co.mz', 'Amana Seguros')->view('emails.exipiraAviso',compact(['data']));
    }
}

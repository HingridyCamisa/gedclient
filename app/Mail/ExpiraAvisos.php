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
    public $table_data;
    public function __construct($messg,$table_data)
    {
        $this->messg=$messg;
        $this->table_data =$table_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->messg;
        $data = $this->table_data;

        return $this->subject($this->messg['assunto'])->from('software@amanaseguros.co.mz','AMANA SEGUROS')->replyTo('noreply@amanaseguros.co.mz', 'Amana Seguros')->view('emails.exipiraAviso',compact(['data']));
    }
}

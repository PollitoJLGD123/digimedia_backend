<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendModalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $vista;
    public $number_mail;

    public function __construct($data, $vista,$number_mail)
    {
        $this->data = $data;
        $this->vista = $vista;
        $this->number_mail = $number_mail;
    }

    public function build()
    {
        return $this->subject('Gracias por contactarnos')
                    ->view($this->vista)
                    ->with('data', $this->data);
    }
}

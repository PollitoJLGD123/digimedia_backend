<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendModalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $vista;

    public function __construct($data, $vista)
    {
        $this->data = $data;
        $this->vista = $vista;
    }

    public function build()
    {
        return $this->subject('Gracias por contactarnos')
                    ->view($this->vista)
                    ->with('data', $this->data);
    }
}

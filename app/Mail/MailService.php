<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailService extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $title;
    public $image;

    public function __construct($message, $title, $image)
    {
        $this->message = is_string($message) ? $message : '';
        $this->title = is_string($title) ? $title : '';
        $this->image = is_string($image) ? $image : '';
    }

    /*public function build()
    {
        return $this->subject('Envio de Informacion Digimedia')
                    ->view('mails.mail')
                    ->with([
                        'message' => $this->$message,
                        'title' => $this->$title,
                        'image' => $this->$image,
                    ]);
    }*/
}

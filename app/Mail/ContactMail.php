<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $subjectMail;
    public string $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $request)
    {
        $this->name = $request['name'];
        $this->email = $request['email'];
        $this->subjectMail = $request['subject'];
        $this->text = $request['text'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact');
    }
}

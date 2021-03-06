<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $password)
    {
        $this->password = $password;
        $this->subject = 'Ваш пароль';
    }

    /**
     * Build the message.
     *
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.password');
    }
}

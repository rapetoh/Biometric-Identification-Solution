<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $password;
    public $nom;
    public function __construct($password,$nom)
    {
        $this->password = $password;
        $this->nom = $nom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Insctiption ID-TOGO')
                    ->view('mails.LoginMail')
                    ->with([
                        'password' => $this->password,
                        'nom'=> $this->nom,
                    ]);
    }
}

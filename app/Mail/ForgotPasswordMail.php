<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $token;

    /**
     * Create a new message instance.
     *
     * @param $email
     * @param $token
     */
    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->verificationUrl();
        dd($url);
        return $this->subject("Password Change Email")
            ->view('mail.forgot')
            ->with(['email' => $this->email, 'url'=> $url]);

    }

    protected function verificationUrl()
    {
        return route("home.confirm.code",['code'=>$this->token,'token'=> Hash::make($this->email)]);
    }
}

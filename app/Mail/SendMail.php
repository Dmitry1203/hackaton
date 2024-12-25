<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

	public $body;
    public function __construct($body, $mailTemplate)
    {
		$this->body=$body;
        $this->mailTemplate=$mailTemplate;

    }

    public function build()
    {

        $from = 'hackathonsrus@d-y.website';
        if ($this->mailTemplate == 'register'){

            return $this->from($from, 'ЛЕТС ХАК')
            ->subject('Регистрация для участия в хакатоне «ЛЕТС ХАК»')
            ->view('mail.mail-template-newreg');

        } elseif ($this->mailTemplate == 2) {

            return $this->from($from, 'ЛЕТС ХАК')
            ->subject('Ссылка для сброса пароля в хакатоне «ЛЕТС ХАК»')
            ->view('mail.mail-template-forgetlink');

        } elseif ($this->mailTemplate == 3) {

            return $this->from($from, 'ЛЕТС ХАК')
            ->subject('Ваш новый пароль в хакатоне «ЛЕТС ХАК»')
            ->view('mail.mail-template-newpass');

        } elseif ($this->mailTemplate == 4) {

            return $this->from($from, 'ЛЕТС ХАК')
            ->subject('Смена пароля в хакатоне «ЛЕТС ХАК»')
            ->view('mail.mail-template');

        } elseif ($this->mailTemplate == 5) {

            return $this->from($from, 'ЛЕТС ХАК')
            ->subject('Приглашение в хакатон «ЛЕТС ХАК»')
            ->view('mail.mail-template-invite');

        }

    }
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../lib/phpmailer/src/Exception.php';
require_once __DIR__ . '/../lib/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../lib/phpmailer/src/SMTP.php';


class Mailer extends PHPMailer
{
    const HOST = 'smtp.ethereal.email';
    const USER = 'casimer.daugherty34@ethereal.email';
    const PASS = 'z24rdzFXz81dajch9b';

    public function __construct(...$args)
    {
        parent::__construct(...$args);
        $this->isSMTP();
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'tls';
        $this->Port = 587;
    }

    public function login()
    {
        $this->Username = self::USER;
        $this->Password = self::PASS;
        $this->Host = self::HOST;
    }

    public function fromMail(Mail $mail)
    {
        $this->setFrom($mail->getSender(), 'Mailer');
        $this->addAddress($mail->getRecipient());
        $this->Subject = $mail->getSubject();
        $this->Body = $mail->getBody();

        // $attachments = $mail->getAttachments();
        // foreach ($attachments as $attachment) {
        //     $this->addAttachment($attachment);
        // }
    }
}

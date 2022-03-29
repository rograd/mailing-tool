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
        $this->Host = self::HOST;
        $this->SMTPAuth = true;
        $this->Username = self::USER;
        $this->Password = self::PASS;
        $this->SMTPSecure = 'tls';
        $this->Port = 587;
    }

    public function fromMail(Mail $mail)
    {
        $this->setFrom($mail->getSender(), 'Mailer');
        $this->addAddress($mail->getrecipient());
        $this->Subject = $mail->getSubject();
        $this->Body = $mail->getBody();

        // $attachments = $mail->getAttachments();
        // foreach ($attachments as $attachment) {
        //     $this->addAttachment($attachment);
        // }
    }
}

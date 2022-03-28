<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../lib/phpmailer/src/Exception.php';
require_once __DIR__ . '/../lib/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../lib/phpmailer/src/SMTP.php';


class Mailer extends PHPMailer
{
    const USERNAME = 'casimer.daugherty34@ethereal.email';
    const PASSWORD = 'z24rdzFXz81dajch9b';

    private function setConfiguration()
    {
        $this->isSMTP();
        $this->Host = 'smtp.ethereal.email';
        $this->SMTPAuth = true;
        $this->Username = self::USERNAME;
        $this->Password = self::PASSWORD;
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

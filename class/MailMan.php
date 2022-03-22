<?php

use PHPMailer\PHPMailer\PHPMailer;

class MailMan
{
    private $dbc;    // jeżeli będziesz pobierać dane z Bazy danych
    private $msg;    // jeżeli chcesz przechowywać komunikaty
    private $svw;    // jeżeli chcesz obsługiwać szablony HTML
    private $mail;    // tutaj możesz przechowywać ustawienia konta pocztowego odczytane z pliku mx.*.php

    // główna część kodu klienta pocztowego

    private function loadMailerConf($mxConf)
    {    // loads config for email account (login, pass, Portss)
        $cnf = false;
        if (is_string($mxConf) && $mxConf != '') {    // if its String of the email account file config
            $mxCnf = __DIR__ . '/../etc/mx.' . $mxConf . '.php';
            if (file_exists($mxCnf)) {    // Create a new PHPMailer instance
                $this->mail = new PHPMailer();
                $this->mail->isSMTP();            // Tell PHPMailer to use SMTP
                //Enable SMTP debugging			// 0 = off (for production use)
                $this->mail->SMTPDebug = 0;        // 1 = client messages	// 2 = client and server messages
                $this->mail->Debugoutput = 'html';    //Ask for HTML-friendly debug output
                require($mxCnf);            // file exists - so include it
            }
        }
        return $cnf;
    }

    public function sendMail($mxConf, $mxSchema, $mxContent)
    {    // 
        // String $mxConf;		// nazwa pliku konfiguracji wysyłki
        // String $mxSchema;	// nazwa pliku schematu/szablonu jak wysyłać i z czym
        // Array  $mxContent;	// treść wiadomości (Recipient[mail,name,surname]+Title+MailBody) 
        
        $this->loadMailerConf($mxConf);
        var_dump($this->mail);
        // do opracowania używając metod:

        $this->mail->addAddress('', 'etykieta');
        $this->mail->CharSet = "utf-8";
        $this->mail->Subject = 'test';    //Set the subject line
        //Read an HTML message body from an external file, convert referenced images to embedded,
        $this->mail->msgHTML($mxContent);    //convert HTML into a basic plain-text alternative body
        //Replace the plain text body with one created manually
        $this->mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        $this->mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$this->mail->send()) {
            // obsługa błędów wysyłania
        }

        // ?? return ??
    }
}
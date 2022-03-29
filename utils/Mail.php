<?php

require_once __DIR__ . '/InputException.php';

class Mail
{
    private string $sender, $recipient, $subject, $body;
    private array $attachments;

    public function __construct($sender, $recipient, $subject, $body)
    {
        $this->sender = $sender;
        $this->setRecipient($recipient);
        $this->setSubjcet($subject);
        $this->setBody($body);
        // $this->attachments = $attachments;
    }

    public function setRecipient(string $recipient): void
    {
        if (!($recipient && strpos($recipient, '@') !== false))
            throw new InputException('Nieprawidłowy adres e-mail');

        $this->recipient = $recipient;
    }

    public function setSubjcet(string $subject): void
    {
        if (!$subject)
            throw new InputException('Tytuł nie może być pusty');

        $this->subject = $subject;
    }

    public function setBody(string $body): void
    {
        if (!$body)
            throw new InputException('Zawartość nie może być pusta');

        $this->body = $body;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getrecipient(): string
    {
        return $this->recipient;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getbody(): string
    {
        return $this->body;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }
}

<?php

class Mail
{
    private string $sender, $recipient, $subject, $body;
    private array $attachments;

    public function __construct(Response $response, string $sender, string $recipient, string $subject, string $body)
    {
        $this->response = $response;
        $this->sender = $sender;
        $this->setRecipient($recipient);
        $this->setSubjcet($subject);
        $this->setBody($body);
        // $this->attachments = $attachments;
    }

    public function setRecipient(string $recipient): void
    {
        if (!($recipient && strpos($recipient, '@') !== false)) {
            $this->response->appendError('Nieprawidłowy adres e-mail');
            return;
        }

        $this->recipient = $recipient;
    }

    public function setSubjcet(string $subject): void
    {
        if (!$subject) {
            $this->response->appendError('Tytuł nie może być pusty');
            return;
        }

        $this->subject = $subject;
    }

    public function setBody(string $body): void
    {
        if (!$body) {
            $this->response->appendError('Zawartość nie może być pusta');
            return;
        }

        $this->body = $body;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getRecipient(): string
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
}

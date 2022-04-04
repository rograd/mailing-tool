<?php

class Response
{
    public ?array $errors = null;

    public function appendError(string $message): void
    {
        $this->errors[] = $message;
    }

    public function send()
    {
        header('Content-Type: application/json');
        echo json_encode($this);
        die();
    }
}

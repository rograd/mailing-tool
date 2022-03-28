<?php

require_once 'utils/Mailer.php';
require_once 'utils/Mail.php';

$response = ['error' => null];

function validateInput($data)
{
    if (!isset($data['recipient'], $data['subject'], $data['body']))
        throw new Exception('Wszystkie pola są wymagane');

    $recipient = $data['recipient'];
    $subject = $data['subject'];
    $body = $data['body'];

    return new Mail('sender@example.com', $recipient, $subject, $body);
}

try {
    $mail = validateInput($_POST);
    $mailer = new Mailer(true);
    $mailer->fromMail($mail);
    // $mailer->send();
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);

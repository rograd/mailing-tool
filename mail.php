<?php

require_once 'utils/RequestHandler.php';
require_once 'utils/UploadHandler.php';
require_once 'utils/Mail.php';
require_once 'utils/Mailer.php';

$response = ['error' => null];

$reqest = new RequestHandler($_POST);
$upload = new UploadHandler($_FILES);

try {
    $recipient = $reqest->validate('recipient');
    $subject = $reqest->validate('subject');
    $body = $reqest->validate('body');
    $attachments = $upload->validate('attachments');

    $mail = new Mail('sender@example.com', $recipient, $subject, $body);
    $mailer = new Mailer(true);
    $mailer->fromMail($mail);
    $mailer->send();
} catch (InputException $e) {
    $response['error'] = $e->getMessage();
} catch (Exception $e) {
    $response['error'] = 'Bład wewnętrzny serwera';
}

header('Content-Type: application/json');
echo json_encode($response);

<?php
require_once 'utils/RequestData.php';
// require_once 'utils/Response.php';
require_once 'utils/Mail.php';
require_once 'utils/Mailer.php';

// $response = new Response();

$postData = new RequestData($_POST);
print_r($_POST);
print_r($_FILES);

// $hasFields = $postData->has(['sender', 'recipient', 'subject', 'body']);


// [
//     'sender' => $sender,
//     'recipient' => $recipient,
//     'subject' => $subject,
//     'body' => $body
// ] = $postData;
// $attachments = $filesData->attachments;

// $mailer = new Mailer(true);
// $mail = new Mail($response, 'sender@example.com', $recipient, $subject, $body);
// $mailer->fromMail($mail);
// // $mailer->send();

// header('Content-Type: application/json');
// echo json_encode($response);

// $postData->all(['sender', 'recipient', 'subject', 'body']);
    
// public function all(array $keys): bool
// {
//     $values = array_map(fn($key) => $this->$key, $keys);

//     return isset($values);
// }
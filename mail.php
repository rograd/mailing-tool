<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// require_once('lib/phpMailer/ManualLoader.php');
// require_once('class/MailMan.php');

// $mx = new MailMan();
// if (empty($mx)) die();

// $mx->sendMail('account1', $mxSchema=null, 'test');

require_once('class/MailHandler.php');

$sender = isset($_POST['sender']) ? $_POST['sender'] : null;
$recipient = isset($_POST['recipient']) ? $_POST['recipient'] : null;
$subject = isset($_POST['subject']) ? $_POST['subject'] : null;
$content = isset($_POST['content']) ? $_POST['content'] : null;
if($_POST) {
    $mailHandler = new MailHandler();
    $mailHandler->sendMail($sender, $recipient, $subject, $content);
}
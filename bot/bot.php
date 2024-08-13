<?php

declare(strict_types=1);

use Couchbase\User;

$bot = new \Exam\Bot();
$user = new \Exam\Users();

if (isset($update->message)){
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;
    $user_name = $message->chat->username;

    if ($text == '/start') {
        $user->addUser($chat_id);
        $bot->hendleStartCommand($chat_id, $user_name);
        return;
    }
}
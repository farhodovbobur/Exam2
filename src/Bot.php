<?php

namespace Exam;

use GuzzleHttp\Client;

class Bot
{
    public string $tgApi;
    public Client $client;

    public function __construct()
    {
        $this->tgApi = "https://api.telegram.org/bot{$_ENV['BOT_TOKEN']}/";
        $this->client = new Client(['base_uri'=>$this->tgApi]);
    }

    public function sendMessage(int $chatId, string $text): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $text
            ]
        ]);
    }

    public function hendleStartCommand(int $chatId, string $userName): void
    {
        $message = "Hello @$userName. Welcome to bot.";

        $this->sendMessage($chatId, $message);
    }
}
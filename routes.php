<?php

declare(strict_types=1);

$update = json_decode(file_get_contents('php://input'));

if (isset($update->update_id)) {
    require 'bot/bot.php';
    return;
}

require 'router/web.php';
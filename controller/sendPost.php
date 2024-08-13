<?php

declare(strict_types=1);

$post = $_POST['post'];

if ($post != null) {
    $users_list = (new \Exam\Users())->getAllUsers();

    (new \Exam\Posts())->insertPost($post);

    if (isset($users_list)) {
        foreach ($users_list as $user) {
            (new \Exam\Bot())->sendMessage($user['user_id'], $post);
        }
    }
    header('Location: /');
    exit();
}

header('Location: /');
exit();
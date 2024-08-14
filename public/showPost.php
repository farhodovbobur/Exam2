<?php

declare(strict_types=1);

$posts = (new \Exam\Posts())->getAllPosts();

if (count($posts)) {
    $num = 1;
    foreach ($posts as $post) {

        echo
        "<tr>
            <th scope='row'>{$num}</th>
            <td colspan='3'>
                {$post['post']}
            </td>
        </tr>";

        $num++;
    }
} else {
    echo
    "<tr>
        <td colspan='3'>
            <h5 class='text-center'>Post is empty</h5>
        </td>
    </tr>";
}

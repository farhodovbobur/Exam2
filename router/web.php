<?php

declare(strict_types=1);

\Exam\Router::get('/', fn() => require 'public/dashboard.php');
\Exam\Router::post('/add', fn() => require 'controller/sendPost.php');

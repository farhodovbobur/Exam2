<?php

namespace Exam;

use PDO;

class Posts
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function insertPost(string $post)
    {
        $query = "INSERT INTO posts (post, created_at) VALUES (:post, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':post', $post);
        return $stmt->execute();
    }

    public function getPost()
    {
        return $this->pdo->query("SELECT * FROM posts")->fetch();
    }
}
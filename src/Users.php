<?php

namespace Exam;

use PDO;

// UsersGateway
class Users
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function insertUser(int $userId): bool
    {
        $query = "INSERT INTO users (user_id, created_at) VALUES (:user_id, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        return $stmt->execute();
    }

    public function getUser(int $userId)
    {
        return $this->pdo->query("SELECT * FROM users WHERE user_id = {$userId}")->fetch();
    }

    public function getAllUsers(): false|array
    {
        return $this->pdo->query("SELECT * FROM users")->fetchAll();
    }

    public function addUser(int $userId): void
    {
        if (!$this->isUserExist($userId)){
            $this->insertUser($userId);
        }
    }

    public function isUserExist(int $userId): bool
    {
        return (bool)$this->getUser($userId);
    }
}
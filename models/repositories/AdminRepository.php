<?php

require_once __DIR__ . '/../Admin.php';
require_once __DIR__ . '/../../lib/database.php';

class AdminRepository  {
    public DatabaseConnection $connection;

    public function __construct() {
        $this->connection = new DatabaseConnection();
    }

    public function getAdminByEmail(string $email): ?Admin {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM admins WHERE admin_email = :email');
        $statement->execute(['email' => $email]);

        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $admin = new Admin($result['admin_id'], $result['admin_email'], $result['admin_password']);
        return $admin;
    }
}
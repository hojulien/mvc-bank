<?php

require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../../lib/database.php';

class UserRepository {
    public DatabaseConnection $connection;

    public function __construct() {
        $this->connection = new DatabaseConnection();
    }

    public function getUsers(): array {
        $statement = $this->connection->getConnection()->query('SELECT * FROM users');
        $result = $statement->fetchAll();
        $users = [];
        foreach($result as $row) {
            $user = new User($row['user_firstName'], $row['user_lastName'], $row['user_email'], $row['user_phoneNumber'], $row['user_address'], $row['user_id']);
            $users[] = $user;
        }

        return $users;
    }

    public function getUser(int $id): ?User {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM users WHERE user_id=:id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $user = new User($result['user_firstName'], $result['user_lastName'], $result['user_email'], $result['user_phoneNumber'], $result['user_address'], $result['user_id']);
        return $user;
    }

    public function create(User $user): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO users (user_firstName, user_lastName, user_email, user_phoneNumber, user_address) VALUES (:fName, :lName, :email, :phoneN, :address)');

        return $statement->execute([
            'fName' => $user->getFirstName(),
            'lName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'phoneN' => $user->getPhoneNumber(),
            'address' => $user->getAddress()
        ]);
    }

    public function update(User $user): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE users SET user_firstName = :fName, user_lastName = :lName, user_email = :email, user_phoneNumber = :phoneN, user_address = :address WHERE user_id = :id');

        return $statement->execute([
            'id' => $user->getId(),
            'fName' => $user->getFirstName(),
            'lName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'phoneN' => $user->getPhoneNumber(),
            'address' => $user->getAddress()
        ]);
    }

    public function delete(int $id): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM users WHERE user_id = :id');
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
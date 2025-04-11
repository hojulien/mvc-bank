<?php

require_once __DIR__ . '/../BankAccount.php';
require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../../lib/utils.php';

class BankRepository {
    public DatabaseConnection $connection;

    public function __construct() {
        $this->connection = new DatabaseConnection();
    }

    public function getAccounts(?int $id = null): ?array {

        // si $id est différent de null, alors on va le récupérer; sinon on récupère tout
        if ($id !== null) {
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM bankaccounts WHERE bank_userId = :id');
            $statement->execute([':id' => $id]);
        } else {
            $statement = $this->connection->getConnection()->query('SELECT * FROM bankaccounts');
        }
        $result = $statement->fetchAll();
    
        if (!$result) {
            return null;
        }

        $accounts = [];
        foreach($result as $row) {
            $account = new BankAccount($row['bank_iban'], EnumAccount::toEnum($row['bank_typeAccount']), $row['bank_balance'], $row['bank_userId']);
            $account->setId($row['bank_id']);
            $accounts[] = $account;
        }

        return $accounts;
    }

    public function getAccount(int $id): ?BankAccount {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM bankaccounts WHERE bank_id = :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $account = new BankAccount($result['bank_iban'], EnumAccount::toEnum($result['bank_typeAccount']), $result['bank_balance'], $result['bank_userId']);
        $account->setId($result['bank_id']);
        return $account;
    }

    public function getAccountCount(): int {
        $statement = $this->connection->getConnection()->query('SELECT COUNT(*) as total FROM bankaccounts');
        $result = $statement->fetch();
    
        return (int) $result['total'];
    }

    public function create(BankAccount $account): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO bankaccounts (bank_iban, bank_typeAccount, bank_balance, bank_userId) VALUES (:iban, :typeA, :balance, :userId)');

        return $statement->execute([
            'iban' => $account->getIban(),
            'typeA' => $account->getTypeAccount(),
            'balance' => $account->getBalance(),
            'userId' => $account->getUserId()
        ]);
    }

    public function update(BankAccount $account): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE bankaccounts SET bank_iban = :iban, bank_typeAccount = :typeA, bank_balance = :balance, bank_userId = :userId WHERE bank_id = :id');

        return $statement->execute([
            'id' => $account->getId(),
            'iban' => $account->getIban(),
            'typeA' => $account->getTypeAccount(),
            'balance' => $account->getBalance(),
            'userId' => $account->getUserId()
        ]);
    }

    public function delete(int $id): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM bankaccounts WHERE bank_id = :id');
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
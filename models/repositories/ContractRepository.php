<?php

require_once __DIR__ . '/../Contract.php';
require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../../lib/utils.php';

class ContractRepository {
    public DatabaseConnection $connection;

    public function __construct() {
        $this->connection = new DatabaseConnection();
    }

    public function getContracts(?int $id = null): ?array {

        // si $id est différent de null, alors on va le récupérer; sinon on récupère tout
        if ($id !== null) {
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM contracts WHERE contract_userId = :id');
            $statement->execute([':id' => $id]);
        } else {
            $statement = $this->connection->getConnection()->query('SELECT * FROM contracts');
        }
        $result = $statement->fetchAll();
    
        if (!$result) {
            return null;
        }

        $contracts = [];
        foreach($result as $row) {
            $contract = new Contract($row['contract_id'], EnumContract::toEnum($row['contract_type']), $row['contract_price'], $row['contract_duration'], $row['contract_userId']);
            $contracts[] = $contract;
        }

        return $contracts;
    }

    public function getContract(int $id): ?Contract {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM contracts WHERE contract_id = :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $contract = new Contract($result['contract_id'], EnumContract::toEnum($result['contract_type']), $result['contract_price'], $result['contract_duration'], $result['contract_userId']);
        return $contract;
    }

    public function create(Contract $contract): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO contracts (contract_type, contract_price, contract_duration, contract_userId) VALUES (:typeC, :price, :duration, :userId)');

        return $statement->execute([
            'typeC' => $contract->getTypeContract(),
            'price' => $contract->getPrice(),
            'duration' => $contract->getDuration(),
            'userId' => $contract->getUserId()
        ]);
    }

    public function update(Contract $contract): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE contracts SET contract_type = :typeC, contract_price = :price, contract_duration = :duration, contract_userId = :userId WHERE contract_id = :id');

        return $statement->execute([
            'id' => $contract->getId(),
            'typeC' => $contract->getTypeContract(),
            'price' => $contract->getPrice(),
            'duration' => $contract->getDuration(),
            'userId' => $contract->getUserId()
        ]);
    }

    public function delete(int $id): bool {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM contracts WHERE contract_id = :id');
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
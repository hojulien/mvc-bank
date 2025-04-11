<?php

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/UserRepository.php';
require_once __DIR__ . '/BankRepository.php';
require_once __DIR__ . '/ContractRepository.php';

class HomeRepository  {
    public DatabaseConnection $connection;
    public UserRepository $userRepo;
    public BankRepository $bankRepo;
    public ContractRepository $contractRepo;

    public function __construct() {
        $this->connection = new DatabaseConnection();
        $this->userRepo = new UserRepository();
        $this->bankRepo = new BankRepository();
        $this->contractRepo = new ContractRepository();
    }

    public function getTotal(): ?array {
        return [
            "userCount" => $this->userRepo->getUserCount(),
            "bankCount" => $this->bankRepo->getAccountCount(),
            "contractCount" => $this->contractRepo->getContractCount()
        ];
    }
}
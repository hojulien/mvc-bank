<?php

require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/../lib/utils.php';

class BankAccount {
    private ?int $id;
    private string $iban;
    private EnumAccount $typeAccount;
    private float $balance;
    private ?int $userId;

    public function __construct(?int $id, string $iban, EnumAccount $typeA, float $balance, ?int $userId) {
        $this->setId($id ?? null);
        $this->setIban($iban);
        $this->setTypeAccount($typeA);
        $this->setBalance($balance);
        $this->setUserId($userId ?? null);
    }

    // GETTERS

    public function getId(): int {
        return $this->id;
    }

    public function getIban(): string {
        return $this->iban;
    }

    public function getTypeAccount(): string {
        return $this->typeAccount->toString();
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    // SETTERS

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setIban(string $iban): void {
        // htmlspecialchars évite les attaques XSS
        $this->iban = htmlspecialchars($iban);
    }

    public function setTypeAccount(EnumAccount $typeA): void {
        $this->typeAccount = $typeA;
    }

    public function setBalance(float $balance): void {
        $this->balance = $balance;
    }

    public function setUserId(?int $userId): void {
        $this->userId = $userId;
    }

}
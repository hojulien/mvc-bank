<?php

require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/../lib/utils.php';

class Contract {
    private ?int $id;
    private EnumContract $typeContract;
    private float $price;
    private int $duration;
    private int $userId;

    public function __construct(EnumContract $typeC, float $price, int $duration, ?int $userId) {
        $this->setTypeContract($typeC);
        $this->setPrice($price);
        $this->setDuration($duration);
        $this->setUserId($userId ?? null);
        $this->id = null;
    }

    // GETTERS

    public function getId(): int {
        return $this->id;
    }

    public function getTypeContract(): string {
        return $this->typeContract->toString();
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    // SETTERS

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function setTypeContract(EnumContract $typeC): void {
        $this->typeContract = $typeC;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function setDuration(int $duration): void {
        $this->duration = $duration;
    }

    public function setUserId(?int $userId): void {
        $this->userId = $userId;
    }

}
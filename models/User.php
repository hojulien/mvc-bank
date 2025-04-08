<?php

require_once __DIR__ . '/../lib/database.php';

class User {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;
    private string $address;

    public function __construct(string $fName, string $lName, string $email, string $phoneN, ?string $address, ?int $id = null) {
        $this->setFirstName($fName);
        $this->setLastName($lName);
        $this->setEmail($email);
        $this->setPhoneNumber($phoneN);
        $this->setAddress($address);
        $this->id = $id;
    }

    // GETTERS

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }

    public function getAddress(): ?string {
        return $this->address;
    }

    // SETTERS

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setFirstName(string $fName): void {
        $this->firstName = htmlspecialchars($fName);
    }

    public function setLastName(string $lName): void {
        $this->lastName = htmlspecialchars($lName);
    }

    public function setEmail(string $email): void {
        $this->email = htmlspecialchars($email);
    }

    public function setPhoneNumber(string $phoneN): void {
        $this->phoneNumber = htmlspecialchars($phoneN);
    }

    public function setAddress(?string $address): void {
        $this->address = htmlspecialchars($address);
    }
}
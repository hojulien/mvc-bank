<?php

require_once __DIR__ . '/../models/repositories/BankRepository.php';
require_once __DIR__ . '/../models/BankAccount.php';

class BankController {
    private BankRepository $bankRepo;

    public function __construct() {
        $this->bankRepo = new BankRepository();
    }

    public function home() {
        $banks = $this->bankRepo->getAccounts();
        require_once __DIR__ . '/../views/bank/list.php';
    }

    public function show(int $id) {
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/view.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/bank/create.php';
    }

    public function add() {
        $bank = new BankAccount($_POST['iban'], $_POST['typeA'], $_POST['balance'], $_POST['userId']);
        $this->bankRepo->create($bank);

        header('Location: /../views/bank/home.php');
    }

    public function edit(int $id) {
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/edit.php';
    }

    public function update() {
        $bank = new BankAccount($_POST['iban'], $_POST['typeA'], $_POST['balance'], $_POST['userId'], $_POST['id']);
        $this->bankRepo->update($bank);

        header('Location: /../views/bank/home.php');
    }

    public function delete(int $id) {
        $this->bankRepo->delete($id);

        header('Location: /../views/bank/home.php');
    }
}
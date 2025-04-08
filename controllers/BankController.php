<?php

require_once __DIR__ . '/../models/repositories/BankRepository.php';
require_once __DIR__ . '/../models/BankAccount.php';
require_once __DIR__ . '/../lib/utils.php';

class BankController {
    private BankRepository $bankRepo;

    public function __construct() {
        $this->bankRepo = new BankRepository();
    }

    public function home() {
        $banks = $this->bankRepo->getAccounts();
        require_once __DIR__ . '/../views/bank/list.php';
    }

    public function view(int $id) {
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/view.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/bank/create.php';
    }

    public function add() {
        $typeA = EnumAccount::toEnum($_POST['typeA']);
        $bank = new BankAccount($_POST['iban'], $typeA, $_POST['balance'], $_POST['userId']);
        $this->bankRepo->create($bank);

        header('Location: ?action=bank-list');
        exit;
    }

    public function edit(int $id) {
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/edit.php';
    }

    public function update() {
        $bankId = $_POST['id'];
        $typeA = EnumAccount::toEnum($_POST['typeA']);
        $bank = new BankAccount($_POST['iban'], $typeA, $_POST['balance'], $_POST['userId']);
        $bank->setId($bankId);
        $this->bankRepo->update($bank);

        header('Location: ?action=bank-list');
        exit;
    }

    public function delete(int $id) {
        $this->bankRepo->delete($id);

        header('Location: ?action=bank-list');
        exit;
    }
}
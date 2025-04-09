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
        requireAdmin();
        $banks = $this->bankRepo->getAccounts();
        require_once __DIR__ . '/../views/bank/list.php';
    }

    public function view(int $id) {
        requireAdmin();
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/view.php';
    }

    public function create() {
        requireAdmin();
        require_once __DIR__ . '/../views/bank/create.php';
    }

    public function add() {
        requireAdmin();
        $bank = new BankAccount($_POST['iban'], EnumAccount::toEnum($_POST['typeA']), $_POST['balance'], $_POST['userId']);
        $this->bankRepo->create($bank);

        redirect("?action=bank-list");
    }

    public function edit(int $id) {
        requireAdmin();
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/edit.php';
    }

    public function update() {
        requireAdmin();
        $bank = new BankAccount($_POST['iban'], EnumAccount::toEnum($_POST['typeA']), $_POST['balance'], $_POST['userId']);
        $bank->setId($_POST['id']);
        $this->bankRepo->update($bank);

        redirect("?action=bank-list");
    }

    public function delete(int $id) {
        requireAdmin();
        $this->bankRepo->delete($id);

        redirect("?action=bank-list");
    }
}
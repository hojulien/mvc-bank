<?php

require_once __DIR__ . '/../models/repositories/BankRepository.php';
require_once __DIR__ . '/../models/repositories/UserRepository.php';
require_once __DIR__ . '/../models/BankAccount.php';
require_once __DIR__ . '/../lib/utils.php';

class BankController {
    private BankRepository $bankRepo;
    private UserRepository $userRepo;

    public function __construct() {
        $this->bankRepo = new BankRepository();
        $this->userRepo = new UserRepository();
    }

    // récupère un tableau associatif de clients où la clé correspond à l'ID du client. plus facile à itérer sur un fichier par rapport à getUsers()
    public function getAllUserIds($users): array {
        $array = [];
        foreach ($users as $u) {
            $array[$u->getId()] = $u;
        }
        return $array;
    }

    public function home() {
        requireAdmin();
        $userById = $this->getAllUserIds($this->userRepo->getUsers());
        $banks = $this->bankRepo->getAccounts();
        require_once __DIR__ . '/../views/bank/list.php';
    }

    public function view(int $id) {
        requireAdmin();
        $userById = $this->getAllUserIds($this->userRepo->getUsers());
        $bank = $this->bankRepo->getAccount($id);
        require_once __DIR__ . '/../views/bank/view.php';
    }

    public function create() {
        requireAdmin();
        $users = $this->userRepo->getUsers();
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
        $users = $this->userRepo->getUsers();
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
<?php

require_once __DIR__ . '/../models/repositories/UserRepository.php';
require_once __DIR__ . '/../models/repositories/BankRepository.php';
require_once __DIR__ . '/../models/repositories/ContractRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../lib/utils.php';

class UserController {
    private UserRepository $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    // exécute requireAdmin() qui vérifie la connexion (si non connecté, redirige vers no-access: voir utils.php pour la fonction)
    public function home() {
        requireAdmin();
        $users = $this->userRepo->getUsers();
        require_once __DIR__ . '/../views/user/list.php';
    }

    public function view(int $id) {
        requireAdmin();
        $bankRepo = new BankRepository();
        $contractRepo = new ContractRepository();

        $user = $this->userRepo->getUser($id);
        $banks = $bankRepo->getAccounts($id);
        $contracts = $contractRepo->getContracts($id);
        require_once __DIR__ . '/../views/user/view.php';
    }

    public function create() {
        requireAdmin();
        require_once __DIR__ . '/../views/user/create.php';
    }

    public function add() {
        requireAdmin();
        $user = new User($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['phoneN'], $_POST['address']);
        $this->userRepo->create($user);

        redirect("?action=user-list");
    }

    public function edit(int $id) {
        requireAdmin();
        $user = $this->userRepo->getUser($id);
        require_once __DIR__ . '/../views/user/edit.php';
    }

    public function update() {
        requireAdmin();
        $userId = $_POST['id'];
        $user = new User($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['phoneN'], $_POST['address']);
        $user->setId($userId);
        $this->userRepo->update($user);

        redirect("?action=user-list");
    }

    public function delete(int $id) {
        requireAdmin();
        $this->userRepo->delete($id);

        redirect("?action=user-list");
    }
}
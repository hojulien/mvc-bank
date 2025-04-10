<?php

require_once __DIR__ . '/../models/repositories/ContractRepository.php';
require_once __DIR__ . '/../models/repositories/UserRepository.php';
require_once __DIR__ . '/../models/Contract.php';
require_once __DIR__ . '/../lib/utils.php';

class ContractController {
    private ContractRepository $contractRepo;
    private UserRepository $userRepo;

    public function __construct() {
        $this->contractRepo = new ContractRepository();
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
        $contracts = $this->contractRepo->getContracts();
        require_once __DIR__ . '/../views/contract/list.php';
    }

    public function view(int $id) {
        requireAdmin();
        $userById = $this->getAllUserIds($this->userRepo->getUsers());
        $contract = $this->contractRepo->getContract($id);
        require_once __DIR__ . '/../views/contract/view.php';
    }

    public function create() {
        requireAdmin();
        $users = $this->userRepo->getUsers();
        require_once __DIR__ . '/../views/contract/create.php';
    }

    public function add() {
        requireAdmin();
        $contract = new Contract(EnumContract::toEnum($_POST['typeC']), $_POST['price'], $_POST['duration'], $_POST['userId']);
        $this->contractRepo->create($contract);

        redirect("?action=contract-list");
    }

    public function edit(int $id) {
        requireAdmin();
        $users = $this->userRepo->getUsers();
        $contract = $this->contractRepo->getContract($id);
        require_once __DIR__ . '/../views/contract/edit.php';
    }

    public function update() {
        requireAdmin();
        $contract = new Contract(EnumContract::toEnum($_POST['typeC']), $_POST['price'], $_POST['duration'], $_POST['userId']);
        $contract->setId($_POST['id']);
        $this->contractRepo->update($contract);

        redirect("?action=contract-list");
    }

    public function delete(int $id) {
        requireAdmin();
        $this->contractRepo->delete($id);

        redirect("?action=contract-list");
    }
}
<?php

require_once __DIR__ . '/../models/repositories/ContractRepository.php';
require_once __DIR__ . '/../models/Contract.php';
require_once __DIR__ . '/../lib/utils.php';

class ContractController {
    private ContractRepository $contractRepo;

    public function __construct() {
        $this->contractRepo = new ContractRepository();
    }

    public function home() {
        $contracts = $this->contractRepo->getContracts();
        require_once __DIR__ . '/../views/contract/list.php';
    }

    public function view(int $id) {
        $contract = $this->contractRepo->getContract($id);
        require_once __DIR__ . '/../views/contract/view.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/contract/create.php';
    }

    public function add() {
        $contract = new Contract(EnumContract::toEnum($_POST['typeC']), $_POST['price'], $_POST['duration'], $_POST['userId']);
        $this->contractRepo->create($contract);

        header('Location: ?action=contract-list');
        exit;
    }

    public function edit(int $id) {
        $contract = $this->contractRepo->getContract($id);
        require_once __DIR__ . '/../views/contract/edit.php';
    }

    public function update() {
        $contract = new Contract(EnumContract::toEnum($_POST['typeC']), $_POST['price'], $_POST['duration'], $_POST['userId']);
        $contract->setId($_POST['id']);
        $this->contractRepo->update($contract);

        header('Location: ?action=contract-list');
        exit;
    }

    public function delete(int $id) {
        $this->contractRepo->delete($id);

        header('Location: ?action=contract-list');
        exit;
    }
}
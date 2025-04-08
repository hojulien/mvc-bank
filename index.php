<?php

require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/BankController.php';
require_once __DIR__ . '/controllers/ContractController.php';

$userC = new UserController();
$bankC = new BankController();
$contractC = new ContractController();

$action = $_GET['action'] ?? 'home'; // home par defaut.
$id = $_GET['id'] ?? null;

switch($action) {
    case('home'):
        require_once __DIR__ . '/views/home.php';
        break;
    // USER
    case('user-list'):
        $userC->home();
        break;
    case('user-view'):
        $userC->view($id);
        break;
    case('user-create'):
        $userC->create();
        break;   
    case('user-add'):
        $userC->add();
        break;
    case('user-edit'):
        $userC->edit($id);
        break;
    case('user-update'):
        $userC->update();
        break;
    case('user-delete'):
        $userC->delete($id);
        break;
    // BANK
    case('bank-list'):
        $bankC->home();
        break;
    // CONTRACT
    case('contract-list'):
        $contractC->home();
        break;
    default:
        require_once __DIR__ . '/views/404.php';
}

?>
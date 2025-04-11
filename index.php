<?php

session_start();

require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/BankController.php';
require_once __DIR__ . '/controllers/ContractController.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/HomeController.php';

$userC = new UserController();
$bankC = new BankController();
$contractC = new ContractController();
$authC = new AuthController();
$homeC = new HomeController();

$action = $_GET['action'] ?? 'home';
$id = $_GET['id'] ?? null;

switch($action) {
    case('home'):
        $homeC->home();
        break;
    // LOGIN
    case 'logout':
        $authC->logout();
        break;
    case 'doLogin':
        $authC->doLogin();
        break;
    case 'login':
        $authC->login();
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
    case('bank-view'):
        $bankC->view($id);
        break;
    case('bank-create'):
        $bankC->create();
        break;   
    case('bank-add'):
        $bankC->add();
        break;
    case('bank-edit'):
        $bankC->edit($id);
        break;
    case('bank-update'):
        $bankC->update();
        break;
    case('bank-delete'):
        $bankC->delete($id);
        break;
    // CONTRACT
    case('contract-list'):
        $contractC->home();
        break;
    case('contract-view'):
        $contractC->view($id);
        break;
    case('contract-create'):
        $contractC->create();
        break;   
    case('contract-add'):
        $contractC->add();
        break;
    case('contract-edit'):
        $contractC->edit($id);
        break;
    case('contract-update'):
        $contractC->update();
        break;
    case('contract-delete'):
        $contractC->delete($id);
        break;
    // NO ACCESS
    case('no-access'):
        require_once __DIR__ . '/views/no-access.php';
        break;
    // 404
    default:
        $_SESSION['error'] = "Erreur 404";
        require_once __DIR__ . '/views/404.php';
}

?>
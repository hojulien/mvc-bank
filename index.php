<?php

require_once __DIR__ . '/controllers/UserController.php';

$userC = new UserController();

$action = $_GET['action'] ?? 'home'; // home par defaut.
$id = $_GET['id'] ?? null;

switch($action) {
    case('home'):
        require_once __DIR__ . '/views/home.php';
        break;
    case('user-list'):
        $userC->home();
        break;
    default:
        require_once __DIR__ . '/views/404.php';
}

?>
<?php

require_once __DIR__ . '/../models/repositories/AdminRepository.php';

class AuthController {
    private AdminRepository $adminRepo;

    public function __construct() {
        $this->adminRepo = new AdminRepository();
    }

    public function login() {
        require __DIR__ . '/../views/login.php';
    }

    public function doLogin() {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $admin = $this->adminRepo->getAdminByEmail($email);

        if ($admin && password_verify($password, $admin->getPassword())) {
            $_SESSION['admin_id'] = $admin->getId();
            redirect("?");
        } else {
            $_SESSION['error_message'] = "Erreur: mot de passe ou adresse e-mail incorrect.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        header('Location: ?action=login');
        exit;
    }
}
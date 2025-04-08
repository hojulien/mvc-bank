<?php

require_once __DIR__ . '/../models/repositories/UserRepository.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private UserRepository $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    public function home() {
        $users = $this->userRepo->getUsers();
        require_once __DIR__ . '/../views/user/list.php';
    }

    public function view(int $id) {
        $user = $this->userRepo->getUser($id);
        require_once __DIR__ . '/../views/user/view.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/user/create.php';
    }

    public function add() {
        $user = new User($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['phoneN'], $_POST['address']);
        $this->userRepo->create($user);

        header('Location: ?action=user-list');
        exit;
    }

    public function edit(int $id) {
        $user = $this->userRepo->getUser($id);
        require_once __DIR__ . '/../views/user/edit.php';
    }

    public function update() {
        $userId = $_POST['id'];
        $user = new User($_POST['fName'], $_POST['lName'], $_POST['email'], $_POST['phoneN'], $_POST['address']);
        $user->setId($userId);
        $this->userRepo->update($user);

        header('Location: ?action=user-list');
        exit;
    }

    public function delete(int $id) {
        $this->userRepo->delete($id);

        header('Location: ?action=user-list');
        exit;
    }
}
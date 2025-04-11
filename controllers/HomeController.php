<?php

require_once __DIR__ . '/../models/repositories/HomeRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class HomeController {

    private HomeRepository $homeRepo;

    public function __construct() {
        $this->homeRepo = new HomeRepository();
    }

    public function home() {
        requireAdmin();
        $total = $this->homeRepo->getTotal();
        require_once __DIR__ . '/../views/home.php';
    }
}
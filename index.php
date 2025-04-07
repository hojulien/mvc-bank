<?php

require_once __DIR__ . '/models/repositories/UserRepository.php';

// "test" de vérification de la connexion entre la DB et le projet.
$userRepo = new UserRepository();

$getAllUsers = $userRepo->getUsers();
var_dump($getAllUsers);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/styles/style.css">
        <script src="./assets/scripts/darkMode.js" defer></script>
        <script src="./assets/scripts/dropdown.js" defer></script>
        <title>Gestion bancaire</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-title">
                    <h1><a href="?">BankLounge 🏦</a></h1>
                </div>
                <div class="nav-options">
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <div class="nav-option">
                            <span>Clients</span>
                            <div class="nav-dropdown-option">
                                <a href="?action=user-list">Liste des clients</a>
                                <a href="?action=user-create">Ajouter un nouveau client</a>
                            </div>
                        </div>
                        <div class="nav-option">
                            <span>Comptes</span>
                            <div class="nav-dropdown-option">
                                <a href="?action=bank-list">Liste des comptes</a>
                                <a href="?action=bank-create">Ajouter un nouveau compte</a>
                            </div>
                        </div>
                        <div class="nav-option">
                            <span>Contrats</span>
                            <div class="nav-dropdown-option">
                                <a href="?action=contract-list">Liste des contrats</a>
                                <a href="?action=contract-create">Ajouter un nouveau contrat</a>
                            </div>
                        </div>
                        <p class="nav-option"><a href="?action=logout">Déconnexion</a></p>
                    <?php else: ?>
                        <p class="nav-option"><a href="?action=login">Se connecter</a></p>
                    <?php endif; ?>
                    <div id="darkMode">
                        <img id="dark" src="assets/images/dark_mode.svg" alt="Dark mode">
                        <img id="light" src="assets/images/light_mode.svg" alt="Light mode">
                    </div>
                </div>
            </nav>
        </header>
        <main>
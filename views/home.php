<?php require_once __DIR__ . '/templates/header.php'; ?>
        
            <section>
                <h1>Bienvenue sur l'application web BankLounge.</h1> <br>
                <p>Vous pouvez consulter nos clients, ainsi que leurs comptes et leurs contrats ci-dessous.</p>
                <div class="home-options">
                    <div class="home-option">
                        <p>Clients 👤</p>
                        <p class="count"><?= $total['userCount'] ?></p>
                        <a class="link" href="?action=user-list">Consulter la liste</a>
                    </div>
                    <div class="home-option">
                        <p>Comptes bancaires 💳</p>
                        <p class="count"><?= $total['bankCount'] ?></p>
                        <a class="link" href="?action=bank-list">Consulter la liste</a>
                    </div>
                    <div class="home-option">
                        <p>Contrats 📃</p>
                        <p class="count"><?= $total['contractCount'] ?></p>
                        <a class="link" href="?action=contract-list">Consulter la liste</a>
                    </div>
                </div>
            </section>

<?php require_once __DIR__ . '/templates/footer.php';
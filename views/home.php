<?php require_once __DIR__ . '/templates/header.php'; ?>
        
            <section>
                <h1>Bienvenue sur l'application web BankLounge.</h1> <br>
                <p>Vous pouvez consulter nos clients, ainsi que leurs comptes et leurs contrats ci-dessous.</p>
                <div class="home-options">
                    <div class="home-option">
                        <a href="?action=user-list"><p>Consulter la liste des clients</p></a>
                    </div>
                    <div class="home-option">
                        <a href="?action=bank-list"><p>Consulter la liste des comptes bancaires</p></a>
                    </div>
                    <div class="home-option">
                        <a href="?action=contract-list"><p>Consulter la liste des contrats</p></a>
                    </div>
                </div>
            </section>

<?php require_once __DIR__ . '/templates/footer.php';
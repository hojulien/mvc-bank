<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Détails du compte</h1>
                <div class="view-container">
                    <div class="view-options">
                        <div class="view-option key">IBAN</div>
                        <div class="view-option value"><?= $bank->getIban() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Type de compte</div>
                        <div class="view-option value"><?= $bank->getTypeAccount() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Solde bancaire</div>
                        <div class="view-option value"><?= $bank->getBalance() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">ID Client</div>
                        <div class="view-option value">
                            <?php
                                $uId = $bank->getUserId();
                                $user = $userById[$uId];
                                echo "{$user->getId()} - {$user->getLastName()} {$user->getFirstName()}";
                            ?>
                        </div>
                    </div>
                    <div class="view-buttons">
                        <button id="edit"><a href="?action=bank-edit&id=<?= $bank->getId() ?>">Modifier les informations du compte ✏️</a></button>
                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce compte?');" href="?action=bank-delete&id=<?= $bank->getId() ?>">Supprimer le compte bancaire ❌</a></button>
                    </div>
                </div>
                <button class="return"><a href="?action=bank-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
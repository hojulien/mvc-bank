<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Détails du contrat</h1>
                <div class="view-container">
                    <div class="view-options">
                        <div class="view-option key">Type de contrat</div>
                        <div class="view-option value"><?= $contract->getTypeContract() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Prix mensuel</div>
                        <div class="view-option value"><?= $contract->getPrice() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Durée (mois)</div>
                        <div class="view-option value"><?= $contract->getDuration() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">ID Client</div>
                        <div class="view-option value"><?= $contract->getUserId() ?></div>
                    </div>
                    <div class="view-buttons">
                        <button id="edit"><a href="?action=contract-edit&id=<?= $contract->getId() ?>">Modifier les informations du contrat ✏️</a></button>
                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce contrat?');" href="?action=contract-delete&id=<?= $contract->getId() ?>">Supprimer le contrat ❌</a></button>
                    </div>
                </div>
                <button class="return"><a href="?action=contract-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
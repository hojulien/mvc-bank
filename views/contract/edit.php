<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Modifier un contrat</h1>
                <form action="?action=contract-update" method="POST">
                    <input type="hidden" name="id" value="<?= $contract->getId() ?>">
                    <div class="form">
                        <label for="typeC">Type de contrat:</label>
                        <?php $typeC = $contract->getTypeContract() ?>
                        <select name="typeC" id="typeC">
                            <option <?= $typeC == 'Assurance Vie' ? 'selected' : '' ?> value="Assurance Vie">Assurance Vie</option>
                            <option <?= $typeC == 'Assurance Habitation' ? 'selected' : '' ?> value="Assurance Habitation">Assurance Habitation</option>
                            <option <?= $typeC == 'Crédit Immobilier' ? 'selected' : '' ?> value="Crédit Immobilier">Crédit Immobilier</option>
                            <option <?= $typeC == 'Crédit à la Consommation' ? 'selected' : '' ?> value="Crédit à la Consommation">Crédit à la Consommation</option>
                            <option <?= $typeC == 'Compte Épargne Logement (CEL)' ? 'selected' : '' ?> value="Compte Épargne Logement (CEL)">Compte Épargne Logement (CEL)</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="price">Prix mensuel:</label>
                        <input type="number" step="0.01" min="0" id="price" name="price" value="<?= $contract->getPrice() ?>" required>
                    </div>
                    <div class="form">
                        <label for="duration">Durée (mois)</label>
                        <input type="number" id="duration" name="duration" value="<?= $contract->getDuration() ?>" required>
                    </div>
                    <div class="form">
                        <label for="userId">ID Client:</label>
                        <input type="number" id="userId" name="userId" value="<?= $contract->getUserId() ?>" required>
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=contract-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
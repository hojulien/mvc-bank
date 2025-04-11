<?php require_once __DIR__ . '/../templates/header.php'; ?>
            <script src="./assets/scripts/contractform.js" defer></script>
            <section>
                <div class="title">
                    <h1>Modifier un contrat existant</h1>
                </div>
                <form id="formContract" action="?action=contract-update" method="POST">
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
                        <div class="error" id="error-typeC"></div>
                    </div>
                    <div class="form">
                        <label for="price">Prix mensuel:</label>
                        <input type="number" step="0.01" min="0" id="price" name="price" value="<?= $contract->getPrice() ?>">
                        <div class="error" id="error-price"></div>
                    </div>
                    <div class="form">
                        <label for="duration">Durée (mois)</label>
                        <input type="number" id="duration" name="duration" value="<?= $contract->getDuration() ?>">
                        <div class="error" id="error-duration"></div>
                    </div>
                    <div class="form">
                        <label for="userId">ID Client:</label>
                        <select name="userId" id="userId">
                            <?php foreach($users as $user): ?>
                                <option value="<?= $user->getId(); ?>" <?= $contract->getUserId() == $user->getId() ? 'selected' : ''; ?>>
                                    <?= "{$user->getId()} - {$user->getLastName()} {$user->getFirstName()}" ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=contract-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
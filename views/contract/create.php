<?php require_once __DIR__ . '/../templates/header.php'; ?>
            <script src="./assets/scripts/contractform.js" defer></script>
            <section>
                <div class="title">
                    <h1>Ajouter un nouveau contrat</h1>
                </div>
                <form id="formContract" action="?action=contract-add" method="POST">
                    <div class="form">
                        <label for="typeC">Type de contrat:</label>
                        <select name="typeC" id="typeC">
                            <option value="" disabled selected>-</option>
                            <option value="Assurance Vie">Assurance Vie</option>
                            <option value="Assurance Habitation">Assurance Habitation</option>
                            <option value="Crédit Immobilier">Crédit Immobilier</option>
                            <option value="Crédit à la Consommation">Crédit à la Consommation</option>
                            <option value="Compte Épargne Logement (CEL)">Compte Épargne Logement (CEL)</option>
                        </select>
                        <div class="error" id="error-typeC"></div>
                    </div>
                    <div class="form">
                        <label for="price">Prix mensuel:</label>
                        <input type="number" step="0.01" min="0" id="price" name="price">
                        <div class="error" id="error-price"></div>
                    </div>
                    <div class="form">
                        <label for="duration">Durée (mois)</label>
                        <input type="number" id="duration" min="0" name="duration">
                        <div class="error" id="error-duration"></div>
                    </div>
                    <div class="form">
                        <label for="userId">ID Client:</label>
                        <select name="userId" id="userId">
                            <?php foreach($users as $user): ?>
                            <option value="<?= $user->getId(); ?>"><?= "{$user->getId()} - {$user->getLastName()} {$user->getFirstName()}" ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="form-valid" type="submit">Ajouter</button>
                </form>
                
                <button class="return"><a href="?action=contract-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
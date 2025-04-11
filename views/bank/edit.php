<?php require_once __DIR__ . '/../templates/header.php'; ?>
            <script src="./assets/scripts/bankform.js" defer></script>
            <section>
                <div class="title">
                    <h1>Modifier un compte bancaire existant</h1>
                </div>
                <form id="formBank" action="?action=bank-update" method="POST">
                    <input type="hidden" name="id" value="<?= $bank->getId() ?>">
                    <div class="form">
                        <label for="iban">IBAN:</label>
                        <input type="text" id="iban" name="iban" value="<?= $bank->getIban() ?>" disabled>
                        <input type="hidden" name="iban" value="<?= $bank->getIban() ?>">
                        <div class="error" id="error-iban"></div>
                    </div>
                    <div class="form">
                        <label for="typeA">Type de compte:</label>
                        <?php $typeA = $bank->getTypeAccount(); ?>
                        <select name="typeA" id="typeA">
                            <option <?= $typeA == 'Compte courant' ? 'selected' : '' ?> value="Compte courant">Compte courant</option>
                            <option <?= $typeA == 'Compte épargne' ? 'selected' : '' ?> value="Compte épargne">Compte épargne</option>
                        </select>
                        <div class="error" id="error-typeA"></div>
                    </div>
                    <div class="form">
                        <label for="balance">Solde bancaire</label>
                        <input type="number" step="0.01" id="balance" name="balance"  value="<?= $bank->getBalance() ?>">
                        <div class="error" id="error-balance"></div>
                    </div>
                    <div class="form">
                        <label for="userId">ID Client:</label>
                        <select name="userId" id="userId" disabled>
                            <?php foreach($users as $user): ?>
                                <option value="<?= $user->getId(); ?>" <?= $bank->getUserId() == $user->getId() ? 'selected' : ''; ?>>
                                    <?= "{$user->getId()} - {$user->getLastName()} {$user->getFirstName()}" ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="userId" value="<?= $bank->getUserId(); ?>">
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=bank-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
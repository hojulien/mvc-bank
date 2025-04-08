<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Modifier un compte existant</h1>
                <form action="?action=bank-update" method="POST">
                    <input type="hidden" name="id" value="<?= $bank->getId() ?>">
                    <div class="form">
                        <label for="iban">IBAN:</label>
                        <input type="text" id="iban" name="iban" value="<?= $bank->getIban() ?>" required>
                    </div>
                    <div class="form">
                        <label for="typeA">Type de compte:</label>
                        <?php $typeA = $bank->getTypeAccount(); ?>
                        <select name="typeA" id="typeA">
                            <option <?= $typeA == 'Compte courant' ? 'selected' : '' ?> value="Compte courant">Compte courant</option>
                            <option <?= $typeA == 'Compte épargne' ? 'selected' : '' ?>value="Compte épargne">Compte épargne</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="balance">Solde bancaire</label>
                        <input type="number" step="0.01" min="0" id="balance" name="balance"  value="<?= $bank->getBalance() ?>" required>
                    </div>
                    <div class="form">
                        <label for="userId">ID Client:</label>
                        <input type="number" id="userId" name="userId" value="<?= $bank->getUserId() ?>" required>
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=bank-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
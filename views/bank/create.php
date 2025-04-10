<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Ajouter un nouveau compte</h1>
                <form action="?action=bank-add" method="POST">
                    <div class="form">
                        <label for="iban">IBAN:</label>
                        <input type="text" id="iban" name="iban" required>
                    </div>
                    <div class="form">
                        <label for="typeA">Type de compte:</label>
                        <select name="typeA" id="typeA">
                            <option value="Compte courant">Compte courant</option>
                            <option value="Compte épargne">Compte épargne</option>
                        </select>
                    </div>
                    <div class="form">
                        <label for="balance">Solde bancaire</label>
                        <input type="number" step="0.01" id="balance" name="balance" required>
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
                
                <button class="return"><a href="?action=bank-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
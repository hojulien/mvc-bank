<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Modifier un client</h1>
                <form action="?action=user-update" method="POST">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>">
                    <div class="form">
                        <label for="fName" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="fName" name="fName" value="<?= $user->getFirstName() ?>" required>
                    </div>
                    <div class="form">
                        <label for="lName" class="form-label">Prénom:</label>
                        <input type="text" class="form-control" id="lName" name="lName" value="<?= $user->getLastName() ?>" required>
                    </div>
                    <div class="form">
                        <label for="email" class="form-label">Adresse e-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user->getEmail() ?>" required>
                    </div>
                    <div class="form">
                        <label for="phoneN" class="form-label">Numéro de téléphone:</label>
                        <input type="text" class="form-control" id="phoneN" name="phoneN" value="<?= $user->getPhoneNumber() ?>" required>
                    </div>
                    <div class="form">
                        <label for="address" class="form-label">Adresse: </label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $user->getAddress() ?>">
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=user-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
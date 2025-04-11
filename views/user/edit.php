<?php require_once __DIR__ . '/../templates/header.php'; ?>
            <script src="./assets/scripts/userform.js" defer></script>
            <section>
                <div class="title">
                    <h1>Modifier un client existant</h1>
                </div>
                <form id="formUser" action="?action=user-update" method="POST">
                    <input type="hidden" name="id" value="<?= $user->getId() ?>">
                    <div class="form">
                        <label for="fName">Nom:</label>
                        <input type="text" id="fName" name="fName" value="<?= $user->getFirstName() ?>">
                        <div class="error" id="error-fName"></div>
                    </div>
                    <div class="form">
                        <label for="lName">Prénom:</label>
                        <input type="text" id="lName" name="lName" value="<?= $user->getLastName() ?>">
                        <div class="error" id="error-lName"></div>
                    </div>
                    <div class="form">
                        <label for="email">Adresse e-mail:</label>
                        <input type="text" id="email" name="email" value="<?= $user->getEmail() ?>">
                        <div class="error" id="error-email"></div>
                    </div>
                    <div class="form">
                        <label for="phoneN">Numéro de téléphone:</label>
                        <input type="text" id="phoneN" name="phoneN" value="<?= $user->getPhoneNumber() ?>">
                        <div class="error" id="error-phoneN"></div>
                    </div>
                    <div class="form">
                        <label for="address">Adresse: </label>
                        <input type="text" id="address" name="address" value="<?= $user->getAddress() ?>">
                        <div class="error" id="error-address"></div>
                    </div>
                    <button class="form-valid" type="submit">Modifier les informations</button>
                </form>
                
                <button class="return"><a href="?action=user-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
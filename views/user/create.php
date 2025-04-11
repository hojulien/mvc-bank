<?php require_once __DIR__ . '/../templates/header.php'; ?>
            <script src="./assets/scripts/userform.js" defer></script>
            <section>
                <div class="title">
                    <h1>Ajouter un nouveau client</h1>
                </div>
                <form id="formUser" action="?action=user-add" method="POST">
                    <div class="form">
                        <label for="fName">Nom:</label>
                        <input type="text" id="fName" name="fName">
                        <div class="error" id="error-fName"></div>
                    </div>
                    <div class="form">
                        <label for="lName">Prénom:</label>
                        <input type="text" id="lName" name="lName">
                        <div class="error" id="error-lName"></div>
                    </div>
                    <div class="form">
                        <label for="email">Adresse e-mail:</label>
                        <input type="text" id="email" name="email">
                        <div class="error" id="error-email"></div>
                    </div>
                    <div class="form">
                        <label for="phoneN">Numéro de téléphone:</label>
                        <input type="text" id="phoneN" name="phoneN">
                        <div class="error" id="error-phoneN"></div>
                    </div>
                    <div class="form">
                        <label for="address">Adresse: </label>
                        <input type="text" id="address" name="address">
                        <div class="error" id="error-address"></div>
                    </div>
                    <button class="form-valid" type="submit">Ajouter</button>
                </form>
                
                <button class="return"><a href="?action=user-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
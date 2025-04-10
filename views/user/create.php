<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <div class="title">
                    <h1>Ajouter un nouveau client</h1>
                </div>
                <form action="?action=user-add" method="POST">
                    <div class="form">
                        <label for="fName" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="fName" name="fName" required>
                    </div>
                    <div class="form">
                        <label for="lName" class="form-label">Prénom:</label>
                        <input type="text" class="form-control" id="lName" name="lName" required>
                    </div>
                    <div class="form">
                        <label for="email" class="form-label">Adresse e-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form">
                        <label for="phoneN" class="form-label">Numéro de téléphone:</label>
                        <input type="text" class="form-control" id="phoneN" name="phoneN" required>
                    </div>
                    <div class="form">
                        <label for="address" class="form-label">Adresse: </label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <button class="form-valid" type="submit">Ajouter</button>
                </form>
                
                <button class="return"><a href="?action=user-list" >Retour à la liste</a></button>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
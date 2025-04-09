<?php require_once __DIR__ . '/templates/header.php'; ?>
                <section>
                    <form action="?action=doLogin" method="POST">
                        <div class="form">
                            <label>Adresse email:</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form">
                            <label>Mot de passe:</label>
                            <input type="password" name="password" required>
                        </div>
                        <div>
                            <button class="form-valid" type="submit">Se connecter</button>
                        </div>
                    </form>
                </section>+

<?php require_once __DIR__ . '/templates/footer.php';

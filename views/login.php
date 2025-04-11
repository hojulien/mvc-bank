<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php 
    if (isset($_SESSION['admin_id'])) {
        redirect("?");
    } 
?>
                <script src="./assets/scripts/login.js" defer></script>
                <section>
                    <form id="login" action="?action=doLogin" method="POST">
                        <div class="form">
                            <label>Adresse email:</label>
                            <input type="text" name="email" id="email">
                            <div class="error" id="error-email"></div>
                        </div>
                        <div class="form">
                            <label>Mot de passe:</label>
                            <input type="password" name="password">
                        </div>
                        <div>
                            <?php
                                if (isset($_SESSION['error_message'])) {
                                    echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
                                    unset($_SESSION['error_message']); 
                                }
                            ?>
                            <button class="form-valid" type="submit">Se connecter</button>
                        </div>
                    </form>
                </section>

<?php require_once __DIR__ . '/templates/footer.php';

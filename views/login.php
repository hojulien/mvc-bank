<?php require_once __DIR__ . '/templates/header.php'; ?>

<form action="?action=doLogin" method="POST">
    <div>
        <label>Adresse email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Mot de passe:</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">Se connecter</button>
    </div>
</form>

<?php require_once __DIR__ . '/templates/footer.php';

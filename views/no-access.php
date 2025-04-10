<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php 
    if (isset($_SESSION['admin_id'])) {
        redirect("?");
    } 
?>

    <section>
        <h1>🚫 Accès non autorisé</h1> <br>
        <p>Vous n'avez pas les permissions pour accéder à cette page.</p>
        <p>Redirection vers la page de connexion dans <span id="countdown">5</span> secondes...</p>
        <p>Si cela ne marche pas, <a id="toLogin" href="?action=login">cliquez ici!</a>.</p>

        <script>
            let seconds = 5;
            const countdownElement = document.getElementById('countdown');

            const interval = setInterval(() => {
                seconds--;
                countdownElement.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(interval);
                    window.location.href = "?action=login";
                }
            }, 1000);
        </script>
    </section>

<?php require_once __DIR__ . '/templates/footer.php';
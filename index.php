<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Book Mood - Connexion</title>
</head>

<body>

    <div class="login-page-wrapper">
        <div class="login-box">

            <h1 class="site-title login-title">Book Mood</h1>

            <hr class="login-hr">

            <h2>Se connecter</h2>

            <form action="php/login_action.php" method="POST">

                <input type="email" name="email" placeholder="Adresse Email" required><br>
                <input type="password" name="password" placeholder="Mot de passe" required><br>

                <button type="submit" class="login-button">Se connecter</button>
            </form>

            <p class="register-link-container">
                Pas encore de compte ? <a href="register.php" class="register-link">Créer un compte</a>
            </p>
        </div>
    </div>

</body>

</html>
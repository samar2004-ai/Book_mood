<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Se connecter</h2>

        <form action="php/login_action.php" method="POST">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <button type="submit">Login</button>
        </form>

        <a href="register.php">Créer un compte</a>
    </div>
</body>

</html>
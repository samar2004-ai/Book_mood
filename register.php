<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h2>Créer un compte</h2>

        <form action="php/register_action.php" method="POST">
            <input type="text" name="name" placeholder="Nom complet" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <button type="submit">Créer</button>
        </form>

        <a href="index.php">Déjà un compte ? Login</a>
    </div>
</body>

</html>
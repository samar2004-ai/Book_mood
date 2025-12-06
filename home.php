<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/search.js" defer></script>
</head>

<body>
    <div class="container">
        <h2>Bienvenue, <?php echo $_SESSION["user"]; ?> 👋</h2>

        <input type="text" id="search" placeholder="Rechercher un livre...">

        <h3>Livres les plus recommandés</h3>
        <div id="books"></div>

        <br><br>
        <a class="btn" href="recommendations.php">🎭 Quiz Mood</a>
    </div>
</body>

</html>
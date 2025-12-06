<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/search.js" defer></script>
    <title>Book Mood - Accueil</title>
</head>

<body>
    <div class="container main-content-area">

        <h2>Bienvenue, <?php echo $_SESSION["user"]; ?> 👋</h2>

        <header class="main-header">
            <div class="header-top">
                <h1 class="site-title">Book Mood</h1>

                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php" class="current-page">Quiter</a></li>
                        <li><a href="recommendations.php" class="quiz-link">Quiz & Recommandations</a></li>
                    </ul>
                    <div class="ribbon-tail"></div>
                </nav>
            </div>

            <div class="hero-section">
                <div class="hero-text-box">
                    <h2>Trouvez le livre parfait pour votre Mood.</h2>
                    <p>Découvrez les pépites littéraires que nos experts recommandent pour éveiller votre humeur et votre curiosité.</p>
                </div>
            </div>
        </header>

        <input type="text" id="search" placeholder="Rechercher un livre par titre ou auteur...">

        <h3>Découvrez les favoris de la communauté</h3>
        <div id="books" class="books-grid">
            <p>Chargement des livres...</p>
        </div>

        <br>


    </div>
</body>

</html>
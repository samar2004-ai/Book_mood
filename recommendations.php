<?php
// PHP minimal pour gérer les valeurs par défaut
$defaults = [
    "mood" => "",
    "q1" => "",
    "q2" => "",
    "q3" => "",
    "length" => "",
    "language" => ""
];
$form_values = $defaults;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Quiz Mood</title>
</head>

<body>
    <div class="container">
        <a href="home.php" class="return-home-link">← Retour à l'Accueil</a>
        <h2>Choisis ton mood et réponds aux questions :</h2>
        <form action="results.php" method="POST">

            <label>Mood :</label>
            <select name="mood">
                <option value="" selected>Choisis</option>
                <?php foreach (["happy", "sad", "calm", "curious", "reflective"] as $m): ?>
                    <option value="<?= $m ?>"><?= ucfirst($m) ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label>Quand tu rêves, c’est plutôt :</label>
            <select name="q1">
                <option value="" selected class="placeholder">Choisis</option>
                <option value="realiste">Réaliste</option>
                <option value="symbolique">Symbolique</option>
                <option value="chaotique">Chaotique</option>
            </select><br><br>

            <label>Si ta vie était un film, serait-ce :</label>
            <select name="q2">
                <option value="" selected class="placeholder">Choisis</option>
                <option value="drame">Un drame</option>
                <option value="thriller">Un thriller</option>
                <option value="epopee">Une épopée</option>
            </select><br><br>

            <label>Comment vois-tu le monde :</label>
            <select name="q3">
                <option value="" selected class="placeholder">Choisis</option>
                <option value="mystere">Un mystère</option>
                <option value="histoire">Une histoire</option>
                <option value="emotion">Une émotion</option>
            </select><br><br>

            <hr>

            <label>longueur ?</label>
            <select name="length">
                <option value="" selected class="placeholder">Choisis</option>
                <option value="short">Court</option>
                <option value="medium">Moyen</option>
                <option value="long">Long</option>
            </select><br><br>

            <label>langue ?</label>
            <select name="language">
                <option value="" selected class="placeholder">Choisis</option>
                <option value="fr">Français</option>
                <option value="en">Anglais</option>
                <option value="ar">Arabe</option>
            </select><br><br>

            <button type="submit">Voir mes livres</button>
        </form>
    </div>
</body>

</html>
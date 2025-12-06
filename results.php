<?php
// Lire le JSON
$books = json_decode(file_get_contents("data/books.json"), true);

// Mapping des questions vers les moods
$map = [
    "q1" => [
        "realiste" => "focus",
        "symbolique" => "curious",
        "chaotique" => "tense"
    ],
    "q2" => [
        "drame" => "sad",
        "thriller" => "tense",
        "epopee" => "adventurous"
    ],
    "q3" => [
        "mystere" => "mystery",
        "histoire" => "reflective",
        "emotion" => "emotional"
    ]
];

$defaults = [
    "mood" => "",
    "q1" => "",
    "q2" => "",
    "q3" => "",
    "length" => "",
    "language" => ""
];


$form_values = [];
foreach ($defaults as $key => $value) {
    // Récupère aussi length et language de $_POST
    $form_values[$key] = $_POST[$key] ?? $value;
}


$moods_from_questions = [];
if (!empty($form_values["mood"])) $moods_from_questions[] = $form_values["mood"];
foreach (["q1", "q2", "q3"] as $q) {
    if (!empty($form_values[$q]) && isset($map[$q][$form_values[$q]])) {
        $moods_from_questions[] = $map[$q][$form_values[$q]];
    }
}
$moods_from_questions = array_filter($moods_from_questions);


$results = array_filter($books, function ($b) use ($moods_from_questions, $form_values) {
    $mood_match = count(array_intersect($b["moods"], $moods_from_questions)) > 0;

    // Si aucun mood n'est choisi, on considère que c'est un match (pour que les filtres stricts puissent fonctionner)
    if (empty($moods_from_questions)) {
        $mood_match = true;
    }

    // Filtrage par Langue (AND)
    $language_match = true;
    if (!empty($form_values["language"])) {
        $language_match = ($b["language"] ?? "") === $form_values["language"];
    }

    // Filtrage par Longueur (AND)
    $length_match = true;
    if (!empty($form_values["length"])) {
        $length_match = ($b["length"] ?? "") === $form_values["length"];
    }

    return $mood_match && $language_match && $length_match;
});


$nombre_max_a_afficher = 6;
$results = array_slice($results, 0, $nombre_max_a_afficher);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Mes Recommandations</title>
</head>

<body>
    <div class="container results-container">
        <div class="navigation-links">
            <a href="home.php" class="return-home-link">← Retour à l'Accueil</a>

            <a href="recommendations.php">Recommencer le Quiz</a>
            <a href="index.php">Quiter</a>
        </div>
        <hr>
        <h2>Livres recommandés pour ton mood :</h2>
        <?php if (count($results) > 0): ?>
            <div class="books-grid"> <?php foreach ($results as $b): ?>
                    <div class="book">
                        <img src="<?= $b["cover"] ?>" alt="<?= $b["title"] ?>" width="120">
                        <h4><?= $b["title"] ?></h4>
                        <p><?= $b["author"] ?></p>
                        <a href="<?= $b["url"] ?>" target="_blank">Lire</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun livre ne correspond à tes choix 😢. Essaie de répondre à plus de questions ou de modifier tes critères !</p>
        <?php endif; ?>
    </div>
</body>

</html>
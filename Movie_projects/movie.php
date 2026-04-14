<?php 

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("<h3>Erreur : Aucun film sélectionné.</h3><p><a href='allMovies.php'>⬅ Retour à la liste des films</a></p>");
    }

    $id_film = $_GET['id'];

    $dbname = "Movie_project";
    $password = "root";
    $root = "root";
    $host = "localhost";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $root, $password, $options);
    } catch(PDOException $e) {
        die("Erreur de connexion : ".$e->getMessage());
    }

    try {
        $request = $pdo->prepare("SELECT * FROM films WHERE id_imdb = :id");
        $request->execute([
            ':id' => $id_film
        ]);
        $film = $request->fetch();
        
        if (!$film) {
            die("<h3>Erreur : Ce film n'existe pas dans votre base de données.</h3><p><a href='allMovies.php'>⬅ Retour à la liste des films</a></p>");
        }

    } catch(PDOException $e) {
        die("Erreu de requete : ".$e->getMessage());
    }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesss/movie.css">

    <title><?php echo $film['titre']; ?> - Détails</title>
</head>
<body>
    <a href="allMovies.php">⬅ Retour à la liste des films</a>
    <hr>

    <h1><?php echo $film['titre']; ?></h1>
    
    <p>Date de sortie : <?php echo $film['date_sortie']; ?></p>

    <img src="<?php echo $film['affiche']; ?>" alt="Affiche de <?php echo $film['titre']; ?>" width="250">

    <p><strong>Durée :</strong> <?php echo $film['duree']; ?></p>
    
    <h3>Synopsis :</h3>
    <p><?php echo $film['description']; ?></p>

    <h3>Casting Principal :</h3>


    <p><?php echo $film['acteurs']; ?></p>

    <hr>
    
    <h3>Mon avis :</h3>
    <?php if(!empty($film['note_perso'])): ?>
        <p><strong>Note :</strong> <?php echo $film['note_perso']; ?> / 10</p>
        <p><strong>Commentaire :</strong> <?php echo $film['commentaire_perso']; ?></p>
    <?php else: ?>
        <p>Aucun avis laissé pour ce film.</p>
    <?php endif; ?>

</body>
</html>
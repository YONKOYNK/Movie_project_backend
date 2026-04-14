<?php 
    $dbname = "Movie_project";
    $password = "root";
    $root = "root";
    $host = "localhost";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $root, $password, $options);
    }catch(PDOException $e){
        die("VOici votre erreur : ".$e->getMessage());
    }

    try{
        $all_movies_request = $pdo->query("select id_imdb, titre, date_sortie, duree, affiche, description from films");
        $all_movies = $all_movies_request->fetchAll();
    }catch(PDOException $e){
        die("VOici votre erreur : ".$e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesss/allMovie.css">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php 
            foreach($all_movies as $element){
                echo "<a href='movie.php?id=" . $element['id_imdb'] . "'>";
                echo "<img src='" . $element['affiche'] . "'>";
                echo "</a>";
                echo "<li>".$element['id_imdb']."</li>";
                echo "<li>".$element['titre']."</li>";
                echo "<li>".$element['date_sortie']."</li>";
                echo "<li>".$element['duree']."</li>";
                echo "<li>".$element['description']."</li>";
                echo "<hr>";


            }
        ?>
    </ul>
</body>
</html>
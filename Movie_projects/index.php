<?php 
    $id_film = $_GET['id'] ?? 'tt0114369';
    $chemin_fichier = "data_movies/" . $id_film . ".html";

    $nom_film = "Rien trouver"; // fait 
    $affiche_src = "Rien trouver"; // fait
    $duree_du_filme = "Rien trouver"; // fait
    $date_de_sortie = "RIen trouver"; // fait
    $description_du_filme = "RIen trouver"; // fait

    $acteurs_du_filme = []; // fait

    $regex_titre = '/<h1[^>]*>(.*?)<\/h1>/is';
    $regex_duree_filme = '/<li[^>]*ipc-inline-list[^>]*>([0-9]+[hm].*?)<\/li>/is';    $regex_affiche = '/<img.*?class="ipc-image".*?src="(.*?)".*?>/is'; // fait
    $regex_date_de_sortie = '/<a.*?href=".*?releaseinfo.*?".*?>(.*?)<\/a>/is'; // fait
    $regex_description = '/<p.*?data-testid="plot".*?>(.*?)<\/p>/is';

    $regex_des_acteur_du_filme = '/<a[^>]*href="\/name\/nm[0-9]+[^>]*>([^<]+)<\/a>/is';

    if(file_exists($chemin_fichier)){
        $folder_content = file_get_contents($chemin_fichier);


        if(preg_match($regex_titre, $folder_content, $matches)){
            $nom_film = trim(strip_tags($matches[1]));
        }

        if(preg_match($regex_duree_filme, $folder_content, $matches)){
            $duree_du_filme = trim(strip_tags($matches[1]));
        }

        if(preg_match($regex_affiche, $folder_content, $matches)){
            $affiche_src = trim($matches[1]); // Juste trim pour l'URL
        }

        if(preg_match($regex_date_de_sortie, $folder_content, $matches)){
            $date_de_sortie = trim(strip_tags($matches[1]));
        }

        if(preg_match($regex_description, $folder_content, $matches)){
            $description_du_filme = trim(strip_tags($matches[1]));
        }

        if(preg_match_all($regex_des_acteur_du_filme, $folder_content, $matches)){
            $acteurs_du_filme = $matches[1];
        }
    }


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

    if(isset($_POST['note']) && isset($_POST['commentaire'])){
        $commentaire = $_POST['commentaire'];
        $note = $_POST['note'];

        if(!empty($commentaire) && !empty($note) && !empty($id_film)){
            $acteurs_en_texte = implode(", ", $acteurs_du_filme);
            try{
                $db_data_insert = $pdo->prepare("insert into films(id_imdb, titre, date_sortie, duree, affiche, description, acteurs, note_perso, commentaire_perso ) values(:id , :titre, :date_sortie, :duree, :affiche, :desc, :acteurs, :note, :commentaire)");
                $db_data_execute = $db_data_insert->execute([
                    ":id" => $id_film,
                    ":titre" => $nom_film,
                    ":date_sortie" => $date_de_sortie,
                    ":duree" => $duree_du_filme,
                    ":affiche" => $affiche_src,
                    ":desc" => $description_du_filme,
                    ":acteurs" => $acteurs_en_texte,
                    ":note" => $note,
                    ":commentaire" => $commentaire,


                ]);

            }catch(PDOException $e){
                die("Voici votre erreur : ".$e->getMessage());
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesss/index.css">
    <title>Movie Project</title>
</head>
<body>
    <h1><?php echo $nom_film ?></h1>
    <p>La date : <?php echo $date_de_sortie ?></p>

    <img src="<?php echo $affiche_src ?>" alt="">

    <p>La duree du filme : <?php echo $duree_du_filme ?></p>

    <p>Description du filme : <?php echo $description_du_filme?></p>


    <ul>
        <?php 
            foreach($acteurs_du_filme as $element){
                echo "<li>".$element."</li>";
            }
        ?>
    </ul>

    <form action="" method="POST">
        <label for="note">Note : </label>
        <input type="number" name="note">
        <label for="commentaire">Commentaire : </label>
        <input type="text" name="commentaire">
        <button type="submit">Valider</button>
    </form>
</body>
</html>
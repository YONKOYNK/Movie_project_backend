<?php 
    $resultats_recherche = [];
    $erreur = ""; 

    if(isset($_GET['nameFilm'])){
        $filme_name = $_GET['nameFilm'];
        if(!empty($filme_name)){
            $recherche = strtolower($_GET['nameFilm']);
            $chemin_fichier = "data_movies/search_" . $recherche . ".html";

            if(file_exists($chemin_fichier)){
                $contenu_page_recherche = file_get_contents($chemin_fichier);
                $regex_recherche = '/class="ipc-image"[^>]*src="([^"]+)".*?href="\/title\/(tt[0-9]+)\/[^>]*>.*?<h3 class="ipc-title__text">([^<]+)<\/h3>/is';

                if(preg_match_all($regex_recherche, $contenu_page_recherche, $matches)){
                
                    for($i = 0; $i < count($matches[2]); $i++) {
                        $id = $matches[2][$i];
                
                        if(!isset($resultats_recherche[$id])) {
                            $resultats_recherche[$id] = [
                                'id_imdb' => $id,
                                'affiche' => $matches[1][$i],
                                'titre'   => trim(strip_tags($matches[3][$i]))
                            ];
                        }
                    }
                
                } else {
                    $erreur = "Le fichier existe, mais aucun film n'a été trouvé à l'intérieur.";
                }
            
            } else {
                $erreur = "Le fichier 'search_" . htmlspecialchars($recherche) . ".html' est introuvable.";
            }
        } else {
            $erreur = "Veuillez taper un nom de film.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesss/acceuil.css">

    <title>Document</title>
</head>
<body>
    <h1>Recherche ton filme ici</h1>
    <form action="" method="GET">
        <input type="text" name="nameFilm">
        
        <button type="submit">Send</button>
    </form>

    <?php 
        if(!empty($erreur)){
            echo "<p style='color: red;'>" . $erreur . "</p>";
        }

        if(!empty($resultats_recherche)){
            echo "<hr>";
            echo "<h2>Voici les résultats :</h2>";

            echo "<ul>";
            foreach($resultats_recherche as $film){
                echo "<li>";
                
                echo "<img src='" . $film['affiche'] . "' width='100' alt='Affiche'>";
                echo "<br>";
                echo "<strong>" . $film['titre'] . "</strong>";
                echo "<br>";
                
                echo "<a href='index.php?id=" . $film['id_imdb'] . "'>";
                echo "<button type='button' style='margin-top: 5px;'>Voir le détail</button>";
                echo "</a>";
                
                echo "</li><br>";
            }
            
            echo "</ul>";
        }
    ?>

</body>
</html>
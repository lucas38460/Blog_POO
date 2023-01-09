<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>

<body>
    <?php
    include("./include/inlcude.php");
    include("./class/Manager.class.php");
    include("./class/Blog.class.php");

    $post = new Manager($base);
    $content = $post->affichage();
    // print_r($post->affichage());
    foreach ($content as $value) {
        echo "<h1>Titre: " . $value->getTitre() . "</h1>";
        echo "<img src='./img/" . $value->getImage() . "'>";
        echo "<p>Commentaire: " . $value->getCommentaire() . "</p>";
    }

    ?>
</body>
<style>
    img {
        max-width: 200px;
    }

    a {
        text-decoration: none;
        color: blue;
    }

    #espacement {
        margin-right: 80px;
    }
</style>

</html>
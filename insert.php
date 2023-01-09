<?php
include("./include/inlcude.php");
include("./class/Manager.class.php");
include("./class/Blog.class.php");

if (isset($_FILES['img']['name'])) {
    // Chemin final de l'image
    $chemin_destination = './img/';
    // Récupération de l'extension
    $extention = explode('.', $_FILES['img']['name'])[1];
    // Récupération du nom de l'image + changement du nom en uniqid()
    $img_name = uniqid() . "." . $extention;
    //déplacement du fichier dans le dossier img
    move_uploaded_file($_FILES["img"]["tmp_name"], $chemin_destination . $img_name);
}

if (isset($_POST) && $_POST["titre"] > 0) {
    $titre = $_POST['titre'];
    $commentaire = $_POST['commentaire'];
    $image = $img_name;
    $id = uniqid();

    $manager = new Manager($base);
    $blog = new Blog($titre, $commentaire, $image);
    $manager->insertion($blog);
    header('Location:./index.php');
}

<?php
class User
{
    // Déclaration des attributs
    private $identifiant = "";
    private $password = "";
    private $id = "";

    public function __construct($identifiant, $password, $id)
    {
        $this->identifiant = $identifiant;
        $this->password = $password;
        $this->id = $id;
    }

    public function register()
    {

        if (isset($_POST)) {
            try {
                include("../include/inlcude.php");
                $sql = "SELECT `identifiant`, `password` FROM login WHERE identifiant = :identifiant AND password = :password";
                // Préparation de la requête avec les marqueurs
                $resultat = $base->prepare($sql);
                $resultat->execute(array('identifiant' => $this->identifiant, 'password' => $this->password));
                // Si le compte existe déjà (a été créé aumoins)
                if ($resultat->rowCount() > 0) {
                    header("Location:index.php?Login=existant");
                } else {
                    // Creation du compte puisqu'il n'existe pas
                    $sql_create = "INSERT INTO login (`id`, `identifiant`, `password`, `role`) VALUES (:id ,:identifiant, :password, :role)";
                    $resultat2 = $base->prepare($sql_create);
                    $resultat2->execute(array('id' => uniqid(), 'identifiant' => htmlentities($_POST['identifiant']), 'password' => htmlentities(hash("sha256", $_POST['password'])), 'role' => "user"));
                    $_SESSION['pseudo'] = $_POST['identifiant'];
                    $_SESSION['droit'] = $resultat->fetch()['role'];
                    header("Location:../page/affichage.php");
                }
                $resultat->closeCursor();
            } catch (Exception $e) {
                // message en cas d'erreur
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
}

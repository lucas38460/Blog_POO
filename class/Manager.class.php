<?php
class Manager
{
    // Déclaration des attributs
    private $connexion = "";


    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function getConnexion()
    {
        return $this->connexion; //retourne la couleur
    }

    public function setConnexion($connexion)
    {
        $this->connexion = $connexion; //retourne la couleur
    }

    public function insertion($blog)
    {
        try {
            $sql = "INSERT INTO post (Id, Date, Comment, Title, image, Author) VALUES (:id, :date, :comment, :title, :image, :Author)";
            // Préparation de la requête avec les marqueurs
            $resultat = $this->connexion->prepare($sql);
            $resultat->execute(array('id' => uniqid(), 'date' => date('Y-m-d H:i:s'), 'comment' => htmlentities($blog->getCommentaire()), 'title' => htmlentities($blog->getTitre()), 'image' => $blog->getImage(), 'Author' => 'Lux'));
            $resultat->closeCursor();
            // Redirection vers le blog après l'envoie du post
        } catch (Exception $e) {
            // message en cas d'erreur
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function affichage()
    {

        try {
            // Requette des posts
            $sql = "SELECT * FROM post ORDER BY Date DESC";
            // Préparation de la requête avec les marqueurs
            $resultat = $this->connexion->prepare($sql);
            $resultat->execute();
            // Si il y a des publications
            if ($resultat->rowCount() > 0) {
                $array_posts = array();
                // Tant qu'il y en a on les récupère puis les affichent
                while ($ligne = $resultat->fetch()) {
                    $date = date_format(date_create($ligne['Date']), 'd-m-Y H:i:s');
                    $titre = $ligne['Title'];
                    $commentaire = $ligne['Comment'];
                    $image = $ligne['image'];
                    array_push($array_posts, $posts = new Blog($titre, $commentaire, $image));
                }
                $resultat->closeCursor();
                return $array_posts;
            } else {
                echo "<br> <p>Il n'y a aucune publication</p>";
            }
        } catch (Exception $e) {
            // message en cas d'erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
}

<?php
class Blog
{
    // Déclaration des attributs
    private $titre = "";
    private $commentaire = "";
    private $image = "";

    public function __construct($titre, $commentaire, $image)
    {
        $this->titre = $titre;
        $this->commentaire = $commentaire;
        $this->image = $image;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre; //retourne la couleur
    }

    public function getTitre()
    {
        return $this->titre; //retourne la couleur
    }


    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire; //retourne la couleur
    }

    public function getCommentaire()
    {
        return $this->commentaire; //retourne la couleur
    }

    public function setImage($image)
    {
        $this->image = $image; //retourne la couleur
    }

    public function getImage()
    {
        return $this->image; //retourne la couleur
    }
}

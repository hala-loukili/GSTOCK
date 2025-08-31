<?php
include 'connexion.php';


if (
    !empty($_POST['libelle_categorie'])
    && !empty($_POST['id'])
) {

    $sql = "UPDATE categorie_article SET libelle_categorie=? WHERE id=?";
        $req = $connexion->prepare(query: $sql);
        $req->execute(params: Array(
            $_POST['libelle_categorie'],
            $_POST['id']
        ));

        if ( $req->rowCount()!=0) {
            $_SESSION['message'] ['text'] = "catégorie modifié avec succès";
            $_SESSION['message'] ['type'] = "success";

        }else {
            $_SESSION['message'] ['text'] = "rien a été modifié";
            $_SESSION['message'] ['type'] = "warning";
          
        }

} else {
    $_SESSION['message'] ['text'] = "Une information obligatoire non rensignée";
    $_SESSION['message'] ['type'] = "danger";
   
}

header('Location:../vue/categorie.php');

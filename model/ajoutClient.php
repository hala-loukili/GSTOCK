<?php
include 'connexion.php';


if (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
) {

    $sql = "INSERT INTO $nom_base_de_donne.client(nom, prenom, telephone, adresse) 
            VALUES(?,?,?,?)";
        $req = $connexion->prepare(query: $sql);

        $req->execute(params: array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $_POST['adresse'],

        ));

        if ( $req->rowCount()!=0) {
            $_SESSION['message'] ['text'] = "client ajouté avec succès";
            $_SESSION['message'] ['type'] = "success";

        }else {
            $_SESSION['message'] ['text'] = "une erreur s'est produite lors de l'ajout du client";
            $_SESSION['message'] ['type'] = "danger";
          
        }

} else {
    $_SESSION['message'] ['text'] = "Une information obligatoire non rensignée";
    $_SESSION['message'] ['type'] = "danger";
   
}

header('Location:../vue/client.php');

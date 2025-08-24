<?php
include 'connexion.php';


if (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
) {

    $sql = "UPDATE client SET nom=?, prenom=?, telephone=?, adresse=? WHERE id=?";
        $req = $connexion->prepare(query: $sql);
        $req->execute(params: Array(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $_POST['adresse'],
            $_POST['id']
        ));

        if ( $req->rowCount()!=0) {
            $_SESSION['message'] ['text'] = "client modifié avec succès";
            $_SESSION['message'] ['type'] = "success";

        }else {
            $_SESSION['message'] ['text'] = "rien a été modifié";
            $_SESSION['message'] ['type'] = "warning";
          
        }

} else {
    $_SESSION['message'] ['text'] = "Une information obligatoire non rensignée";
    $_SESSION['message'] ['type'] = "danger";
   
}

header('Location:../vue/client.php');

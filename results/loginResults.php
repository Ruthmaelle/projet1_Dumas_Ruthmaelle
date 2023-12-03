<?php
require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");
require_once("../functions/functions.php");

var_dump($_POST);

//Authentification
if(isset($_POST)) {
    //verifier si le nom est dans la base de donnes
    if(!empty($_POST['user_name'])) {
        $DataUser = getUserByUsername($_POST['user_name']);
    } else{
        //dans le cas la personne n'a saisi aucun nom
        $url = "../Authentification/login.php";
        header('Location: ', $url);
    }


    //si le username existe 
    if($DataUser) {
        $encodedPWD = addSalt($_POST['pwd']);
        if($DataUser['pwd'] == $encodedPWD) {
            //creer un token pour l'utilisateur
            $token = hash('sha256', random_bytes(32));
            echo '</br></br>Mon token : </br>';
            var_dump($token);
            //enregistrer le token en Session et dans la DB
            //photos

            //traitement si mdp correct
            $url = ""; //page principale
            header('Location: ' . $url);
            echo "Password correcte";
        }else{
            echo ("Password incorrecte");
            
        }
    }
}



?>
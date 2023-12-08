<?php
require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");
require_once("../functions/functions.php");
session_start();

var_dump($_POST);

//Authentification
if (isset($_POST)) {
    
    // recupere le username et password dans le formulaire
    $username = isset($_POST['user_name']);
    $password = isset($_POST['pwd']);

    //valider si le username et password sont present
    if (!$username) {
        $_SESSION['login_error'] = ['username' => 'Veuillez saisir un nom d\'utilisateur.'];
        $url = "../Authentification/login.php";
        header('Location: ' . $url);
        exit();
    }
    if (!$password) {
        $_SESSION['login_error'] = ['pwd' => 'Veuillez saisir un mot de passe.'];
        $url = "../Authentification/login.php";
        header('Location: ' . $url);
        exit();
    }

    //verifier si le nom est dans la base de donnes
    $userData = getUserByUsername($username);
    if(!$userData){
        $_SESSION['login_error'] = 'Nom d\'utilisateur introuvable.';
        $url = "../Authentification/login.php";
        header('Location: ' . $url);
        exit();
    }

    // encodage
    $encodedPWD = addSalt($password);

    // comparer avec celui dans la DB
    if ($userData['pwd'] == $encodedPWD) {
        // creer un token pour l'utilisateurx
        $token = hash('sha256', random_bytes(32));
        $username = $userData['user_name'];

        //enregistrer le token en Session et dans la DB
        $_SESSION['user_token'] = $token;
        $updateTokenQuery = "UPDATE user SET token = ? WHERE user_name =?";
        if($stmt = mysqli_prepare($conn, $updateTokenQuery)) {
            mysqli_stmt_bind_param($stmt,"ss",$token,$username);
            if (mysqli_stmt_execute($stmt)){
            echo("succes");
        } else{
            $_SESSION['login_error'] = ("Erreurs dans l'execution: " . mysqli_error($conn));
            $url = "../Authentification/login.php";
            header('Location: ' . $url);
            exit();
        }
    }else {
        echo("erreur dans le statement");
    }

        // Redirect to the main page
        header('Location: ../main_page.php');
        exit();
    } else {
        $_SESSION['login_error'] = 'Mot de passe incorrect.';
        header('Location: ../Authentification/login.php');
        exit();
    }
}else {
    // If the form is not submitted properly, redirect to the login page
    header('Location: ../Authentification/login.php');
    exit();
}

//si le username existe 
/*if(isset($DataUser)) {
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
*/
?>
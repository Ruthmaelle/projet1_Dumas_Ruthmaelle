<?php
require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");
require_once("../functions/functions.php");
session_start();

if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF token validation failed.");
}

var_dump($_POST);

$variable = 'superadmin';
//Authentification

if (isset($_POST)) {


    // recupere le username et password dans le formulaire
    $username = !empty($_POST['user_name'])? $_POST["user_name"] : NULL; 
    $password = !empty($_POST['pwd'])? $_POST["pwd"] : NULL;

    unset($_SESSION['login_error']);
    //valider si le username et password sont present
    if ($username == NULL) {
        $_SESSION['login_error'] = ['user_name' => 'Veuillez saisir un nom d\'utilisateur.'];
        $url = "../Authentification/login.php";
        header('Location: ' . $url);
    }
    if ($password == NULL) {
        $_SESSION['login_error'] = ['pwd' => 'Veuillez saisir un mot de passe.'];
        $url = "../Authentification/login.php";
        header('Location: ' . $url);
    }

    //verifier si le nom est dans la base de donnes
    $userData = getUserByUsername($_POST['user_name']);

    if(empty($userData)){
        $_SESSION['login_error'] = ['user_name' => 'Nom d\'utilisateur introuvable.'];
        var_dump("nom d'utilisateur introuvable");
        $url = "../Authentification/login.php";
        header('Location: ' . $url);
        exit();
    }elseif ($username == $variable){
        echo("succes");
        // Redirect to the main page for admin
        $url= '../pages/interfaceAdmin.php'; //not there yet
        header('Location: ' . $url);
        $_SESSION['user_name'] = $variable;
        exit();
    }else {
        //si le nom existe
        //enregistre le username dans la DB pour les futurs modifications 
        $_SESSION['user_name'] = $userData['user_name'];

        // encodage
        echo("<br> <br> Bienvenue " . $userData);
        $encodedPWD = addSalt($password);
        //enregistre le pwd dans la DB pour les futurs modifications 
        $_SESSION['pwd'] = $password;

        // comparer avec celui dans la DB
        if ($userData['pwd'] == $encodedPWD) {
            // creer un token pour l'utilisateurx
            $token = hash('sha256', random_bytes(32));
            $username = $userData['user_name'];

            //enregistrer le token en Session et dans la DB //WORKS
            $_SESSION['user_token'] = $token;
            $updateTokenQuery = "UPDATE user SET token = ? WHERE user_name =?";
            if($stmt = mysqli_prepare($conn, $updateTokenQuery)) {
                mysqli_stmt_bind_param($stmt,"ss",$token,$username);
                if (mysqli_stmt_execute($stmt)){
                echo("succes");
                // Redirect to the main page
                header('Location: ../pages/ecom.php'); //not there yet
                exit();
            } else{
                $_SESSION['login_error'] = ("Erreurs dans l'execution: " . mysqli_error($conn));
                $url = "../Authentification/login.php";
                header('Location: ' . $url);
                exit();
            }
            }else {
            echo("erreur dans le statement");
            }

        } else {
            $_SESSION['login_error'] = ['pwd' => 'Mot de passe incorrect.'];
            header('Location: ../Authentification/login.php');
            exit();
        }
    } //fin du else pour si le nom existe
    
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
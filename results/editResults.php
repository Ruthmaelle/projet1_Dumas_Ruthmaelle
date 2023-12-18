<?php
session_start();
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
require_once("../functions/functions.php");
require_once("../Configuration/connexion.php");


// verifie si le le formulaire a ete envoyer
if (isset($_POST)) {

    unset($_SESSION['edit_errors']);
    // Assuming user ID is stored in the session
    $user_name = $_SESSION['user_name'];

    if(empty($_POST['fname'] and $_POST['lname']and $_POST['email'] and $_POST['pwd'])) {
        $url = "../Authentification/edit.php";
        header('location: ', $url);
    }else{

        // Ajouter les validations
        $fnameValid = fnameIsValid($_POST['fname']);
        $lnameValid = lnameIsValid($_POST['lname']);
        $emailValid = emailIsValid($_POST['email']);
        $pwdValid = pwdLenghtValidation($_POST['pwd']);

        if ($fnameValid['isValid'] && $lnameValid['isValid'] && $emailValid['isValid'] && $pwdValid['isValid']) {
            // All validations passed, update user information
    
            $newSaltCode = addSalt($_POST['pwd']);
            $data = [
                'email' => $_POST['email'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'pwd' => $newSaltCode
            ];
    
            $EditUser = updateUser($data);

            echo("<br> <br> Vos infos ont ete modifie avec succes " . $user_name);
            echo("<br> Nouveau Prenom: " . $_POST['fname']);
            echo("<br> Nouveau Nom: " . $_POST['lname']);
            echo("<br> Nouveau Email: " . $_POST['email']);
            echo("<br> Noveau Password: " . $_POST['pwd']);
        }else {

            //afficher les messages d'erreurs
            $_SESSION['edit_errors']['fname'] = $fnameValidation['msg'];
            $_SESSION['edit_errors']['lname'] = $lnameValidation['msg'];
            $_SESSION['edit_errors']['email'] = $emailValidation['msg'];
            $_SESSION['edit_errors']['pwd'] = $pwdValidation['msg'];
    
            header("Location: ../results/editResults.php");
            exit();
        }
    }
} else {
    // If the form is not submitted through the POST method, redirect to the form page
    header("Location: ../results/editResults.php");
    exit();
}
?>

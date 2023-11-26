<?php
require_once("../Configuration/connexion.php");
require_once("../functions/validation.php");
require_once("../functions/userCrud.php");
session_start();

if(isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);

    $validation = true;

    //validate first name 
    if(isset($_POST['user_name'])) {
        $fnameIsValidData = fnameIsValid($_POST['fname']);

        if($fnameIsValidData['isValid'] == false) {
            $validation = false;
        }
    }

    //validate last name
    if(isset($_POST['user_name'])) {
        $lnameIsValidData = lnameIsValid($_POST['lname']);
        
        if($lnameIsValidData['isValid'] == false) {
            $validation = false;
        }
    }

    //validate username 
    if(isset($_POST['user_name'])) {
        $unameIsValidData = usernameIsValid($_POST['user_name']);

        if($unameIsValidData['isValid'] == false) {
            $validation = false;
        }
    }

    //validate email 
    if(isset($_POST['user_name'])) {
        $emailIsValidData = emailIsValid($_POST['email']);

        if($emailIsValidData['isValid'] == false) {
            $validation = false;
        }
    }

    //validate mdp 
    if(isset($_POST['user_name'])) {
        $pwdIsValidData = pwdLenghtValidation($_POST['pwd']);

        if($pwdIsValidData['isValid'] == false) {
            $validation = false;
            echo($pwdIsValidData['msg']);
        }
    }

    if($validation == true) {
        //envoyer vers la DB


    } else {
        $_SESSION['signup_errors'] = [
            'fname' => $fnameIsValidData['msg'],
            'lname' => $lnameIsValidData['msg'],
            'user_name' => $unameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg']
        ];

        $url = "../Authentification/signUp.php";
        header('Location: ' . $url);
    }
} else {
    $url = "../Authentification/signUp.php";
    header('Location: ' . $url);
}


?>
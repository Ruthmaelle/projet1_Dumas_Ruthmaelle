<?php
require_once("../Configuration/connexion.php");
require_once("../functions/validation.php");
require_once("../functions/userCrud.php");
require_once("../functions/functions.php");
session_start();

if(isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);

    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $user = $_POST['user_name'];
    $mdp = $_POST['pwd'];
    $mail = $_POST['email'];
    $token = hash('sha256', random_bytes(32));


    $validation = true;

    //validate first name 
    if(isset($user)) {
        $fnameIsValidData = fnameIsValid($fname);

        if($fnameIsValidData['isValid'] == false) {
            $validation = false;
            echo($fnameIsValidData['msg']);
        }
    }

    //validate last name
    if(isset($user)) {
        $lnameIsValidData = lnameIsValid($lname);
        
        if($lnameIsValidData['isValid'] == false) {
            $validation = false;
            echo($lnameIsValidData['msg']);
        }
    }

    //validate username 
    if(isset($user)) {
        $unameIsValidData = usernameIsValid($user);

        if($unameIsValidData['isValid'] == false) {
            $validation = false;
            echo($unameIsValidData['msg']);
        }
    }

    //validate email 
    if(isset($user)) {
        $emailIsValidData = emailIsValid($mail);

        if($emailIsValidData['isValid'] == false) {
            $validation = false;
            echo($emailIsValidData['msg']);
        }
    }

    //validate mdp 
    if(isset($user)) {
        $pwdIsValidData = pwdLenghtValidation($mdp);

        if($pwdIsValidData['isValid'] == false) {
            $validation = false;
            echo($pwdIsValidData['msg']);
        }
    }

    if($validation == true) {
        //envoyer vers la DB
        //saltedcode
        $saltCode = addSalt($mdp);

        $data = [
            'user_name' => $user,
            'email' => $mail,
            'pwd' => $saltCode,
            'fname' => $fname,
            'lname' => $lname,
            'billing_address_id' => 0,
            'shipping_address_id' => 0,
            'token' => $token,
            'role_id' => '3'
        ];
        //pour envoyer vers la DB 
        $newUser = createUser($data);
        echo("<br> <br> Bienvenue " . $user);
        header('Location: ../pages/ecom.php'); 
        exit();


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
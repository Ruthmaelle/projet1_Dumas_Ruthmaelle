<?php

function usernameIsValid(string $user_name): array
{
    $length = strlen($user_name);
    $responses = [
        'isValid' => true,
        'msg' => ''

    ];

    $userInDB = getUserByUsername($user_name);

    if ($length < 2) {
        $responses = [
            'isValid' => false,
            'msg' => 'Le username utilisé est trop court'

        ];
    } elseif ($length > 20) {
        $responses = [
            'isValid' => false,
            'msg' => 'Le username utilisé est trop long'

        ];
    } elseif ($length = 0) {
        $responses = [
            'isValid' => false,
            'msg' => 'Veuillez saisir un Username'

        ];
    }
    elseif ($userInDB) {
        $responses = [
            'isValid' => false,
            'msg' => 'Le username est déjà utilisé'
        ];
    }
return $responses;
}


function fnameIsValid($fname) {
    $length= strlen($fname);
    $valeur= is_string($fname);
    $responses = [
        'isValid' => true,
        'msg' => ''
    ];

    if ($length >=51){
        $responses=[
            'isValid' => false,
            'msg' => 'Prenom trop long'
        ];
    } elseif ($length<=2) {
        $responses= [
            'isValid' =>false,
            'msg' => 'Prenom trop court'
        ];
    } elseif ($length =0) {
        $responses=[
            'isValid' => false,
            'msg' => 'Case Prenom est non rempli'
        ];
    }
return $responses;
//return $valeur;
}

function lnameIsValid($lname) {
    $length = strlen($lname);
    $valeur = is_string($lname);
    $responses =[
        'isValid' => true,
        'msg' => ''
    ];
    if ($length >=51){
        $responses=[
            'isValid' => false,
            'msg' => 'Nom trop long'
        ];
    } elseif ($length<=2) {
        $responses= [
            'isValid' =>false,
            'msg' => 'Nom trop court'
        ];
    } elseif ($length =0) {
        $responses=[
            'isValid' => false,
            'msg' => 'Case Nom est non rempli'
        ];
    }
return $responses;
return $valeur;
}

function emailIsValid($email)
{
    $responses = [
        'isValid' => true,
        'msg' => '',
    ];

    $email_validation_regex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if (!preg_match($email_validation_regex, $email)) {
        $responses = [
            'isValid' => false,
            'msg' => "Format d'email invalid",
        ];
    }
return $responses;
}


function pwdLenghtValidation($pwd)
{
    //minimum 6 max 16
    $length = strlen($pwd);
    $responses= [
        'isValid' => true,
        'msg' => ''
    ];

    if ($length < 6) {
        $responses = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop court. Doit être supérieur a 6 caractères'
        ];
    } elseif ($length > 16) {
        $responses = [
            'isValid' => false,
            'msg' => 'Votre mot de passe est trop long. Doit être inférieur a 16 caractères'
        ];
    }
return $responses;
}



//TODO: faire une class css: error qui  met les messages d'erreurs en rouges

?>
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
            'msg' => 'Le username est déjà utilisé / Username existe deja'
        ];
    }
return $responses;
}

function UserNameExist($user_name){
    $userInDB = getUserByUsername($user_name);
    $responses =[
        'exist' => false,
        'message' =>'User inexistant'
    ];
    if($userInDB){
        $responses=[
            'exist' => true,
            'message' => ''
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
    } elseif ($length == 0) {
        $responses=[
            'isValid' => false,
            'msg' => 'Case Nom est non rempli'
        ];
    }
return $responses;
}

function emailIsValid($email)
{
    $responses = [
        'isValid' => true,
        'msg' => '',
    ];

    $emailInDB = getUserByMail($email);

    $email_validation_regex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if (!preg_match($email_validation_regex, $email)) {
        $responses = [
            'isValid' => false,
            'msg' => "Format d'email invalid",
        ];
    } elseif ($emailInDB) {
        $responses = [
            'isValid' => false,
            'msg' => 'Adresse Email déjà utilisé et ne peut etre dupliquer'
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

function ProductExist($name) {
    $responses = [
        'exist' => false,
        'msg' => 'Ce Produit est inexistant'
    ];

    $userInDB = getProductByName($name);
    
    if($userInDB) {
        $responses = [
            'exist' => true,
            'msg' => ''
        ];
    }
    return $responses;
}


?>
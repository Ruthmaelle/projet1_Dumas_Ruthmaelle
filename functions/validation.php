<?php

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
}


?>
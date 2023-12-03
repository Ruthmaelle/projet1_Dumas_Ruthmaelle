<?php

function addSalt($pwd){

    $salt = 'Salt_ABC!@';
    $saltedCode = hash('sha1', $pwd.$salt);

    return $saltedCode;
}

?>
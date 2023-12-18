<?php
session_start();
require_once("../Configuration/connexion.php");
require_once("../functions/functions.php");
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
var_dump($_POST);
$user = $_POST['user_name'];
$pwd_user = $_POST['pwd'];

if (isset($_POST)){

    unset($_SESSION['del_errors']);

    if(empty($_POST['user_name'] && $_POST['pwd'] )){

        $url='../pages/delUser.php';
        header('location:'.$url);
    }else{
        $user_name = $_SESSION['user_name'];
        $pwd = $_SESSION['pwd'];

        if($user != $user_name) {
            $_SESSION['del_errors'] = ['user_name' => 'les User_name ne sont pas les meme'];
        }if($pwd_user != $pwd) {
            $_SESSION['del_errors'] = ['pwd' => 'les passwords ne sont pas les meme'];
        }else{
            $DeleteUser = deleteUser($user);
            echo("<h2><br> <br> Compte supprimer avec succes</h2>");
            $url='../index.php';
            header('location:'.$url);
        }
    }
}

?>
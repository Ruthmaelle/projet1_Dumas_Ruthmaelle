<?php
session_start();
require_once("../functions/functions.php");
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
require_once("../functions/userCrud.php");
$user = $_POST['user_name'];
$userName = UserNameExist($user);

if (isset($_POST)){ //WORKS

    unset($_SESSION['del_errors']);

    if(empty($_POST['user_name'] && $_POST['pwd'] )){

        $url='../pages/delUser.php';
        header('location:'.$url);
    }else{
        $user_name = $_SESSION['user_name'];
        $pwd = $_SESSION['pwd'];
        $pwd_user = $_POST['pwd'];
        $userInDB = getUserByUsername($user);

        if($userName['exist'] == false) {
            $_SESSION['del_errors'] = ['user_name' => 'Ce username n\'existe pas'];
            exit();
        }
        elseif($user != $user_name) {
            $_SESSION['del_errors'] = ['user_name' => 'les User_name ne sont pas les meme/ Vous n\'etes pas autoriser'];
        }elseif($pwd_user != $pwd) {
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
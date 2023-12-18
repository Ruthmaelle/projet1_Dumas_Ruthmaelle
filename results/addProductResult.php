<?php
session_start();
require_once("../functions/userCrud.php");
require_once("../Configuration/connexion.php");

if(isset($_POST)) {
    if(empty($_POST['name'] and $_POST['quantity']and $_POST['price'] and $_POST['long_url'] and $_POST['description'])) {
        $url = "../pages/ecom.php";
        header('location: ', $url);
    }else{
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $long_url = $_POST['long_url'];
        $description = $_POST['description'];

        $variable = 'superadmin';
        $user_name = $_SESSION['user_name'];

        if($user_name == $variable) {
            $data = [
            'name' => $name,
            'quantity' => $quantity,
            'price' => $price,
            'long_url' => $long_url,
            'description' => $description
            ];
            $createProduct = addProducts($data);
        }else{
            echo("<br> <br> Vous n'etes pas autoriser a ajouter des produits " .$_SESSION['user_name']);
            ?>
             <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
            <?php
        }
    }


}



?>
<?php
session_start();
require_once("../functions/userCrud.php");
require_once("../Configuration/connexion.php");
require_once("../functions/validation.php");

if(isset($_POST)) {
    if(empty($_POST['name'] and $_POST['quantity']and $_POST['price'] and $_POST['img_url'] and $_POST['description'])) {
        $url = "../pages/ecom.php";
        header('location: ', $url);
    }else{
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $img_url = $_POST['img_url'];
        $description = $_POST['description'];

        $variable = 'superadmin';
        $user_name = $_SESSION['user_name'];

        if($user_name == $variable) {
            $data = [
            'name' => $name,
            'quantity' => $quantity,
            'price' => $price,
            'img_url' => $img_url,
            'description' => $description
            ];
            $valid = ProductExist($_POST['name']);
            if($valid['exist'] == true) {
                echo("<br> <br> ERREURS: Votre produit existe deja");
                ?>
                <br> <br> <button type="button"><a href="../pages/gererProduit.php">Back</a></button>
                <?php
            }else{
                $createProduct = addProducts($data);
                ?>
                <br> <br> <p>Produit ajouter avec succes!!!!</p>
                <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
               <?php
            }
        }else{
            echo("<br> <br> Vous n'etes pas autoriser a ajouter des produits " .$_SESSION['user_name']);
            ?>
             <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
            <?php
        }
    }


}



?>
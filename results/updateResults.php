<?php
session_start();
require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");

if(isset($_POST)){

    unset($_SESSION['editP_errors']);
    if(empty($_POST['lastname'])) {
        $url = "../pages/ecom.php";
        header('location: ', $url);
    }else {
        $variable = 'superadmin';
        $user_name = $_SESSION['user_name'];

        if($user_name == $variable) {
            $id = $_POST['lastname'];
            $productValid = ProductExist($id);

            if($productValid['exist'] == false) {
                $_SESSION['editP_errors'] = ['lastname' => $productValid['msg']];
                echo("Ce produit n'existe pas dans votre BD");
                ?>
                <br> <br> <button type="button"><a href="../pages/updateProduit.php">Back</a></button>
                <?php
            }else{
                $data = [
                    'name' => $_POST['name'],
                    'quantity' => $_POST['quantity'],
                    'price' => $_POST['price'],
                    'img_url' => $_POST['img_url'],
                    'description' => $_POST['description'],
                ];

                $editProduct = updateProduct($data);
                echo("<br> <br> Produit Modifier avec succes");
                ?>
                <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
                <?php
            }
        }else{
            echo("<br> <br> Vous n'etes pas autoriser a modifier des produits " .$_SESSION['user_name']);
            ?>
            <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
            <?php
        }
    }
}
?>


<?php
session_start();
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");

$id = $_POST['name'];


if(isset($_POST)) {
    unset($_SESSION['supp_errors']);

    if(empty($_POST['name'])) {
        $url = "../pages/ecom.php";
        header('location: ', $url);
    }else {
        $variable = 'superadmin';
        $user_name = $_SESSION['user_name'];

        if($user_name == $variable) {
            $valid = ProductExist($id);
            if($valid['exist'] == false) {
                $_SESSION['supp_errors'] = ['name' => $valid['msg']];
                echo("<br> <br> ERREURS");
                ?>
                <br> <br> <button type="button"><a href="../pages/delProduit.php">Back</a></button>
                <?php
            }else{
                $Produit = getProductByName($id);
                if($Produit){
                    $delProduit = deleteProduit($id);
                    echo("<br> <br> Produit supprimer avec succes");
                }
            }
        }else{
            echo("<br> <br> Vous n'etes pas autoriser a supprimer des produits " .$_SESSION['user_name']);
            ?>
            <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
            <?php
        }
    }


}

?>
<?php
require_once("../Configuration/connexion.php");

function createUser(array $data) {
    global $conn;
    
    $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt =mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sssssiisi",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
            $data['billing_address_id'],
            $data['shipping_address_id'],
            $data['token'],
            $data['role_id']
        );

        $result = mysqli_stmt_execute($stmt);
    }
}

function getUserByUsername(string $user_name) {
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";
    
    $result= mysqli_query($conn, $query);

    $data= mysqli_fetch_assoc(($result));
    return $data;
}

function deleteUser(string $user_name) {
    global $conn;

    $query = "DELETE FROM user WHERE user.user_name = ?;";
    if($stmt = mysqli_prepare($conn, $query)){
        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $user_name,
        );

        $result = mysqli_stmt_execute($stmt);
    }

}

function updateUser(array $data) {
    global $conn;

    $query = "UPDATE user SET fname = ?, lname = ?, email = ?, pwd = ? where user.user_name = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $data['fname'],
            $data['lname'],
            $data['email'],
            $data['pwd'],
            $data['user_name'],
        );

        // execution de la requete 
        $result = mysqli_stmt_execute($stmt);

    }
}

function getUserByMail(string $email){
    global $conn;

    $query = "SELECT * FROM user WHERE user.email = '" . $email . "';";


    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    return $data;
}


function addProducts(array $data) { //seul un superadmin peut ajouter des produits
    global $conn;
    
    $query = "INSERT INTO product VALUES (NULL, ?, ?, ?, ?, ?)";
    if ($stmt =mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sidss",
            $data['name'],
            $data['quantity'],
            $data['price'],
            $data['long_url'],
            $data['description']
        );

        $result = mysqli_stmt_execute($stmt);
    }

    return $result;
}

function afficherProduit(){
    global $conn;

    $query = "SELECT * FROM product ORDER BY id DESC ";
    $result = mysqli_query($conn, $query);
     //avec fecth row : tableau indexe
    $data = mysqli_fetch_assoc($result);

    return $data;

}

function deleteProduit(string $name) {
    global $conn;
    $query ="DELETE FROM product WHERE product.name = ?";
    if($stmt=mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            's',
            $name,
        );
        $result = mysqli_stmt_execute($stmt);
    }
    return $result;
}

function getProductByName(string $name) {
    global $conn;

    $query = "SELECT * FROM product WHERE product.name = '" . $name . "';";
    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);
    return $data;

}
?>

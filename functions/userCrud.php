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

function afficherUser(){
    global $conn;

    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

     // Fetch user data
    $utilisateurs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $utilisateurs;
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
            $data['img_url'],
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

    // Initialize an empty array to store products
    $products = array();

    //avec fecth row : tableau indexe,
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    return $products;
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

function getProductByName($name) {
    global $conn;

    $query = "SELECT * FROM product WHERE product.name = '" . $name . "';";
    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);
    return $data;

}

function updateProduct(array $data) {
    global $conn;

    $query = "UPDATE product SET name = ?, quantity = ?, price = ?, img_url = ?, description = ? WHERE product.id = ?;";
    if($stmt=mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sidssi",
            $data['name'],
            $data['quantity'],
            $data['price'],
            $data['img_url'],
            $data['description'],
            $data['id']
        );
        // execution de la requete 
        $result = mysqli_stmt_execute($stmt);

    }
    return $result;
}

function afficherProduitSearch(string $name){
    global $conn;

    $query = "SELECT * FROM product WHERE name = '" . $name ."';";
    
    // Get the result
    $result = mysqli_query($conn, $query);

    // Fetch only the first row
    $data = mysqli_fetch_assoc($result);

    return $data;
}



function CreateAddress($data) {
    global $conn;

    $query = "INSERT INTO address VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    if($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sissss",
            $data['street_name'],
            $data['street_nb'],
            $data['city'],
            $data['province'],
            $data['zip_code'],
            $data['country']
        );

        $result = mysqli_stmt_execute($stmt);
    }
    return $result;
}

// Function to add a product to the cart
function addToCart($name, $price, $quantity) {
    // Retrieve product information based on the product name
    $product = getProductByName($name);

    // Add additional information to the product
    $product['price'] = $price;
    $product['quantity'] = $quantity;

    // Add the product to the shopping cart in the session
    $_SESSION['cart'][] = $product;
}

?>

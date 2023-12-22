<?php
session_start();

require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");

// Fetch users
$utilisateurs = afficherUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Liste des utilisateurs</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User_name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">First Name / Prenom</th>
                <th scope="col">Last Name / Nom</th>
                <th scope="col">billing_address_id</th>
                <th scope="col">shipping_address_id</th>
                <th scope="col">token</th>
                <th scope="col">role_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display users in the table
            foreach ($utilisateurs as $utilisateur) {
                echo "<tr>";
                echo "<td>{$utilisateur['id']}</td>";
                echo "<td>{$utilisateur['user_name']}</td>";
                echo "<td>{$utilisateur['email']}</td>";
                echo "<td>{$utilisateur['pwd']}</td>";
                echo "<td>{$utilisateur['fname']}</td>";
                echo "<td>{$utilisateur['lname']}</td>";
                echo "<td>{$utilisateur['billing_address_id']}</td>";
                echo "<td>{$utilisateur['shipping_address_id']}</td>";
                echo "<td>{$utilisateur['token']}</td>";
                echo "<td>{$utilisateur['role_id']}</td>";

                echo "<td>
                <a href='modify_user.php?id={$utilisateur['id']}' class='btn btn-warning btn-sm'>Modifier</a>
                <a href='delete_user.php?id={$utilisateur['user_name']}' class='btn btn-danger btn-sm'>Supprimer</a>
                </td>"; // Modify and delete buttons

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

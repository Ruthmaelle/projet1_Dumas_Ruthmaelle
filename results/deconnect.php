<?php
session_start();


// Unset or clear specific session variables related to user authentication
unset($_SESSION['user_name']); // replace 'user_id' with the actual session variable you use for user identification

// Redirect the user to a page indicating they are logged out
$url = "../pages/logout_page.php";
header('Location: ' . $url);
?>

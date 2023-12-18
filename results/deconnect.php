<?php
session_start();
// Generate and store CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


// Unset or clear specific session variables related to user authentication
unset($_SESSION['user_name']); // replace 'user_id' with the actual session variable you use for user identification

// Redirect the user to a page indicating they are logged out
$url = "../pages/logout_page.php";
header('Location: ' . $url);
exit();
?>

<?php
$server = "localhost";
$userName = "root";
$pwd = "";
$db = "ecom1_project";

//pour se connecter avec la base de donnee
$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {
    echo "connected to the $db database succesfully";
    echo"<br>";
    global $conn;
} else {
    echo "Error: Not connected to the $db database";
}
?>

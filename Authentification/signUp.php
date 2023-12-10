<?php
session_start();
//var_dump($_SESSION);
$fname='';
if(isset($_SESSION['signup-form']['fname'])) {
    $fname = $_SESSION['signup-form']['fname'];
}
$lname='';
if(isset($_SESSION['signup-form']['lname'])) {
    $lname = $_SESSION['signup-form']['lname'];
}
$user_name='';
if(isset($_SESSION['signup-form']['user_name'])) {
    $user_name = $_SESSION['signup-form']['user_name'];
}
$email='';
if(isset($_SESSION['signup-form']['email'])) {
    $email = $_SESSION['signup-form']['email'];
}
$pwd='';
if (isset($_SESSION['signup_form']['pwd'])) {
    $pwd = $_SESSION['signup_form']['pwd'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link rel="stylesheet" href="./styles/style.css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<h2>Sign Up</h2>

<button type="button" class="out"><a href="../results/deconnect.php">Deconnexion</a></button>
<!--
    Formulaire permettant d'enregistrer un nouvel utilisateur
-->
<form  method="post" action="../results/signupResult.php" id="sign">
    <input hidden name="action" value="signup">

    <div class ="row">
        <div class = "col-md-3">
            <label for="lname">Nom</label>
            <div class="col-md-3">
                <input id="lname" name="lname" type="text" >
            </div>
        </div>
    </div>
    <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['lname'])? $_SESSION['signup_errors']['lname'] : '' ?></p>

    <div class = "row">
        <div class = "col-md-3">
            <label for="fname">Prenom</label>
            <div class = "col-md-3">
                <input id="fname" name="fname"type="text" > 
            </div>
        </div>
    </div>
    <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['fname'])? $_SESSION['signup_errors']['fname'] : '' ?></p>

    <div class = "row">
        <div class = "col-md-3">
            <label for="user_name">Nom d'utilisateur</label>
            <div class = "col-md-3">
            <input id="user_name" name="user_name" type="text">
            </div>
        </div>
    </div>
    <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['user_name'])? $_SESSION['signup_errors']['user_name'] : '' ?></p>
    
    <div class = "row">
        <div class = "col-md-3">
            <label for="email">Email</label>
            <div class = "col-md-3">
                <input id="email" name="email" type="email">
            </div>
        </div>
    </div>
    <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['email'])? $_SESSION['signup_errors']['email'] : '' ?></p>
    
    <div class = "row">
        <div class = "col-md-3">
            <label for="pwd">Mot de passe</label>
            <div class = "col-md-3">
            <input id="pwd" type="password" name="pwd" value="<?php echo $pwd ?>" required>
            </div>
        </div>
    </div>
    <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['pwd'])? $_SESSION['signup_errors']['pwd'] : '' ?></p>
    
    <button type="submit" >Sign Up</button>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
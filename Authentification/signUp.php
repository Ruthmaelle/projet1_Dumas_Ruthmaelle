<?php
session_start();
var_dump($_SESSION);
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



<h2>Sign Up</h2>

<!-- 
    Formulaire permettant d'enregistrer un nouvel utilisateur
 -->
<form method="post" action="../results/signupResult.php">
    <input hidden name="action" value="signup">

    <label for="lname">Nom</label>
    <input id="lname" name="lname" type="text">

    <label for="fname">Prenom</label>
    <input id="fname" name="fname"type="text"> <br> <br>
    
    <label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" name="user_name" type="text"> <br> <br>
    
    <label for="email">Email</label>
    <input id="email" name="email" type="email"> <br> <br>
    
    <label for="pwd">Mot de passe</label>
    <input id="pwd" type="password" name="pwd" value="<?php echo $pwd ?>">
    <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['pwd'])? $_SESSION['signup_errors']['pwd'] : '' ?></p>
    
    <button type="submit">Sign Up</button>
</form>

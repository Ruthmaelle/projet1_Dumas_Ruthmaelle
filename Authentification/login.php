<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>Login</h2>

    <form method="post" action="../results/loginResults.php">
    <input hidden name="action" value="login">

        <label for="username">Nom d'utilisateur</label>
        <input id="username" name="username" type="text"> <br><br>
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['login_error']['username'])? $_SESSION['login_error']['username'] : '' ?></p>

        <label for="pwd">Mot de passe</label>
        <input id="pwd" name="pwd" type="password">
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['login_error']['pwd'])? $_SESSION['login_error']['pwd'] : '' ?></p>

        <button type="submit">connexion</button>
    </form>
</body>
</html>
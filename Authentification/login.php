<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>Login</h2>

    <form method="post" action="../results/loginReults.php">
    <input hidden name="action" value="login">

    <label for="username">Nom d'utilisateur</label>
        <input id="username" name="username" type="text"> <br><br>
        <label for="pwd">Mot de passe</label>
        <input id="pwd" name="pwd" type="password">
        <button type="submit">connexion</button>
    </form>
</body>
</html>
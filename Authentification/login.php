<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/signupStyle.css"/>
</head>
<body>
    <center><h2>Login</h2></center>
    <form method="post" action="../results/loginResults.php">

    <input hidden name="action" value="login">

    <div class ="row">
        <div class = "col-md-3">
            <label for="">Nom d'utilisateur: </label>
            <div class="col-md-3">
            <input id="user_name" name="user_name" type="text"> <br><br>
            </div>
        </div>
    </div>
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['login_error']['user_name'])? $_SESSION['login_error']['user_name'] : '' ?></p>

        <div class ="row">
        <div class = "col-md-3">
            <label for="pwd">Mot de passe</label>
            <div class="col-md-3">
            <input id="pwd" name="pwd" type="password">
            </div>
        </div>
    </div>
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['login_error']['pwd'])? $_SESSION['login_error']['pwd'] : '' ?></p>
        <br>
        <br>
        <button type="submit">connexion</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
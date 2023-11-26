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
    <input id="pwd" name="pwd" type="password"> <br> <br>
    <button type="submit">Sign Up</button>
</form>

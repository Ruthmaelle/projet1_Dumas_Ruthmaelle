<?php session_start();

$user = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Exquisite Esthetics</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../pages/ecom.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../Authentification/edit.php">Back</a>
          </li>
        </ul>
    </div>
</div>
</nav>
  </header>
  <br> <br><br>


<div class="wrapper">
    <div class="form-box-login">
    <h2> <?php echo ('Supression de votre compte ' .$user); ?> </h2>
        <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form action="../results/delUserResult.php" method="post">
  <div class="mb-3">
    <label for="user_name" class="form-label">Username</label>
    <input type="text" name="user_name" class="form-control" id="user_name" aria-describedby="emailHelp">
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['del_errors']['user_name'])? $_SESSION['del_errors']['user_name'] : ''?> </p>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password</label>
    <input type="text" name="pwd" class="form-control" id="pwd" aria-describedby="emailHelp">
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['del_errors']['pwd'])? $_SESSION['del_errors']['pwd'] : ''?> </p>
  </div>
  

  <button type="submit">Supprimer</button>
</form>
    </div>
    <div>

    </div>
    
</body>
</html>

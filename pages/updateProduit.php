<?php session_start()


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
        </ul>
    </div>
</div>
</nav>
  </header>
  <br> <br><br>


<div class="wrapper">
    <div class="form-box-login">
      <h2>Modifier un produit</h2>
        <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form action="../results/updateResults.php" method="post">
  <div class="mb-3">
    <label for="lastname" class="form-label">Ancien Nom du Produit</label>
    <input type="text" name="lastname" class="form-control" id="lastname">
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['editP_errors']['lastname'])? $_SESSION['editP_errors']['lastname'] : ''?> </p>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nouveau Nom du Produit</label>
    <input type="text" name="name" class="form-control" id="name">
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['editP_errors']['name'])? $_SESSION['editP_errors']['name'] : ''?> </p>
  </div>
  <div class="mb-3">
  <label for="quantity" class="form-label">Nouvelle quantite</label>
    <input type="number" class="form-control" id="quantity" name="quantity" >
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['editP_errors']['quantity'])? $_SESSION['editP_errors']['quantity'] : ''?> </p>
  </div>
  <div class="mb-3">
  <label for="price" class="form-label">Nouveau prix</label>
    <input type="text" class="form-control" id="price" name="price"  >
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['editP_errors']['price'])? $_SESSION['editP_errors']['price'] : ''?> </p>
  </div>
  <div class="mb-3">
  <label for="img_url" class="form-label">Nouvelle image_url</label>
    <input type="text" class="form-control" id="img_url"name="img_url"  >
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['editP_errors']['img_url'])? $_SESSION['editP_errors']['img_url'] : ''?> </p>
  </div>
  <div class="mb-3">
  <label for="description" class="form-label">Nouvelle description</label>
    <input type="text" class="form-control" id="description" name="description" >
    <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['editP_errors']['description'])? $_SESSION['editP_errors']['description'] : ''?> </p>
  </div>
  
  

  <button type="submit">Modifier</button>
</form>
    </div>
    <div>

    </div>
    
</body>
</html>

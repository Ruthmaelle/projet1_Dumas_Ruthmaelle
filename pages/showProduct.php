<?php
session_start();

require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
$mesProduits = afficherProduit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Afficher tous les Produits</title>
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
                        <a class="nav-link active" aria-current="page" href="../pages/interfaceAdmin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./delProduit.php">Supprimer un Produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./updateProduit.php">Modifier un Produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../results/showProduct.php">Afficher tout les Produits</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br> <br><br>

<div class="wrapper">
    <div class="form-box-login">
        <h2>Afficher tous les produits</h2>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($mesProduits as $product) { ?>
                        <div class="col">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img src="<?php echo $product['img_url']; ?>" class="card-img-top" alt="...">
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $product['name']; ?></text>
                                <div class="card-body">
                                    <p class="card-text"><?php echo $product['description']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-body-secondary"><?php echo $product['price']; ?>$CAD</small>
                                    </div>
                                    <div>
                                        <a href="../pages/updateProduit.php" class="btn btn-primary">Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

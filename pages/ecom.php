<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("../Configuration/connexion.php");
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
$mesProduits=afficherProduit();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--link rel="stylesheet" href="../styles/style.css"/-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/checkout_form.php">Panier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../results/deconnect.php">Quitter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Authentification/edit.php">Modifier vos infos</a>
          </li>
        </ul>
        <form method="post" action="ecom.php" class="d-flex" role="search">
          <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          <p style="color: red; font-size: 0.8rem;"><?php echo  isset($_SESSION['Search_error']['search'])? $_SESSION['Search_error']['search'] : ''?> </p>
        </form>
      </div>
    </div>
  </nav>
</header>
<br><br>
<main>


<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <center><img src="../styles/pictures/95e6e72df89638596e0381904da11e9f.jpg" alt="" height="380px" width="640px"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></center>
      </div>
      <div class="carousel-item">
        <center><img src="../styles/pictures/OIP.jpeg" alt="" height="380px" width="640px"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></center>
      </div>
      <div class="carousel-item">
      <center><img src="../styles/pictures/D258DD79-B220-4E84-A326-AF285B83469F-1024x1024.webp" alt="" height="380px" width="640px"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></center>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <?php
require_once("../functions/userCrud.php");
require_once("../functions/validation.php");
require_once("../Configuration/connexion.php");
//$Recherche = afficherProduitSearch($demande);



if (isset($_POST)){
  if (isset($_POST['search'])) {
    $demande = $_POST['search'];

  $search = ProductExist($demande);

  unset($_SESSION['Search_error']);

  if($search['exist'] == false){
    $_SESSION['Search_error'] = ['search' => $search['msg']];
    echo("<br> <br> ERREURS");
    ?>
    <br> <br> <button type="button"><a href="../pages/ecom.php">Back</a></button>
    <?php
  }elseif($search['exist'] == true){
    unset($_SESSION['Search_error']);

    $Recherche = afficherProduitSearch($demande);
    //var_dump($Recherche); ?>

      <!--Afficher les resultat du search-->
    <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!--?php foreach($Recherche as $product) { ?-->

        <div class="col">
          <div class="card shadow-sm" style="width: 18rem;">

            <img src="<?php echo $Recherche['img_url']?>" class="card-img-top" alt="...">
            <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $Recherche['name']?></text>
            <div class="card-body">
              <p class="card-text"><?php echo $Recherche['description']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!-- Inside the foreach loop where you display products -->
                  <form method="post" action="./ecom.php?action=add&name=<?php echo $Recherche['name']; ?>">
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                  </form>
                </div>
                <small class="text-body-secondary"><?php echo $Recherche['price']?>$CAD</small>
                </div>
              </div>
            </div>
          </div>
        <?php ?>
      </div>
    </div>
  </div>

<?php }}elseif (isset($_POST['action']) && $_POST['action'] == 'add') {
  $product_name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ;

  // Fetch the product information based on the product ID
  $product = getProductByName($product_name);

  echo isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
  
  // Add the product to the shopping cart in the session
  $_SESSION['cart'][] = $product;
  echo '<pre>';
  print_r($_SESSION['cart']);
  echo '</pre>';
  
}else {
  ?>
  <!--Afficher tout les produits-->
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($mesProduits as $product) { ?>
                <div class="col">
                    <div class="card shadow-sm" style="width: 18rem;">
                        <?php if (isset($product['img_url'])) { ?>
                            <img src="<?php echo $product['img_url']; ?>" class="card-img-top" alt="...">
                        <?php } ?>
                        <?php if (isset($product['name'])) { ?>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $product['name']; ?></text>
                        <?php } ?>
                        <div class="card-body">
                            <?php if (isset($product['description'])) { ?>
                                <p class="card-text"><?php echo $product['description']; ?></p>
                            <?php } ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <!-- Inside the foreach loop where you display products -->
                                    <!--form method="post" action="./ecom.php?action=add&name=<?php echo $product['name']; ?>">
                                      <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                                    </form-->
                                    <!-- Inside the foreach loop where you display products -->
                                    <form onsubmit="addToCart('<?php echo $Recherche['name']; ?>', <?php echo $Recherche['price']; ?>, document.getElementById('quantity_<?php echo $Recherche['name']; ?>').value); return false;">
                                      <div class="input-group">
                                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                                      </div>
                                      <div>
                                        <label for="quantity_" >Quantity</label>
                                        <input type="number" id="quantity_<?php echo $Recherche['name']; ?>" class="form-control" value="1" min="1">
                                      </div>
                                    </form>
                                </div>
                              </div>
                            <div>
                                <?php if (isset($product['price'])) { ?>
                                    <small class="text-body-secondary"><?php echo $product['price']; ?>$CAD</small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

        </form>

<?php }}
if(isset($_SESSION['cart'])){
  var_dump($_SESSION['cart']);
}

elseif (isset($_POST['action']) && $_POST['action'] == 'add') {
  $product_name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ;

  // Fetch the product information based on the product ID
  $product = getProductByName($product_name);

  echo isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
  
  // Add the product to the shopping cart in the session
  $_SESSION['cart'][] = $product;
  echo '<pre>';
  echo($_SESSION['cart']);
  echo '</pre>';
  
}


?>





<!--
<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
<foreach synthax>
<!?php foreach($mesProduits as $products) { ?>
      <form method="" action="" >
    <div class="col">
          <div class="card shadow-sm" style="width: 18rem;">

       <img src="<!?php echo $mesProduits['img_url']?>" alt="">
       <text x="50%" y="50%" fill="#eceeef" dy=".3em"><!?php echo $mesProduits['name']?></text>
            <div class="card-body">
              <p class="card-text"><!?php echo $mesProduits['description']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
          
                  <button type="button" class="card-link">Ajouter au panier</button>
                </div>
                <small class="text-body-secondary"><!?php echo $mesProduits['price']?>$CAD</small>
              </div>
            </div>
          </div>
        </div>
        
    </div>
</div>
</div>

-->

<footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2023 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>



</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php include("mConfig.php");?>
<?php 
 session_start();
 if(isset($_SESSION["uname"]))
 {
   $uname = $_SESSION["uname"];
  }
  else
  {
    header("location:./login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
<?php
    $tablemCollection = $db->items;
    $Productlist = $tablemCollection->find();
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">IMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Mobile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Laptop</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>  
<h3 align="center"> Welcome, <?=$uname?></h3>
<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header">Dashboard</div>
  <div class="card-body">
    <h4 class="card-title">Dashboard</h4>
    <p class="card-text">Welcome to Inventory Management System (I.M.S)</p>
  </div>
</div>
<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
  <div class="card-header">Stock</div>
  <div class="card-body">
    <h4 class="card-title">Stock Available</h4>
    <p class="card-text">Quantity Available.</p>
  </div>
</div>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">qty</th>
      <th scope="col">Price</th>
      <th scope="col">Comment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     foreach ($Productlist as $product){
     ?>
  <tr class="table-light">
      <th scope="row"><?=$product["productName"]?></th>
      <td><?=$product["qty"]?></td>
      <td><?=$product["price"]?></td>
     <td><?=$product["comment"]?></td>
     <td> 
    
        <a href="./addProduct.php" class="btn btn-primary">Add Product</a>
         <a href="./updateProduct.php" class="btn btn-success">Update Product</a>
       <a href="./deleteProduct.php" class="btn btn-danger">Delete Product</a>
   </td>
    </tr>
    <?php } ?>
     </tbody>
</table> 
</body>
</html>
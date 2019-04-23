<?php include"mConfig.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>
<body>
<?php
    $productName = $Price = $qty =$comment ="";
    $errormsg ="";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $productName = $_POST["productname"];  
      $Price = $_POST["price"]; 
      $qty = $_POST["qty"]; 
      $comment =$_POST["comment"]; 
    if(!empty($productName))
    { $productName;}
    else
        {$errormsg ="*Required";}
    if(!empty($Price))
     {   $Price;}
    else
    {$errormsg ="*Required";}
    if(!empty($qty))
      {   $qty;}
    else
    { $errormsg ="*Required";}
    $tablemCollection = $db->items;
    $columnMDocument= array
                            ("productName"=>$productName,
                             "price"=>$Price,
                             "qty"=>$qty,
                             "comment"=>$comment
                            ); 
    $tablemCollection->insertOne($columnMDocument);
    $message = "<h3>Product Added Successfully</h3>";                     
    }
    else
    {
        $message = "<h3>Something Went Wrong.....</h3>";
    }
   
?>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
  <fieldset>
    <legend>Add Product</legend>
      <?=$message?>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$productName?>" name="productname" aria-describedby="emailHelp" placeholder="Product Name">
      <span class="badge badge-danger"><?=$errormsg?></span>
    </div>
    <div class="form-group">
      <label for="qty">Quantity</label>
      <input type="text" class="form-control" id="qty" name="qty" value="<?=$qty?>"  placeholder="Quantity">
      <span class="badge badge-danger"><?=$errormsg?></span>
    </div>
    <div class="form-group">
      <label for="qty">Price</label>
      <input type="text" class="form-control" id="price" name="price" value="<?=$Price?>"  placeholder="Price">
      <span class="badge badge-danger"><?=$errormsg?></span>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Comment:</label>
      <textarea class="form-control" id="comment" name="comment" value="<?=$comment?>"  rows="3" placeholder="Please say Something ..."></textarea>
    </div>
    <!-- <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div> -->
    <button type="submit" class="btn btn-primary">Add Product</button>
  </fieldset>
</form>  
</body>
</html>
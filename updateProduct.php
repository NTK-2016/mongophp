<?php include"mConfig.php";?>
<?php 
    $pname = $pprice = $pqty =$pcomment ="";
    $filter = array();
    $options = array(
    "sort" => array("_id" => -1),
    );
   $tablemCollection = $db->items;
    $result = $tablemCollection->find($filter,$options);
    foreach ($result as $product_data) 
    {
        $pname = $product_data["productName"];
        $pprice = $product_data["price"];
        $pqty = $product_data["qty"];
        $pcomment =$product_data["comment"];
    }
  ?>
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
    $OldcolumnMDocument= array
                            ("productName"=>$productName,
                             "price"=>$Price,
                             "qty"=>$qty,
                             "comment"=>$comment
                            ); 
  $UpdatecolumnMDocument= array
                          ("productName"=>$productName,
                             "price"=>$Price,
                             "qty"=>$qty,
                             "comment"=>$comment
                           );              
    $tablemCollection->updateOne($UpdatecolumnMDocument,array('$set'=>$OldcolumnMDocument));
    $message = "<h3>Product Updated Successfully</h3>";                     
    }
    else
    {
        $message = "<h3>Something Went Wrong.....</h3>";
    }
   
?>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
  <fieldset>
    <legend>Update Product</legend>
      <?=$message?>
    <div class="form-group">
      <label for="exampleInputEmail1">Product Name:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$pname?>" name="productname" aria-describedby="emailHelp" placeholder="Product Name">
      <span class="badge badge-danger"><?=$errormsg?></span>
    </div>
    <div class="form-group">
      <label for="qty">Quantity</label>
      <input type="text" class="form-control" id="qty" name="qty" value="<?=$pqty?>"  placeholder="Quantity">
      <span class="badge badge-danger"><?=$errormsg?></span>
    </div>
    <div class="form-group">
      <label for="qty">Price</label>
      <input type="text" class="form-control" id="price" name="price" value="<?=$pprice?>"  placeholder="Price">
      <span class="badge badge-danger"><?=$errormsg?></span>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Comment:</label>
      <textarea class="form-control" id="comment" name="comment" value="<?=$pcomment?>"  rows="3" placeholder="Please say Something ..."></textarea>
    </div>
    <!-- <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div> -->
    <button type="submit" class="btn btn-primary">Update Product</button>
  </fieldset>
</form>  
</body>
</html>
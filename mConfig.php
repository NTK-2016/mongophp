<?php
require("./vendor/autoload.php");
   // connect to mongodb
   $m = new MongoDB\Client();
   // echo "Connection to database successfully";
   // select a database
   $db = $m->product;
	
   // echo "Database mydb selected";
?>
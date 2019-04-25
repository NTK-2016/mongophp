<?php include"mConfig.php";?>
<?php session_start();?>
<html lang="en">
<head>
   <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
<form  action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<?php $userid = $password = $crtpassword = $cfpass=""; global $cfpassword;
      $errormsg =$ctpassword="";
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {   
         $userid = $_POST["email"];
         $password = $_POST["createpass"];  
         $cfpass = $_POST["cfpassword"]; 

         if(!empty($password)) 
         {
            $password = $_POST["createpass"]; 
            $crtpassword = base64_encode(base64_encode(base64_encode($password))); 
         }
         else
         {
          $errormsg ="*Required";
         }
          if(!empty($userid)) 
          {
            $userid = $_POST["email"];
          }
          else
          {
            $errormsg ="*Required";
          }
          if(!empty($cfpass)) 
          {
             $cfpassword =base64_encode(base64_encode(base64_encode($cfpass)));  
          }
          else
          {
            $errormsg ="*Required";
          }
         if($crtpassword!=$cfpassword)
          {
              $ctpassword ="Password should be same in both fields.";
          } 
          else
          {
            $login_data = array
                            ('username'=>$userid,
                              'password'=>$cfpassword    
                            ); 
                        print_r($login_data);
                        
            //   $tablemCollection = $db->admin_login;
            //   $tablemCollection->insertOne($login_data);
            
          }
        //   if(isset($_SESSION["uname"]))
        //   {
        //    header("Location:./dashboard.php");
        //   }
        //   else
        //   {
        //       header("Location:./login.php");
        //   }                     
      }
   ?>
  <fieldset>
    <legend>Admin Login</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $userid?>">
      <small id="emailHelp" class="form-text text-muted badge badge-danger"><?=$errormsg?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Create Password</label>
      <input type="password" class="form-control" name="createpass" id="exampleInputPassword1" placeholder="Password" value="<?=$crtpassword?>">
      <small id="emailHelp" class="form-text text-muted badge badge-danger"><?=$errormsg?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" class="form-control" name="cfpassword" id="exampleInputPassword2" placeholder="Password" value="<?=$cfpass?>">
      <small id="emailHelp" class="form-text text-muted badge badge-danger"><?=$errormsg?><?=$ctpassword?></small>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </fieldset>
</form>   
</body>
</html>

<?php include "../../../../admin/ibo_panel/production/database_connect.php";?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Delievery Man || Login</title>
    
      <style>
      .nm{
          font-size:20px;
          font-family: "Raleway", sans-serif;
          font-weight:bold;
      }
      .f1{
          box-shadow:10px 10px  20px black;
      }
     
  </style>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" style="background-color:aliceblue;">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
               <form  method="post"  role="form" class="php-email-form f1" style="border:1px solid #3ec1d5;padding:20px;border-radius:20px;background-color:#f9f9f9;">
                    <br>
                  <div class="form-group">
                      <label class="nm" style="float:left;">Id</label>
                    <input type="text" name="id" class="form-control" id="name" placeholder="Enter UserId" required value="">
                  </div><br>
                  
                  <div class="form-group" for="pwd">
                      <label class="nm" style="float:left;">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Your Password" required value="">
                  </div><br>
                 
                  <div class="text-center"><button type="submit" style="background-color:#3ec1d5;border-radius:10px;" name="submit_log">Sign In</button></div><br>
                  
                </form>
          </section>
        </div>
<?php
	function isNumber($c) {
        return preg_match('/[0-9]/', $c);
    }

if(isset($_POST[submit_log]))
{
    //echo "fd";
    session_start();

    $sel="SELECT * FROM `delievery_man` WHERE `password`='$_POST[password]' AND `id`='$_POST[id]'";
    $res=$con->query($sel);
    if ($res->fetch_assoc() )
    {
        echo "DA";
      $_SESSION[a_id]=$_POST[id];
      
      $_SESSION[a_password]=$_POST[password];
      
      //echo $_SESSION[d_id];
	  //echo $_SESSION[d_password];
      echo "<script>location.href='./index.php';</script>";
    }
    else{
        echo "da";
      	echo "<script>alert('Invalid user name or Password');
    	location.href='./login.php';</script>";
    }
    
}
?>

      </div>
    </div>
  </body>
</html>

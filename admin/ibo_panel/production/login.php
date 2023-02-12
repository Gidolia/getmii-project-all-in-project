<?php include "database_connect.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin || Login</title>

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

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Admin Login Form</h1>
              <div>
                <input type="text" name="id" class="form-control" placeholder="ID" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                  <input type="submit" class="btn btn-default" name="submit_log" value="login">
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="../../../20210913_214319-min (1).png" height="100px"></h1>
                  <p>©2022 All Rights Reserved. GETMII SMART INDIA PVT LTD</p>
                </div>
              </div>
            </form>
          </section>
        </div>
<?php
if(isset($_POST[submit_log]))
{
    //echo "fd";
   session_start();
    // $sel="SELECT * FROM `admin` WHERE `a_id`='$_POST[id]' AND `password`='$_POST[password]'";
    $sel="SELECT * FROM `admin` WHERE `a_id`='$_POST[id]' AND `password`='$_POST[password]'";
    $res=$con->query($sel);
    if ($res->num_rows > 0)
    {echo "fdw";
      $_SESSION[a_id]=$_POST[id];
      $_SESSION[a_password]=$_POST[password];
      
      //echo $_SESSION[d_id];
	  //echo $_SESSION[d_password];
      echo "<script>location.href='index.php';</script>";
    }
    else{
        //echo "fdwe";
      	echo "<script>alert('Invalid user name or Password');
    	location.href='login.php';</script>";
    }
}
?>

      </div>
    </div>
  </body>
</html>

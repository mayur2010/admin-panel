<?php
   include("includes/connection.php");
   include("language/language.php");
   
   if(isset($_SESSION['admin_name']))
   {
       header("Location:home.php");
       exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <title><?php echo APP_NAME;?></title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/Login_util.css">
      <link rel="stylesheet" type="text/css" href="css/Login_main.css">
      <link rel="icon" type="image/png" sizes="16x16" href="images/<?php echo APP_LOGO;?>">
   </head>
   <body>
      <div class="limiter">
         <div class="container-login100">
            <div class="wrap-login100">
               <form action="login_db.php" method="post" class="login100-form validate-form">
                  <span class="login100-form-title p-b-26">
                  <?php echo APP_NAME;?>
                  </span>
                  <span class="login100-form-title p-b-48">
                  <img src="images/<?php echo APP_LOGO;?>" style="width:50%;"/>
                  </span>
                  <div class="wrap-input100 validate-input" data-validate="Valid email is: Enter Username">
                     <input class="input100" type="text" name="username" id="username">
                  </div>
                  <div class="wrap-input100 validate-input" data-validate="Enter password">
                     <span class="btn-show-pass">
                     <i class="zmdi zmdi-eye"></i>
                     </span>
                     <input class="input100" type="password" name="password" id="password">
                  </div>
                  <div class="text-center p-t-15">
                    <span class="txt1">
                    <b>Username</b>: admin
                    </span>
                    <span class="txt1">
                    <b>Password</b>: admin
                    </span>
                  </div>
                  <div class="container-login100-form-btn">
                     <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                        Login
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div id="dropDownSelect1"></div>
      <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
      <script src="vendor/animsition/js/animsition.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>

<html lang = "en">
   
   <head>
      <title>Login</title>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../kfonapp/fav-icon.png">
    <!-- <link rel=icon href=favicon.ico sizes="20x20" type="image/png"> -->
    <!-- animate -->
    <link rel="stylesheet" href="../kfonapp/css/animate.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../kfonapp/css/bootstrap.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../kfonapp/css/magnific-popup.css">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="../kfonapp/css/slick.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="../kfonapp/css/owl.carousel.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../kfonapp/css/font-awesome.min.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="../kfonapp/css/flaticon.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../kfonapp/css/style.css">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="../kfonapp/css/responsive.css">

 <script src="../kfonapp/js/jquery-2.2.4.min.js"></script>


    <script src="https://vidyakiranam.kerala.gov.in/assets_new/js/jquery.validate.min.js"></script>
    <!-- bootstrap -->
    <script src="../kfonapp/js/bootstrap.min.js"></script>

<script type = "text/javascript" >

</script>   
    
    </head>

<body>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

     
    <style type="text/css">
<!--
.style4 {
    font-size: 16px;
    font-style: italic;
}
-->
    </style>
    </head>
	
   <body style="background-image: url(ind.jpg);background-size: cover; background-repeat: no-repeat;margin: 0 auto;";>
      
      <div class = "container form-signin">
         
         <?php

         session_start();
 
         // Check if the user is already logged in, if yes then redirect him to welcome page
         if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
            header("location: dashboard.php");
         exit;
         }

            
            if (isset($_POST['signup']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && 
                  $_POST['password'] == 'Azxcpo@098') {

                  session_start();
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'admin';
                  
                  echo("<script>window.location = 'dashboard.php';</script>");
                  //echo 'You have entered valid use name and password';
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container my-5">

          <a href="https://kfonapp.kerala.gov.in/" class="text-white"><i class="fa fa-backward"></i> Home</a>
      
         <form class = "form-signin my-5" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">          <div class="content" style="text-align: center;">
                     <div class="icon">
                        <img src="logo.png">
                     </div>     
               </div> 

            <div class="col-md-8 pt-5 pb-5 my-5 bg-gray-50" style="margin: 0 auto;">
                <div class="form-group">
                  <div class="col-md-12"><label>Username</label></div>
                       
                     <div class="col-md-12">
                        <input class="form-control" type="text" name="username" id="username" maxlength="300" placeholder="Enter Username" required="required"/>
                     </div>
                </div>

               <div class="form-group">
                  <div class="col-md-12"><label>Password</label></div>
                    
                  <div class="col-md-12">
                     <input class="form-control" type="password" name="password" id="password" maxlength="300" placeholder="Enter Password" required="required"/>
                  </div>
               </div>

               <h4 class = "form-signin-heading">&nbsp;&nbsp;<?php echo $msg; ?></h4>

               <div class="form-group" >
                  <div class="col-md-12" ><div class="one_half last" align="center">
                     <input type="submit" id="signup" name="signup" class="btn btn-warning" style="background-color: #011327; color: #FFF;" value="Login"/>
                  </div>
               </div>

            </div>
         </form>
      </div>
 


    <!-- jquery 
    <script src="../kfonapp/js/jquery-2.2.4.min.js"></script>-->
    <!-- bootstrap -->
    <script src="../kfonapp/js/bootstrap.min.js"></script>
    <!-- magnific popup -->
    <script src="../kfonapp/js/jquery.magnific-popup.js"></script>
    <!-- wow -->
    <script src="../kfonapp/js/wow.min.js"></script>
    <!-- Slick Slider -->
    <script src="../kfonapp/js/slick.js"></script>
    <!-- owl carousel -->
    <script src="../kfonapp/js/owl.carousel.min.js"></script>
    <!-- waypoint -->
    <script src="../kfonapp/js/waypoints.min.js"></script>
    <!-- counterup -->
    <script src="../kfonapp/js/jquery.counterup.min.js"></script>
    <!-- Progress-Bar -->
    <script src="../kfonapp/js/jQuery.rProgressbar.min.js"></script>
    <!-- Progress-Bar Active js -->
    <script src="../kfonapp/js/active.rProgressbar.js"></script>
    <!-- main js -->
    <script src="../kfonapp/js/main.js"></script>

</script>
   </body>
</html>
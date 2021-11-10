<?php
  require_once "./db.php";

  if(isset($_SESSION['user_id'])!="") {
    header("Location: dashboard.php");
  }
  if(!empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
            $message = "g-recaptcha varified successfully";
        else
            $message = "Some error in vrifying g-recaptcha";
       echo $message;
   }

    if (isset($_POST['signup'])) {

        $organisation = mysqli_real_escape_string($conn, $_POST['organisation']);
        $officename = mysqli_real_escape_string($conn, $_POST['officename']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $lsgtype = mysqli_real_escape_string($conn, $_POST['lsgtype']);
        $lsgbody = mysqli_real_escape_string($conn, $_POST['lsgbody']);
        $ward = mysqli_real_escape_string($conn, $_POST['ward']);
        $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
        $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
        $cpersonname = mysqli_real_escape_string($conn, $_POST['cpersonname']);
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);
        $caddress = mysqli_real_escape_string($conn, $_POST['caddress']);
        $cpersonnumber = mysqli_real_escape_string($conn, $_POST['cpersonnumber']);
        $cpersonemail = mysqli_real_escape_string($conn, $_POST['cpersonemail']);
       
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please  Valid Email ID";
        }

       if (!$error) {

            if(mysqli_query($conn, "INSERT INTO users(date,organisation,officename,address,district,lsgtype,lsgbody,ward,latitude,longitude,cpersonname, designation,caddress,cpersonnumber, cpersonemail) VALUES(now(),'" . $organisation . "','" . $officename . "', '" . $address . "','" . $district . "', '" . $lsgtype . "','" . $lsgbody . "','" . $ward . "','" . $latitude . "','" . $longitude . "', '" . $cpersonname . "','" . $designation . "','" . $caddress . "','" . $cpersonnumber . "', '" . $cpersonemail . "')")) {
             
              echo("<script>alert('User Successfully Added')</script>");
              echo("<script>window.location = 'index.php';</script>");
              
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kfonapp Registration</title>
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
    <!-- Slider Stylesheet -->
    <link rel="stylesheet" href="../kfonapp/css/slider.css">

 <script src="../kfonapp/js/jquery-2.2.4.min.js"></script>


    <script src="https://vidyakiranam.kerala.gov.in/assets_new/js/jquery.validate.min.js"></script>
    <!-- bootstrap -->
    <script src="../kfonapp/js/bootstrap.min.js"></script>

<script type = "text/javascript" >

</script>   
      
<style type="text/css">
<!--
.style4 {
    font-size: 16px;
    font-style: italic;
}
::-webkit-input-placeholder {
   font-style: italic;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}
-->
    </style>
</head>
<body style="background-image: url(tester.jpg);background-size: cover; background-repeat: no-repeat;margin: 0 auto;";>
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
<div class="container " >
    <a href="https://kfonapp.kerala.gov.in/" class="text-white"><i class="fa fa-backward"></i> Home</a>

        <div class="container">
            <div class="col-md-12 p-4 my-5">

                    <div class="content" style="text-align: center;">
                        <div class="icon">
                            <img src="logo.png">
                        </div>
                        <h2 class="title">
                            <a style="color: #FFF;" href="">KFON Internet - A Basic Right</a>
                        </h2>
                        <p style="font-size:1.05rem; color: #FFF"> 
                               A Web Portal to provide a facility for the Government Institutions to register themselves for availing the kfonapp services.
                        </p>            
                    </div>
    <form action="search.php" method="post" >
            <div class="row row-eq-height bg-gray-50">
                <div class="col-md-10 pt-5 pb-5 bg-gray-50" style="margin: 0 auto;">

                    <div class="card p-2 my-2">
                        <div class="form-group">
                            <div class="col-md-12"><label>District</label></div>
                    
                            <div class="col-md-12">
                                <select class="form-control" placeholder=" District here.." name="cdistrict" required="required">
                                <option value="">Choose</option>
                                <?php

                                $result = mysqli_query($conn,"SELECT * FROM district");
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['name'];?>"><?php echo $row["name"];?></option>

                                <?php
                                }
                                ?>
                                </select>
                            </div>
                        </div>  


                        <div class="form-group">
                           <div class="col-md-12"><label>Name of Institution</label></div>

                            <div style="display: flex;">  

                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="str" maxlength="300" placeholder=" Search here.." required="required"/>
                                     <input type="submit" value="Search" name="submit" class="btn btn-primary my-2" style="background-color: #011327; color: #FFF; margin: 0 auto;">
                                </div>
                                <div class="col-md-3">
                                    <a data-toggle="modal" href="#exampleModal1"><img src="/kfonapp/images/plus.gif" width="50" height="50"></a>
                                </div>

                            </div>
                        </div><!--  -- institution search-- -->

                    </div> <!-- -- card--> 
                </div> <!-- -- col-md-10-- -->
            </div> <!-- -- row-eq-- -->
            </div> <!-- -- col-md-10-- -->
                 <!-- footer area start -->
    <!-- <footer class="footer-copyright text-center py-3">
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-area-inner">
                            &copy; Copyrights 2021 Kerala Government. Developed By: C-DIT . All rights reserved.
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> -->



    <!-- footer area end -->
        </div> <!-- --container-- -->                  
    </form> <!-- -- form-- -->


    <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Department Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                        <div class="card p-2 my-2">
                                            <div class="form-group">
                                                <div class="col-md-12"><label>Department/Name of Organization</label></div>
                                            
                                                    <div style="display: flex;">
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="organisation-dropdown" name="organisation" placeholder=" Department here.." required="required">
                                                            <option value="">Choose</option>
                                                            <?php

                                                            $result = mysqli_query($conn,"SELECT * FROM departments");
                                                            while($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $row['entitle'];?>"><?php echo $row["entitle"];?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a data-toggle="modal" href="#exampleModal"><img src="/kfonapp/images/plus.gif" width="50" height="50" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                            </div> <!-- --department name -->
                                                    


                                            <div class="form-group" id="name">
                                                <div class="col-md-12"><label>Office Name</label></div>
                                                    
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="officename" id="officename" maxlength="300" placeholder=" Office Name here.." required="required"/>
                                                </div>
                                            </div> <!--  -- office name -->


                                            <div class="form-group" id="cntry">
                                                <div class="col-md-12"><label>Address</label></div>
                                                
                                                <div class="col-md-12">
                                                    <textarea id="address" name="address" class="form-control" maxlength="500" placeholder=" Address here.." required="required"></textarea>
                                                </div>
                                            </div> <!-- -- address -- -->

                                            <div class="form-group">
                                                <div class="col-md-12"><label>District</label></div>
                                        
                                                <div class="col-md-12">
                                                    <select class="form-control" id="district-dropdown" name="district" placeholder=" District here.." required="required">
                                                    <option value="">Choose</option>
                                                    <?php

                                                    $result = mysqli_query($conn,"SELECT * FROM district");
                                                    while($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['name'];?>"><?php echo $row["name"];?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>  

                                            <div class="form-group">
                                                <div class="col-md-12"><label>Local Self Government Institution Level</label></div>
                                                
                                                <div class="col-md-12">
                                                    <select class="form-control" id="lsgtype-dropdown" name="lsgtype" value="NIL" required="required">
                                                    </select>
                                                </div>
                                            </div> <!-- --lsg -- -->

                                            <div class="form-group">
                                                <div class="col-md-12"><label>Local Self Government Institution</label></div>
                                                
                                                <div class="col-md-12">
                                                    <select class="form-control" id="lsgbody-dropdown" name="lsgbody" value="NIL" required="required">
                                                    </select>
                                                </div>
                                            </div> <!-- --lsg level-- -->

                                            <div class="form-group">
                                                <div class="col-md-12"><label>Ward</label></div>
                                                
                                                <div class="col-md-12">
                                                    <select class="form-control" id="ward-dropdown" name="ward" value="NIL" required="required">
                                                    </select>
                                                </div>
                                            </div>  <!-- -- ward --  -->
                                        </div>

                                        <div class="card p-2 my-2">
                                            <div style="display: flex;">
                               
                                                <div class="col-md-8">
                                                    <div class="slideshow-container">

                                                        <div class="mySlides">
                                                            <div class="numbertext">1 / 3</div>
                                                            <img src="/kfonapp/images/1.jpg" style="width:100%">
                                                            <div class="text">Slide One</div>
                                                        </div>

                                                        <div class="mySlides">
                                                          <div class="numbertext">2 / 3</div>
                                                          <img src="/kfonapp/images/2.jpg" style="width:100%">
                                                          <div class="text">Slide Two</div>
                                                        </div>

                                                        <div class="mySlides">
                                                          <div class="numbertext">3 / 3</div>
                                                          <img src="/kfonapp/images/3.jpg" style="width:100%">
                                                          <div class="text">Slide Three</div>
                                                        </div>

                                                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                                    </div>
                               
                                                    <div style="text-align:center;">
                                                      <span class="dot" onclick="currentSlide(1)"></span> 
                                                      <span class="dot" onclick="currentSlide(2)"></span> 
                                                      <span class="dot" onclick="currentSlide(3)"></span> 
                                                    </div>
                                                </div>  <!-- -- slide show-- -->

                                                <div style="display: block;">
                                                    <div class="form-group my-5" >
                                                    
                                                        <div class="col-md-12 "><label>Latitude</label></div>
                                                
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude here.." maxlength="200" required="required">
                                                        </div>
                                                    </div> <!-- -- latitude -- -->

                                                    <div class="form-group my-5" >
                                                        
                                                        <div class="col-md-12 "><label>Longitude</label></div>
                                                
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude here.." maxlength="200" required="required">
                                                        </div>
                                                    </div> <!-- -- longitude -- -->

                                                </div>  <!-- -- block -- -->

                                            </div> <!-- -- flex -- -->
                                        </div> <!-- -- card -- -->


                                        <div class="card p-2 my-2">
                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Name of the Authorised Person</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="cpersonname"   id="cpersonname" maxlength="100" placeholder=" Name here.." required="required"/>
                                                </div>
                                            </div> <!-- -- authorised person --  -->

                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Designation</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="designation"   id="designation" maxlength="100" placeholder=" Designation here.." required="required"/>
                                                </div>
                                            </div> <!-- --designation -- -->

                                            <div class="form-group">
                                                <div class="col-md-12"><label>Address</label></div>
                                        
                                                <div class="col-md-12">
                                                    <textarea id="address" name="caddress" class="form-control" maxlength="500" placeholder=" Address here.." required="required"></textarea>
                                                </div>
                                            </div> <!-- -- address-- -->

                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Contact Person Number</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="cpersonnumber"   id="cpersonnumber" maxlength="100" placeholder="Enter Number here.." required="required"/>
                                                </div>
                                            </div> <!-- -- number -- -->

                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Email ID</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="email" name="cpersonemail" id="cpersonemail" maxlength="100" placeholder=" Email here.." required="required"/>
                                                </div>
                                            </div> <!-- -- email-- -->
                                        </div> <!-- -- card -- -->
                                    
                                </div>  <!-- --modal-body-- -->
                              
                               <div class="modal-footer">                          
                                    <div class="form-group" >
                                        <div class="col-md-12" >
                                            <input type="submit" id="signup" name="signup" class="btn btn-warning" style="background-color: #011327; color: #FFF; margin: 0 auto;" value="Submit"/>

                                        </div>
                                    </div>
                                </div><!--  -- modal-footer-- -->

                            </div> <!-- -- modal-content-- -->
                        </div><!--  -- modal-dialog-- -->
                        </form> <!-- -- form -- -->
                    </div> <!-- -- modal -- -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="">                       
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Department Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> <!-- --modal-header-- -->
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">ID:</label>
                                            <input type="text" class="form-control" id="id-name">
                                        </div> <!-- --id-- -->
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Department:</label>
                                            <input type="text" class="form-control" id="dept-name">
                                        </div> <!-- -- dept-- -->
                                    
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Type:</label>
                                            <select class="form-control" id="district-dropdown" name="district" placeholder=" District here.." required="required">
                                            <option value="">Choose</option>
                                            <?php

                                            $result = mysqli_query($conn,"SELECT * FROM type");
                                            while($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['name'];?>"><?php echo $row["name"];?></option>

                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>   <!-- --type-- -->       
                                    
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Submit" id="submit" name="submit" class="btn btn-primary" style="margin: 0 auto;">
                                </div> <!-- -- modal-footer-- -->
                            </div> -- <!-- modal-content-- -->
                        </div> <!-- -- modal-dialog-- -->
                    </form> <!--  -- form-- -->
                    </div> <!-- --modal 2-- -->

            

    

</div><!-- --container-- -->

<script>
$(document).ready(function() {

$('#district-dropdown').on('change', function() {
var district_name = this.value;
$.ajax({
url: "lsgtype-by-district.php",
type: "POST",
data: {
district_name: district_name
},
cache: false,
success: function(result){
     $('.extra-info').hide();
$("#lsgtype-dropdown").html(result);
$('#lsgbody-dropdown').html('<option value="">Select Local Body Type First</option>'); 
var dept = $("#district-dropdown").val();
}
});
});    

$('#lsgtype-dropdown').on('change', function() {
var lsg_name = this.value;
var district_name=$('#district-dropdown').val();
$.ajax({
url: "lsgbody-by-lsgtype.php",
type: "POST",
data: {
lsg_name: lsg_name,
district_name :district_name
},
cache: false,
success: function(result){
$("#lsgbody-dropdown").html(result);
        
}
});
});


$('#lsgbody-dropdown').on('change', function() {
var ward_name = this.value;
var district_name=$('#district-dropdown').val();
var lsg_name=$('#lsgtype-dropdown').val();
$.ajax({
url: "ward.php",
type: "POST",
data: {
ward_name:ward_name,
lsg_name: lsg_name,
district_name :district_name
},
cache: false,
success: function(result){
$("#ward-dropdown").html(result);
        
}
});
});

});

</script>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

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
<p class="my-5"><br><br><br></p>
  <footer>Copyrights 2021 Kerala Government. Developed By: C-DIT . All rights reserved.</footer>
</body>

</html>


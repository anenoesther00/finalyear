<!DOCTYPE html> 
<html>
    <head>
    <title>SignUp</title>
    
    </head>
    <?php
    include "../include/css_template.php";
    ?>
    <?php
     include "../include/navbar_templates.php";
    ?>
    <body>  
    

    <div class="hero-wrap js-fullheight" style="background-image: url('../img/image 3.jpg');background-repeat:no-repeat; background-size: cover;">

        <div class="row mt-4 pt-4 ">
            <div class="col-md-5 offset-md-3 pt-4 mt-4">
                <div class="card rounded pill mt-4 ">
                  <div class="card-header mb-3 bg-success col-sm-hidden">
                  <h5 class="h4 h4-responsive card-title text-light text-center">Sign up </h5>
                </div>
                    
                    <?php
                        require_once 'Controllers/bus_controller.php';
                        $usernameErr=$emailErr=$passErr=$numerr=$campanyerr=$confirmErr=$contanctErr="";
                        $username=$email=$contact=$number=$campany=$password=$confirm="";
                         if(isset($_POST['signup'])){
//                             echo "You Are Ready to bgin Validation";
                             if(empty($_POST['userName'])){
                                 $usernameErr="Please Enter your Preffered user name";   
                             }else{
                                 $username=$_POST['userName'];
                             }
                             if(empty($_POST['userEmail'])){
                                 $emailErr="Enter Email Addrees";
                             }else{
                                 $email=$_POST['userEmail'];
                             }
                             if(empty($_POST['userContact'])){
                                 $contanctErr="Enter Contact";
                             }else{
                                 $contact=$_POST['userContact'];
                             }
                             if(empty($_POST['number'])){
                                 $numerr="Enter number of buses owned";
                             }else{
                                 $number=$_POST['number'];
                             }
                             if(empty($_POST['userCampany'])){
                                 $campanyerr="Enter Camapany Name";
                             }else{
                                 $campany_POST['userCampany'];
                             }
                             if(empty($_POST['userPassword'])){
                                 $passErr="Enter strong password";
                             }else{
                                 $password=$_POST['userPassword'];
                             }
                                                    
                             if(!empty($username)&& !empty($email) && !empty($contact)&& !empty($number)&& !empty($campany)&& !empty($password)){
                                 //Start the Databases Conecttivity and operations
                                 ///Create an object for the class of interest
                                $owner = new BusOwner();
                                //Through the object Call the uction from your controller
                                //should be the same name as e form name
                                $owner->signUp($username, $email, $contact,$number,$campany, $password, $confirm);
                             }
                         }
                         ?>//
                <form action="login.php" class="card-body" method="POST">
                <div style="background-color:white">
              <div class = card-body>

                    
                    <label for="email">
                    <b>Email</b></label>
                    <input type="text" placeholder="Enter Email" class="form-control" name="userEmail" required>
                    
                    <label for="psw">
                    <b>Password</b></label>
                    <input type="text" placeholder="**************" class="form-control" name="userPassword" required>

                    <label for="psw">
                        <b>Confirm Password</b></label>
                        <input type="text" placeholder="************" class="form-control" name="Confirm" required>
                        
                    <label>
                        <input type="checkbox" name="Agree with terms and conditions" required="">Agree to the terms and Conditions</label><br/>
           
                        <input type="submit"  name="signup" class="h6 h6-responsive card-title text-light text-right bg-success col-sm-hidden"  value="Sign Up">

            <label>Already a member? <a href="../login.php">Login!</a></label>
             </div>
</div>
                </form>
                </div>
        <script type="text/javascript" src="assets\js\jquery-3.4.1.js"></script>
        <script type="text/javascript" src="assets\js\bootstrap.min.js"></script>
        </body>
   
    <?php

include "../include/footer_templates.php";
include  "../include/js_template.php";
?>

 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>



</html>

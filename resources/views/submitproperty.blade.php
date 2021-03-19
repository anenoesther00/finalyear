<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Submit Property</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	
</head>

<body>



<?php
                        require_once '../Controllers/SubmitpropertyController.php';
                        $submitproperty_idErr;$firstnameErr;$lastnameErr;$typeofrentalErr;$priceErr;$photoErr;$contactErr;$descriptionErr;"";
                        $submitproperty_id;$firstname;$lastname;$typeofrental;$price;$photo;$contact;$description;"";
                         if(isset($_POST['submitproperty'])){
//                             echo "You Are Ready to bgin Validation";
                             if(empty($_POST['firstname'])){
                                 $firstnameErr="Please Enter your first name";   
                             }else{
                                 $firstname=$_POST['firstname'];
							 }
							 if(empty($_POST['lastname'])){
								$lastnameErr="Please Enter your last name";   
							}else{
								$lastname=$_POST['lastname'];
							}
                             if(empty($_POST['typeofrental'])){
                                 $typeofrentalErr="Enter type of rental";
                             }else{
                                 $typeofrental=$_POST['typeofrental'];
							 }
							 if(empty($_POST['price'])){
								$priceErr="Please Enter price of property";   
							}else{
								$price=$_POST['price'];
							}
                              if(empty($_POST['photo'])){
                                 $photoErr="Please insert photo";
                             }else{
                                 $photo=$_POST['photo'];
							 }
							 if(empty($_POST['contact'])){
								$contactErr="Please Enter your phone number";   
							}else{
								$contact=$_POST['contact'];
							}
                             if(empty($_POST['description'])){
                                 $descriptionErr="Enter detailed description of property";
                             }else{
                                 $description=$_POST['description'];
                             }
                            
                             
                             if(!empty($submitproperty_id)&& !empty($firstname) && !empty($lastname) && !empty($typeofrental)&& !empty($price) && !empty($photo) && !empty($contact) && !empty($description)){
                                 //Start the Databases Conecttivity and operations
                                 ///Create an object for the class of interest
                                $submitproperty = new submitproperty();
                                //Through the object Call the uction from your controller
                                //should be the same name as e form name
                                $submitproperty->submitproperty($submitproperty_id,$firstname,$lastname,$typeofrental,$price, $photo, $contact, $description);
                             }
                         }
//    
                              ?>  

 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">HRently</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/index">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/rentals">Rentals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/submitproperty">Submit property</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/index#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 
 
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-cta">
							<h1>RENT WITH US!</h1>
							<p>We are here to support and bring clients easier to you inorder to rent out your room, home or house</p>
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">First Name</span>
											<input class="form-control" type="text" name="firstname" placeholder="First Name">
											<span style="color:red"><?php echo $firstnameErr;?></span>
										</div>
									</div>
								</div>
								<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<span class="form-label">Last Name</span>
												<input class="form-control" type="text" name="lastname" placeholder="Last Name">
												<span style="color:red"><?php echo $lastnameErr;?></span>
											</div>
										</div>
									</div>
									<div class="row">
								<div class="form-group" method="post" action=""> 
									<div class="col-md-6">
									<span class="form-label">Type of rental</span>
									<select class="form-control" name="typeofrental">
										<option selected>Choose type of rental</option>
										
										<option value="Room">Room</option>
										<option value="Apartment">Apartment</option>
										<option value="Bungalow">Bungalow</option>
										<option value="Masion">Masion</option>
										 </select>
										 <span class="select-arrow"></span>
										 <span style="color:red"><?php echo $typeofrentalErr;?></span>
									</div>				
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Price</span>
											<input class="form-control" type="number" name="price" placeholder="Price in shillings">
											<span style="color:red"><?php echo $priceErr;?></span>
										</div>
									</div>
								</div>
								<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','admin') or die('Unable To connect');
    $sql = "insert into photo (image) values(?)";

    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly UPloaded';
    }else{
        $msg = 'Error uploading image';
    }
    mysqli_close($con);
}
?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Photo</span>
											<input class="form-control" type="file" name="photo" placeholder="insert image">
											<span style="color:red"><?php echo $photoErr;?></span>
											
										</div>
									</div>
								
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Contact</span>
											<input class="form-control" type="number" name="contact" placeholder="+256.........">
											<span style="color:red"><?php echo $contactErr;?></span>
										</div>
									</div>
								</div></div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<span class="form-label">Description</span>
											<textarea class="form-control is-invalid" id="validationTextarea" name="description" placeholder="Briefly describe the rental..." required></textarea>
											<span style="color:red"><?php echo $descriptionErr;?></span>
											
										</div>
									</div></div>
									<div class="form-group">
											<div class="form-check">
											  <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
											  <label class="form-check-label" for="invalidCheck3">
												Agree to terms and conditions
											  </label>
											  <div class="invalid-feedback">
												You must agree before submitting.
											  </div>
											</div>
										  </div>
									
								<div class="form-btn">
								
									<input type="submit" name="submit"class="h6 h6-responsive card-title text-light text-right bg-success col-sm-hidden"  value="Submit">
									<a href="rentals.blade.php">

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


</html>
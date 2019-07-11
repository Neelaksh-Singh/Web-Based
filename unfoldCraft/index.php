<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require './PHPMailer/src/Exception.php';
	require './PHPMailer/src/PHPMailer.php';
	require './PHPMailer/src/SMTP.php';

?>






<?php
	
	$notify="";
	
	if(isset($_POST['button'])){
		
	// Load Composer's autoloader
		
	function sendemailtome($email,$name,$phone,$address,$message,$city,$zip_Code,$state ,$company,$msg ,$file){
		//Recipients
						
			// Load Composer's autoloader
			

			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);
		
			try {
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = "secure1.natsav.info"; 					 // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'project@unfoldcraft.com';                     // SMTP username
			$mail->Password   = 'Nnfoldcraft94314277';                               // SMTP password
			$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			
			

			// Instantiation and passing `true` enables exceptions
			
			$mail->setFrom('project@unfoldcraft.com', 'CLIENT');
			$mail->addAddress('project@unfoldcraft.com', 'UNFOLDCRAFT');     // Add a recipient

			// Content
			$mail->isHTML(true);     
			if($_FILES['attachment']['name']){
			$mail->addAttachment($file);                               // Set email format to HTML
			}
			$mail->Subject = 'Here is the '.$name;
			$mail->Body    = '<b>FULL NAME:</b>'.$name.'<br> <b>Email:</b>'.$email.'<br> <b>Phone:</b>'.$phone.'<br><b>Address:</b>'.$address.'<br><b>City:</b>'.$city.'<br><b>Zip Code:</b>'.$zip_Code.'<br><b>State:</b>'.$state.'<br><b>Company:</b>'.$company.'<br><b style="color:red;">Message:</b>'.$msg.' ';
			$mail->AltBody = 'This is the body  plain text for non-HTML mail clients';
			return $mail->send();
			
			
			}
			
			catch(Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
	
		 
		} 
	function sendmailtoclient($email,$name){
		
		//Recipients
						
			// Load Composer's autoloader
			

			// Instantiation and passing `true` enables exceptions
			$mail = new PHPMailer(true);
		
			try {
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = "secure1.natsav.info"; 					 // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'project@unfoldcraft.com';                     // SMTP username
			$mail->Password   = 'Nnfoldcraft94314277';                               // SMTP password
			$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			
			

			// Content
			$mail->isHTML(true);     
			
		             
			
			
			
			
			
			$mail->setFrom('project@unfoldcraft.com', 'UNFOLDCRAFT');
			$mail->addAddress($email,$name);   
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Hello '.$name;
			$mail->Body    = 'We appreciate you contacting us. One of our colleagues will get back to you shortly. We’re thrilled to hear from you. Our inbox can’t wait to get your messages, so talk to us any time you like. Have a great day! 
								<br><a href="http://unfoldcraft.com/">www.unfoldcraft.com</a>';
			$mail->AltBody = 'This is the body  plain text for non-HTML mail clients';
			$mail->send();
			}
			
			catch(Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
	
		 
	}
		
		$name = $_POST['full-name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$zip_Code = $_POST['zip_Code'];
		$state = $_POST['state'];
		$company = $_POST['company'];
		$message = $_POST['message'];
		$file="";
		if($_FILES['attachment']['name']){
		$file_tmp_loc = $_FILES['attachment']['tmp_name']; 
		$file = "upload/". basename($_FILES['attachment']['name']);
		}
	
		if(isset($_POST['button'])){
			if(sendemailtome($email,$name,$phone,$address,$message,$city,$zip_Code,$state ,$company,$message ,$file)){
				$notify ='Email sent';
				
				sendmailtoclient($email,$name);
			}
			else{
				
				$notify = 'email Failed';
			}
			
		}
	
				
		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function

		}
		
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="UnfoldCraft - Digital Design and Develpoment Services">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>UnfoldCraft : Digital Design and Develpoment Services</title>
	
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.icu">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
	
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

   

  <!-- header ---------------------------------------------------------------------------------------------------------------------------------->
		<?php
			include('./header.php');
		?>
			
								
								 <div class="col-lg-6" >
                                   <h4>
                                   
									<?php
										if($notify){
											echo('
																						
																						
										<div class="jumbotron text-xs-center" style="margin-top:100px;">
										  <h1 class="display-3">Thank You!</h1>
										  <p class="lead"><strong>Please check your email</strong> for further instructions.</p>
										  <hr>
										  <p>
											Having trouble? <a href="tel:+919358271377">Contact us</a>
										  </p>
										  <p class="lead">
											<a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
										  
										  </p>
										</div>
												
												
											');
										}
										
									?>
											
                                   </h4>
                                </div>
								
								
  <!-- header ---------------------------------------------------------------------------------------------------------------------------------->
    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src="./img/core-img/curve-1.png" alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-text">
                                    <h2 data-animation="fadeInUp" data-delay="100ms">We screen <br> your <span>Thoughts.</span></h2>
                                    
                                    <h5 data-animation="fadeInUp" data-delay="400ms">We create stories that our clients can be remembered of and say "This is what I want".
										We Offer creative End To End digital Service Solutions, Just on Time! </h5>
                                    
                                    <a href="https://www.youtube.com/channel/UC9krYoM7wJSgfhG_D8U1DeA" class="btn ufc-btn btn-2" data-animation="fadeInUp" data-delay="700ms"><i class="fa fa-youtube-play" aria-hidden="true" id="icon1" style="font-size:20px; padding-right:10px; "></i>Start Exploring</a>
                                    
                                </div>
                            </div>
                            <!-- Welcome Thumbnail -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-thumbnail">
                                    <img src="./img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src="./img/core-img/curve-1.png" alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-text">
                                   <h2 data-animation="fadeInUp" data-delay="100ms">We screen <br> your <span>Thoughts.</span></h2>
                                    
                                    <h5 data-animation="fadeInUp" data-delay="400ms">We create stories that our clients can be remembered of and say "This is what I want".
										We Offer creative End To End digital Service Solutions, Just on Time! </h5>
                                    
                                    <a href="https://www.youtube.com/channel/UC9krYoM7wJSgfhG_D8U1DeA" class="btn ufc-btn btn-2" data-animation="fadeInUp" data-delay="700ms"><i class=" fa fa-youtube-play" aria-hidden="true" id="icon1" style="font-size:20px; padding-right:10px; "></i>Start Exploring</a>
                                    
                                </div>
                            </div>
                            <!-- Welcome Thumbnail -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-thumbnail">
                                    <img src="./img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src="./img/core-img/curve-1.png" alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-text">
                                  <h2 data-animation="fadeInUp" data-delay="100ms">We screen <br> your <span>Thoughts.</span></h2>
                                    
                                    <h5 data-animation="fadeInUp" data-delay="400ms">We create stories that our clients can be remembered of and say "This is what I want".
										We Offer creative End To End digital Service Solutions, Just on Time! </h5>
                                    
                                    <a href="https://www.youtube.com/channel/UC9krYoM7wJSgfhG_D8U1DeA" class="btn ufc-btn btn-2" data-animation="fadeInUp" data-delay="700ms"><i class="fa fa-youtube-play" aria-hidden="true" id="icon1" style="font-size:20px; padding-right:10px; "></i>Start Exploring</a>
                                    
                                </div>
                            </div>
                            <!-- Welcome Thumbnail -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-thumbnail">
                                    <img src="./img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    
    <!-- ***** Services Area Start ***** -->
    <section class="ufc-services-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Our Services</h2>
                    </div>
                </div>
            </div>

            <div class="row">



				




                <!-- Single Service Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_grid-2x2"></i>
                        </div>
                        <h5>Animation & Vfx</h5>
                      
                    </div>
                </div>
				

				<!-- Modal -->
				<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle"> Request Your Service </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
														 <!-- ***** Contact Area Start ***** -->
									<section class="ufc-contact-area section-padding-80 request_service_form">
										<div class="container">
											<div class="row ">
												<!-- Contact Form -->
												<div class="col-12  ">
													<div class="ufc-contact-form mb-80">
													   
													   
														<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
															<div class="row">
															
																
																
																
																<div class="col-lg-6">
																   <h4>CLIENT INFORMATION</h4>
																</div>
																<div class="col-lg-6">
																		
																</div>
																   
															   <div class="col-lg-6">
																		<p></p>
																</div>
																<div class="col-lg-6">
																		<p></p>
																</div>
																
																
																<div class="col-lg-6">
																	<div class="form-group">
																		<input type="text" class="form-control mb-30" name="full-name" placeholder="Name" required>
																	</div>
																</div>
																 <div class="col-lg-6">
																	<div class="form-group">
																		<input type="text" class="form-control mb-30" name="phone" placeholder="Phone" required>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<input type="email" class="form-control mb-30" name="email" placeholder="Email" required>
																	</div>
																</div>
															   
																<div class="col-lg-6">
																	<div class="form-group">
																		<input type="text" class="form-control mb-30" name="address" placeholder="Address" required>
																	</div>
																</div>
																 <div class="col-lg-6">
																	<div class="form-group">
																		<input type="text" class="form-control mb-30" name="state" placeholder="State" required>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<input type="text" class="form-control mb-30" name="city" placeholder="City" required>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<input type="text" class="form-control mb-30" name="zip_Code" placeholder="Zip Code" required>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group btn " style="margin-top:7px;">
																		<span>Attach file</span>
																		<input type="file"  name="attachment">
																	</div>
																</div>
																
																
																
																
																
															   <div class="col-lg-6">
																		<p></p>
																</div><div class="col-lg-6">
																		<p></p>
																</div><div class="col-lg-6">
																		<p></p>
																</div><div class="col-lg-6">
																		<p></p>
																</div>
																<div class="col-lg-6">
																   <h4>PROJECT INFORMATION</h4>
																</div>
																 <div class="col-lg-6">
																   
																   
																</div>
															   
															   <div class="col-lg-6">
																		<p></p>
																</div>
																<div class="col-lg-6">
																		<p></p>
																</div>
																
															  
																<div class="col-lg-6" >
																	<div class="form-group" >
																		
																		<input type="radio"  name="company" value="indivisual" required><span style="margin-right: 55px;">indivisual</span>
																		<input type="radio"  name="company" value="Commercial" required>Commercial
																	   
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																	  
																		<input type="radio"  name="company"  value="government" required><span style="margin-right: 55px;">Government</span>
																		<input type="radio"  name="company" value="non profit" required>Non Profit
																	</div>
																</div>
																<div class="col-12">
																	<div class="form-group">
																		<textarea class="form-control mb-30" name="message" rows="8" cols="80" placeholder="Project Description" ></textarea>
																	</div>
																</div>
																
															</div>
														
											  
														
														
													</div><div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button  name="button" class="btn btn-primary">Submit</button>
														</div>
														</form>
														
												</div>


											</div>
												
											  </div>
										   

									</section>
									<!-- ***** Contact Area End ***** -->




					  </div>
					  
					</div>
				  </div>
				</div>


				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_film"></i>
                        </div>
                        <h5>Video Production</h5>
                      
                    </div>
                </div>


				 <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_desktop"></i>
                        </div>
                        <h5>Website development</h5>
                      
                    </div>
                </div>
                

              
                
                </div>
                
                
                
                
                
                
                
                
                
             <div class="row collapse" id="collapseExample">
               
                <div class="col-12 col-lg-4 " >
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_documents_alt"></i>
                        </div>
                        <h5>Corporate Design</h5>
                       
                    </div>
                </div>
                
				  <!-- Single Service Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_star_alt"></i>
                        </div>
                        <h5>Ad Film</h5>
                       
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_pencil_alt"></i>
                        </div>
                        <h5>Content Writing</h5>
                       
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_tablet"></i>
                        </div>
                        <h5>App development</h5>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_ribbon_alt"></i>
                        </div>
                        <h5>Illustrations</h5>
                       
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_image"></i>
                        </div>
                        <h5>Art Works</h5>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_toolbox_alt"></i>
                        </div>
                        <h5>Digital promotion</h5>
                       
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="arrow_triangle-up_alt"></i>
                        </div>
                        <h5>Motion graphics</h5>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_images"></i>
                        </div>
                        <h5>On Time Photography (OTP)</h5>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_camera_alt"></i>
                        </div>
                        <h5>Photography</h5>
                       
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_printer"></i>
                        </div>
                        <h5>Print Design</h5>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_mobile"></i>
                        </div>
                        <h5>Social Media Design</h5>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="social_picassa"></i>
                        </div>
                        <h5>UI/UX Design</h5>
                     
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_mic_alt"></i>
                        </div>
                        <h5>Voice-over</h5>
                      
                    </div>
                </div>
               
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="icon_gift"></i>
                        </div>
                        <h5>Customized Gifts</h5>
                        
                    </div>
                </div>
               

            </div>
            
           <p style="text-align:center;">
				  <button onclick="myFunction()" id="myBtn" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Read More
				  </button>
		  </p>
            <script>
			var i = 1;
			function myFunction() {
				
			  var btnText = document.getElementById("myBtn");

			  if (i == 1) {
				
				btnText.innerHTML = "Read less"; 
				i=0;
			  } else {
				
				btnText.innerHTML = "Read More"; 
				i=1;
				
			  }
			}
			</script>
            
            
        </div>
    </section>
    <!-- ***** Services Area End ***** -->
	
<br>
<br>
<br>
<br>
<br>
<br>
	
	
   
   
	<!-- ***** About Us Area Start ***** -->
    <section class="ufc-about-us-area">
        <div class="container">
            <div class="row align-items-center">

                <!-- About Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="about-us-thumbnail mb-80">
                        <img src="./img/bg-img/2.png" alt="">
                        <!-- Video Area -->
                        <div class="ufc-video-area hi-icon-effect-8">
                            <a href="https://www.youtube.com/watch?v=5Se8Y4Iaxls" class="hi-icon video-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- About Us Content -->
                <div class="col-12 col-md-6">
                    <div class="about-us-content mb-80">
                        <h2>We're a firm for every   digital design services.</h2>
                        <p>Unfold Craft, is an online marketplace for design & development services. Serving with quality is our constant goal to achieve. Working with Unfold Craft, You can hustle free with all your digital design services. As we provide services for developing Website, Print Graphics, Corporate Graphics, Multimedia Design, Video Production, Documentary films, Corporate Videos, UI/UX Design, Social Media Marketing , Online Promotion and many more.</p>
                        <a href="./about.php" class="btn ufc-btn btn-2 mt-4">Start Exploring</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
            <img src="./img/core-img/curve-2.png" alt="">
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    

    <!-- ***** Footer Area Start ***** -->
  
	<?php
		include('footer.php');
	?>
  
  
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js -->
    <script src="js/ufc.bundle.js"></script>
    <!-- Active js -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>

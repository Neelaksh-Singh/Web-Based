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
		
	function sendemailtome($name,$email,$phone,$subject,$message){
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
			
			$mail->Subject = 'Here is the '.$name;
			 $mail->Body    = '<b>FULL NAME:</b>'.$name.'<br> <b>Email:</b>'.$email.'<br> <b>Phone:</b>'.$phone.'<br><b>Subject:</b>'.$subject.'<br><b style="color:red;">Message:</b>'.$message.' ';
  
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
		$subject = $_POST['subject'];
		
		
		$message = $_POST['message'];
		
		if(isset($_POST['button'])){
			if(sendemailtome($name,$email,$phone,$subject,$message)){
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
    <meta name="description" content="UnfoldCraft : Digital Design and Develpoment Services">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>UnfoldCraft : we screen your thoughts</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

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

  

   <?php
			include('./header.php');
   ?>
    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

		
								
    <!-- ***** Contact Area Start ***** -->
    <section class="ufc-contact-area section-padding-80">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Contact Form -->
                <div class="col-12 col-lg-8">
                    <div class="ufc-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4> Feel free to send your queries as "we screen your thoughts".  </h4>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <form action="<?php $_SERVER['PHP_SELF'];?>"  method="POST" >
							
								
								 <div class="col-lg-6">
                                   <h4>
                                   
									<?php
										if($notify){
											echo('
																						
																						
										<div class="jumbotron text-xs-center">
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
								
								
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="full-name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-30" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="subject" placeholder="subject" required>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control mb-30" name="message" rows="8" cols="80" placeholder="Message" ></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn ufc-btn btn-3 mt-15" name="button" >Contact Us</button>
                                </div>
                            </div>
                        </form>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>

                <!-- Single Contact Card -->
                <div class="col-12 col-lg-3">
                    <div class="contact-sidebar-area mb-80">
                        <!-- Single Sidebar Area -->
                      
                        <!-- Single Sidebar Area -->
                        <div class="single-contact-card mb-50">
                            <h4>Jharkhand (Head Office)</h4>
                            <h3>+91-9358271377</h3>
                            <h6>Po.Ratu,Ps.Ratu , Vill.Jhakaratand,Ranchi<br>info@unfoldcraft.com</h6>
                        </div>

                        <!-- Single Sidebar Area -->
                        <div class="single-contact-card mb-50">
                            <h4>Rajasthan (Branch Office)</h4>
                            <h3>+91-9358271377</h3>
                            <h6>Malviya Nagar Industrial Area, Malviya Nagar  <br>info@unfoldcraft.com</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Google Maps -->
                <div class="col-12">
                    <div class="google-maps">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2116.453175117251!2d75.82361448882219!3d26.85789258186293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db790d72e1d5d%3A0xa5c4349071458089!2sUnfold+Craft!5e0!3m2!1sen!2sus!4v1561125387960!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Area End ***** -->


	<!-- footer------------------------------------------------------>
	
		<?php 
			include('footer.php');
		?>
	
	<!-- footer------------------------------------------------------>



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

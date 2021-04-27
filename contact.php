<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'footballd4l@gmail.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<!--Font Icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	<script src="script.js"></script>

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div class="wrapper">
		<!-- Navigation Bar -->
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#myNavbar">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
         <div class="navbar-left logo"> 
<div class="logo"><a href="home.html"><img src ="img/logo.png"></a></div>
          </div>
		<h1 class="brand brand-name navbar-left"><div class"navbar-left">Vilnius Travels</h1>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="home.html">Home</a></li>
   				<li><a href="flight.html">Flights</a></li>
   				<li><a href="hotel.html">Hotels</a></li>
    			<li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">	
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Name</label>
		      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Email</label>
	      	<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	      </div>
	      <div class="form-group">
	      	<label>Message</label>
	      	<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
	      </div>
	      <br>
	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
		</div>
	</div>

	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h6>About Us</h6>
					<p class="text-justify">Set in the heart of Vilnius, Vilnius Travels aims to promote the hidden gem capital of Lithuania. Providing travel booking services such as flights and hotels in and out of the city of Vilnius, and aswell as having excellent customer service support</p>
				</div>
				


				<div class="col-xs-6 col-md-3">
					<h6>Information</h6>
					<div class="information">
						<div class="location">
							<span class="fas fa-map-marker-alt"></span>
							<span class="text">Antakalnio g. 124, LT-10200, Vilniaus m. sav.</span>
						</div>
						<div class="number">
							<span class="fas fa-phone-alt"></span>
							<span class="text">+370 661 05555</span>
						</div>
						<div class="email">
							<span class="fas fa-envelope"></span>
							<a href = "mailto: vilniustravels@mail.com">vilniustravels@mail.com</a>
						</div>
					</div>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Quick Links</h6>
					<ul class="footer-links">
						<li><a href="flight.html">Flights</a></li>
						<li><a href="home.html">Hotels</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
			 <a href="#">VilniusTravels</a>.
					</p>
				</div>
			</div>
		</div>
</footer>
</div>
</div>
</body>

</html>
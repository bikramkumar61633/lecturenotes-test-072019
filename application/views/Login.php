<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title><?= APPLICATIONNAME ?> | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?= base_url() ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/font.css" type="text/css"/>
<link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?= base_url() ?>assets/js/jquery2.0.3.min.js"></script>
</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2>Login</h2>
				</div>
                <form action="<?= site_url('auth/processauthentication') ?>" method="post" class="login-form" id="ajax_post_login_form">
                    <div class="alert alert-success" id="alert-message" style="display:none"></div>
					<input type="text" name="username" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
					<input type="password" name="password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
					<input type="submit" class="register" value="Login">
				</form>
				<div class="signin-text">
					<div class="text-left">
						<!-- <p><a href="#"> Forgot Password? </a></p> -->
					</div>
					<div class="text-right">
						<p><a href="<?= site_url('auth/signup') ?>"> Create New Account</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- <h5>- OR -</h5>
				<div class="footer-icons">
					<ul>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<a href="index.html">Back To Home</a> -->
			</div>
			
			<!-- footer -->
			<div class="copyright">
				<p>© 2016 Colored . All Rights Reserved .</p>
			</div>
			<!-- //footer -->
			
		</div>
    <script src="<?= base_url() ?>assets/js/proton.js"></script>
    <script src="<?= base_url() ?>assets/app/auth.js"></script>
</body>
</html>

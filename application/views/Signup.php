<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Colored  an Admin Panel Category Flat Bootstrap Responsive Website Template | Signup :: w3layouts</title>
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
					<h2>Sign Up</h2>
				</div>
				<form id="signup-form" method="post" action="<?= site_url('auth/ajaxRegister') ?>">
                    <input type="text" name="fullname" value="" placeholder="Fullname" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}">
                    <input type="email" name="emailid" value="" required placeholder="Emailid"nfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
					<input type="tel" name="phone" value="" placeholder="Phone" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
                    <input type="password" name="password" value="" placeholder="Password" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
					<input type="submit" class="register" value="Sign Up">
				</form>
				<a href="<?= site_url('auth') ?>">Back To Login</a>
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

<?php 
include 'db.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Designer Login Page</title>
		<link rel="stylesheet" href="j.css" />
		<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
		<script>
			$(document).ready(function () {
			   $(".val").keypress(function (e) {
				   var N = e.which;
					   if (N < 48 || N > 57)
						   e.preventDefault();
				   });
				});
		</script>
		
	</head>
<body>
<div class="container" id="container">
<div class="form-container sign-up-container">
	<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="https://www.facebook.com" class="social" style="font-weight:bold">f<i class="fab fa-facebook-f"></i></a>
				<a href="https://www.gmail.com" class="social" style="font-family:'Arial Unicode MS';font-weight:bold">G+<i class="fab fa-google-plus-g"></i></a>
				<a href="https://www.linkedin.com/login" class="social" style="font-weight:bold">in<i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" required/>
			<input type="email" placeholder="Email" required/>
                        <input type="text" placeholder="Mobile Number" class="val" maxlength="10" required/>
                        <input type="text" placeholder="Address" class="address" required/>
			<input type="password" placeholder="Password" required/>
			<button>Sign Up</button>
	</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="https://www^.facebook.com" class="social" style="font-weight:bold">f<i class="fab fa-facebook-f"></i></a>
				<a href="https://www.gmail.com" class="social" style="font-family:'Arial Unicode MS'; font-weight:bold">G+<i class="fab fa-google-plus-g"></i></a>
				<a href="https://www.linkedin.com/login" class="social" style="font-weight:bold">in<i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" required/>
			<input type="password" placeholder="Password" required/>
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
		<script src="j.js"></script>
</body>
</html>
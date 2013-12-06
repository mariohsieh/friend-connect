<?php
	session_start();
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>FriendConnect</title>

	<!-- jQuery links -->
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {

		});
	</script>

	<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body class="reset">
	<span id="alerts"><button id="alert-but" class="center">OK</button></span>
	<div id="overlay"></div>
	<header>
		<nav class="container center">
			<ul class="reset">
				<li>FriendConnect</li>
			</ul>
		</nav>
	</header>
	<section class="container center" >
		<form action="process.php" method="post">
			<article id="login-wrap" class="signin-wrap center">
				<h2>Login</h2>
				<ul>
					<li>
						<input type="text" name="luser" placeholder="Username" class="block signin" />
					</li>
					<li>
						<input type="password" name="lpass" placeholder="Password" class="block signin" />
					</li>
					<li>
						<input id="login" type="submit" class="block signin submit pointer" value="Login" />
					</li>
					<li>
						<a href="#" class="block signin">Don't have an account?</a>
					</li>
				</ul>
			</article>
			<article id="register-wrap" class="signin-wrap center">
				<h2 class="reset">Registration</h2>
				<ul class="reset">
					<li>
						<input id="ruser" type="text" name="ruser" placeholder="Username" maxlength="50" class="signin-box" />
						<span id="01" class="check-dot"></span>
						<label for="ruser" class="block signin-label">Minimum 3 letters or numbers</label>
					</li>
					<li>
						<input id="remail" type="text" name="remail" placeholder="Email Address" class="signin-box" />
						<span id="02" class="check-dot"></span>
						<label for="remail" class="block signin-label">Use proper email format</label>
					</li>
					<li>
						<input id="rpass" type="password" name="rpass" placeholder="Password" class="signin-box" />
						<span id="03" class="check-dot"></span>
						<label for="rpass" class="block signin-label">At least 8 characters</label>
					</li>
					<li>
						<input id="rpassconf" type="password" name="rpassconf" placeholder="Confirmation" class="signin-box" />
						<span id="04" class="check-dot"></span>
						<label for="rpassconf" class="block signin-label">Must match password exactly</label>
					</li>
					<li>
						<input type="reset" value="Clear" class="signin-but pointer" /><input id="register" type="submit" class=" signin-but pointer submit" value="Register" />
						<a href="#" class="block">Already have an account?</a>
					</li>

				</ul>
			</article>
			
			<input id="action_key" name="action_key" type="hidden" />
		</form>
	</section>
	<footer>
		<script type="text/javascript" src="js/index.js" ></script>
	</footer>
</body>
</html>
























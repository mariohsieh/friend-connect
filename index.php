<?php
	session_start();
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Friend Connect</title>

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
				<input type="text" name="luser" placeholder="Username" class="block signin" />
				<input type="password" name="lpass" placeholder="Password" class="block signin" />
				<input id="login" type="submit" class="block signin submit pointer" value="Login" />
				<a href="#" class="block signin">Don't have an account?</a>
			</article>
			<article id="register-wrap" class="signin-wrap center">
				<h2>Registration</h2>
				<ul>
					<li>
						<input id="ruser" type="text" name="ruser" placeholder="Username" maxlength="50" class="signin-box" />
						<span class="check-dot"></span>
					</li>
					<li>
						<label for="ruser" class="signin-label">Only letters and numbers</label>
					</li>
<!--					<input id="remail" type="email" name="remail" placeholder="Email Address" class="block signin" />
						<label for="remail" class="block signin">Use proper email format</label>
						<input id="rpass" type="password" name="rpass" placeholder="Password" class="block signin" />
						<label for="rpass" class="block signin">Must be at least 8 characters</label>
						<input id="rpassconf" type="password" name="rpassconf" placeholder="Password Confirmation" class="block signin" />
						<label for="rpassconf" class="block signin">Must match password exactly</label>
						<input id="register" type="submit" class="block signin submit pointer" value="Register" />
						<a href="#" class="block signin">Already have an account?</a>
-->
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
























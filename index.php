<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Mario Hsieh -->
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
			<article class="signin-box center">
				<h2>Login</h2>
				<input type="text" name="luser" placeholder="Username" class="block signin" />
				<input type="password" name="lpass" placeholder="Password" class="block signin" />
				<input type="submit" class="block signin" value="Login" />
				<a href="#" class="block signin">Don't have an account?</a>
			</article>
			<article class="signin-box center">
				<h2>Registration</h2>
				<input type="text" name="ruser" placeholder="Username" class="block signin" />
				<input type="text" name="email" placeholder="Email Address" class="block signin" />
				<input type="password" name="rpass" placeholder="Password must be at least 8 characters" class="block signin" />
				<input type="password" name="rpassconf" placeholder="Password Confirmation" class="block signin" />
				<input type="submit" class="block signin" value="Login" />
				<a href="#" class="block signin">Don't have an account?</a>
			</article>
			
			<input id="action_key" name="action_key" type="hidden" />
		</form>
	</section>
</body>
	<script type="text/javascript" src="js/index.js"></script>
</html>
























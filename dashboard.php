<?php
	session_start();
	include_once("connection.php");

	if (!isset($_SESSION['logged_in']))
	{
		session_destroy();
		header("Location: index.htm");
	}
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
	<link rel="stylesheet" type="text/css" href="css/dashboard.css" />
</head>
<body class="reset">
	<header>
		<nav class="container center">
			<ul class="reset">
				<li>FriendConnect</li>

				<li>Welcome 
<?
	if (isset($_SESSION['username']))
		echo $_SESSION['username'];
?>!
				</li>
				<li><a href="process-dash.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	<section class="container center">
		<p>
<?
	if (isset($_SESSION['email']))
		echo $_SESSION['email']
?>
		</p>
		<p>
<? if (isset($_SESSION['id']))
		echo $_SESSION['id']
?>
		</p>
	</section>
	<script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>

























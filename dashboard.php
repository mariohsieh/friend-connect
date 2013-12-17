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
	<!-- begin form tag -->
	<form action="process-dash.php" method="post">

	<div id="overlay"></div>
	<div id="profile-id"><?= (isset($_SESSION['id'])) ? $_SESSION['id'] : ""; ?></div>
	<header>
		<nav class="container center">
			<ul class="reset">
				<li id="home" class="pointer">FriendConnect</li>
				<li id="logout-but" class="right"><a href="process-dash.php">Logout</a></li>
				<li id="login-name" class="right">Welcome 
<?
	if (isset($_SESSION['username']))
		echo $_SESSION['username'];
?>!
				</li>
			</ul>
		</nav>
	</header>
	<section class="container center">
		<article id="display-info">
			<img id="profile-pic" alt="Profile Pic" class="left" />
			<h2 id="display-user" class="reset"></h2>
			<p id="display-status"></p>			
			<p id="display-email"></p>
			<p id="display-created"></p>
		</article>
		<article id="wrap-menu">
			<div id="friendsList" class="menu-choice pointer">Friends List</div>
			<div id="profileWall" class="menu-choice pointer">Message Wall</div>
		</article>
		<article id="results">
		</article>
	</section>

	<!-- action choice for form and close form tag -->
		<input id="action_key" type="hidden" name="action_key" />
	</form>
	<script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>

























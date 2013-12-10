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
	<div id="profile-id"><?= (isset($_SESSION['id'])) ? $_SESSION['id'] : ""; ?></div>
	<header>
		<nav class="container center">
			<ul class="reset">
				<li>FriendConnect</li>
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
			<h2 id="display-user" class="reset">
<?
	if (isset($_SESSION['username']))
		echo $_SESSION['username'] . "'s profile";
?>
			</h2>
			<p id="display-status">
<?
	if (isset($_SESSION['status']))
		echo "\""  . $_SESSION['status'] . "\"";
?>
			</p>			
			<p id="display-email">
<?
	if (isset($_SESSION['email']))
		echo "Email: " . $_SESSION['email'];
?>
			</p>
			<p id="display-created">
<? if (isset($_SESSION['created_at']))
		echo "Member since " . $_SESSION['created_at'];
?>
			</p>
		</article>
		<article id="wrap-menu">
			<div id="profile-list" class="menu-choice pointer">Friends List</div>
			<div id="profile-wall" class="menu-choice pointer">Message Wall</div>
			<form action="process-dash.php" method="post">
				<input id="action_key" type="hidden" name="action_key" />
			</form>
		</article>
		<article id="results">
		</article>
	</section>
	<script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>

























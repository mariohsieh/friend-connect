<?php
	session_start();
	include_once("connection.php");
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

	<link rel="stylesheet" type="text/css" href="css/dashboard.css" />
</head>
<body class="reset">
	<span>hi there</span>
	<p><?= $_SESSION['id'] ?>
	<script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>

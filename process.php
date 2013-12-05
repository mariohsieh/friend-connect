<?php
	session_start();
	include_once("connection.php");

//var_dump($_POST);

class Process
{
	// declare variables
	var $connection;

	// constructor, initializes $connection and calls the function to list countries or display info
	public function __construct()
	{
		// sets connection as a new class database()
		$this->connection = new Database();

		// check to see what action user wants
		if (isset($_POST['action_key']))
		{
			switch ($_POST['action_key'])
			{
				case 'register':
					$this->register();
					break;
				case 'login':
					$this->login();
					break;
				case 'friendsList':
					$this->friendsList();
					break;
				case 'addFriend':
					$this->addFriend();
					break;
				case 'wall':
					$this->wall();
					break;
				default:
					session_destroy();
					header("Location: index.php");
					break;
			}
		}
	}

	private function register()
	{
		// check to see if email address has already been registered
		//$query = "SELECT * FROM users WHERE email = '{$remail}'";
		//$users = $this->connection->fetch_all($query);

		// Register new user
		$query = "INSERT INTO users (username, email, password, created_at) VALUES ('{$_POST['ruser']}', '{$_POST['remail']}', '".md5($_POST['rpass'])."', NOW())";
		mysql_query($query);

		// Go back to login page
		header("Location: index.php");
	}
}

// create instance of Process
$process = new Process();

?>


























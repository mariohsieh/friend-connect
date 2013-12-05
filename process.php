<?php
	session_start();
	include_once("connection.php");

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
					$this->friendslist();
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

	private function login()
	{
		// check username input valididation for login
		$luser = $this->checkInput($_POST['luser']);
		if (!isset($luser) || $luser == "" || !preg_match("/^[a-zA-Z]*$/", $luser))
		{
			$errors['luserError'] = "Please input a valid username.";
		}		
	}

}

// create instance of Process
$process = new Process();

?>


























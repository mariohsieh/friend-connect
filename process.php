<?php
	session_start();
	include_once("connection.php");

//var_dump($_POST);

class Process
{
	// declare variables
	var $connection;
	var $alerts = array();

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
		// back-end validation checks

		// set variables
		$user = $this->checkInput($_POST['ruser']);
		$email = $this->checkInput($_POST['remail']);
		$pass = $_POST['rpass'];
		$confirm = $_POST['rpassconf'];

		// check user name
		if (!isset($user) || $user == "" || !preg_match("/^[a-zA-Z]*$/", $user))
		{
			$this->alerts['userError'] = "Please input a valid username.";
		}

		// check email addy
		if (!isset($email) || $email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL))	
		{
			$this->alerts['emailError'] = "Please input a valid email address.";
		}

		// check password
		if (!isset($pass) || $pass == "" || strlen($pass)<8)
		{
			$this->alerts['passError'] = "Please input a valid password.";
			if (!isset($confirm) || $confirm == "" || strlen($confirm)<8 || $confirm != $pass)
				$this->alerts['confirmError'] = "Please confirm your password.";
		}

		// check for any errors
		//if (count($alerts)>0)
			//$_SESSION['alerts'] = $alerts;
		//else
		if (count($this->alerts) == 0)
		{		
			// check to see if email address has already been registered
			$query = "SELECT * FROM users WHERE email = '{$email}'";
			$users = $this->connection->fetch_all($query);

			if (count($users)>0)
			{
				$this->alerts['emailError'] = "Your email is already on record.  Please login.";
				//$_SESSION['alerts'] = $alerts;	
			}			
			else {
				// Register new user
				$query = "INSERT INTO users (username, email, password, created_at) VALUES ('{$user}', '{$email}', '".md5($pass)."', NOW())";
				mysql_query($query);

				$this->alerts['success'] = "Thank you for registering.  Please login now!";
				//$_SESSION['alerts'] = $alerts;
			}
		}

		//var_dump($this->alerts);
		//die();

		// send data to frontend using json
		echo json_encode($this->alerts);

		// Go back to sign-in page
		//header("Location: index.php");
	}

	// checks input text
	private function checkInput($item) 
	{
		$item = trim($item);
		$item = stripslashes($item);
		$item = htmlspecialchars($item);
		return $item;
	}
}

// create instance of Process
$process = new Process();

?>


























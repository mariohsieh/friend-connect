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
				default:
					break;
			}
		}
		else
		{
			session_destroy();
			header("Location: index.htm");
			die();		
		}
	}

	private function login()
	{
		// set variables
		$user = $_POST['luser'];
		$pass = $_POST['lpass'];

		// check for valid username
		if (!isset($user) || $user == "" || !preg_match("/^[a-zA-Z]*$/", $user))
		{
			$this->alerts['userError'] = "Please enter a valid username.";
		}
		
		// check for valid password
		$pass = $_POST['lpass'];
		if (!isset($pass) || strlen($pass)<8)
		{
			$this->alerts['passwordError'] = "Please enter a valid password.";
		}

		//var_dump($this->alerts);
		//die();

		if (count($this->alerts) == 0)
		{

			// check for username and matching password in database
			$query = "SELECT * FROM users WHERE username = '{$user}' AND password = '".md5($pass)."'";
			$users = $this->connection->fetch_all($query);

			//var_dump($users);
			//die();

			if (count($users)>0)
			{
				$_SESSION['logged_in'] = true;
				$_SESSION['id'] = $users[0]['id'];
				$_SESSION['username'] = $users[0]['username'];
				$_SESSION['email'] = $users[0]['email'];
				$_SESSION['created_at'] = $users[0]['created_at'];

				//var_dump($_SESSION);
				//die();
				//var_dump($users);
				//header("Location: dashboard.php");
				//die();

				$this->alerts['loginSuccess'] = "Welcome back " . $users[0]['username'] . "!  Please continue to see your dashboard.";				
			}
			else
			{
				$this->alerts['loginError'] = "Login error.  Please try again.";
			}		
		}

		// send alerts to frontend using json
		echo json_encode($this->alerts);
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

		// check password & confirmation
		if (!isset($pass) || $pass == "" || strlen($pass)<8)
		{
			$this->alerts['passError'] = "Please input a valid password.";
		}
		elseif (!isset($confirm) || $confirm == "" || strlen($confirm)<8 || $confirm != $pass)
		{
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
			}		
			else 
			{
				// check to see if username has already been taken
				$query = "SELECT * FROM users WHERE username = '{$user}'";
				$users = $this->connection->fetch_all($query);
				
				if (count($users)>0)
				{
					$this->alerts['userError'] = "This username has already been taken.  Please choose another.";	
				}
				else
				{		
					// register new user
					$query = "INSERT INTO users (username, email, password, created_at) VALUES ('{$user}', '{$email}', '".md5($pass)."', NOW())";
					mysql_query($query);
					$this->alerts['success'] = "Thank you for registering.  Please login now!";
				}
			}
		}

		// send data to frontend using json
		echo json_encode($this->alerts);
	}

	// check input text
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

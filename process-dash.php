<?php
	session_start();
	include_once("connection.php");

class ProcessDash
{
	// declare variables
	var $connection;

	public function __construct()
	{
		$this->connection = new Database();

		// select action
		if (isset($_POST['action_key']))
		{
			switch ($_POST['action_key'])
			{
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
					break;
			}
		}
		else
		{
			// logout
			session_destroy();
			header("Location: index.htm");
			die();
		}
	}

	// get all users data from database
	private function friendsList() {
		$query = "SELECT * FROM users";
		$users = $this->connection->fetch_all($query);

		// send all users data to front end
		echo json_encode($users);
	}

}

// create instance of process dashboard
$processdash = new ProcessDash;

?>

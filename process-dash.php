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
}

// create instance of process dashboard
$processdash = new ProcessDash;

?>

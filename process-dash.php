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
				case 'editStatus':
					$this->editStatus();
					break;
				case 'addFriend':
					$this->addFriend();
					break;
				case 'wall':
					$this->wall();
					break;
				case 'addMessage':
					$this->addMessage();
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
	private function friendsList() 
	{
		$query = "SELECT * FROM users";
		//$query = "SELECT * FROM users ORDER BY users.id DESC";
		$users = $this->connection->fetch_all($query);

		$query = "SELECT * FROM friends";
		$friends = $this->connection->fetch_all($query);

		// send all users data to front end
		$data = array();
		$data['users'] = $users;
		$data['friends'] = $friends;
		echo json_encode($data);
	}

	private function editStatus() 
	{
		//var_dump($_POST);
		//die();
		$query = "UPDATE users SET status = '{$_POST['edit_status']}', updated_at = NOW() WHERE ('{$_POST['edit_id']}') = users.id";
		mysql_query($query);

		$this->friendsList();
	}

	private function addFriend()
	{
		//var_dump($_POST);
		//die();
		
		$query = "INSERT INTO friends (user_id, friend_id, created_at) VALUES ('{$_POST['user_id']}', '{$_POST['friend_id']}', NOW())";
		mysql_query($query);

		$this->friendsList();
	}

	private function wall()
	{
		$query = "SELECT * FROM messages";
		$messages = $this->connection->fetch_all($query);

		// send messages data to front end
		$data = array();
		$data['messages'] = $messages;
		echo json_encode($data);		
	}
	
	private function addMessage()
	{
		//var_dump($_POST);
		//die();

		$query = "INSERT INTO messages (profile_id, message, poster_id, created_at) VALUES ('{$_POST['profile_id']}', '{$_POST['message']}', '{$_POST['poster_id']}', NOW())";
		mysql_query($query);

		$this->wall();
	}
}

// create instance of process dashboard
$processdash = new ProcessDash;

?>















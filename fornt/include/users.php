<?php
/**
* user class for account creation and login purpose and so on
*/
class User
{
	private $conn;
	function __construct()
	{
		include_once '../database/db.php';
		$db = new Database();
		$this->conn = $db->connect();
	}
//check their email address already exist or not
	private function emailExists($email){
		$stm = $this->conn->prepare("SELECT id FROM user WHERE email = ? ");
		$stm->bind_param("s", $email);
		$stm->execute() or die($this->conn->error);
		$result = $stm->get_result();

		if ($result->num_rows >0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function creatUserAccount($username,$email,$password,$usertype){

		// use prepare statement for free from sql attack..
		if ($this->emailExists($email)) {
			echo "Email_already_exist!";
		}
		else{
			$pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
			$date = date("Y-m-d");
			$notes ="";
			$pre_stm =$this->conn->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");

			$pre_stm->bind_param("sssssss",$username,$email,$pass_hash,$usertype,$date,$date,$notes);

			$result= $pre_stm->execute() or die($this->conn->error);
			if ($result) {
				return $this->conn->insert_id;
			}
			else{
				return "SOME_ERROR";
			}
		}
	}

// for user loging 
	public function userLogin($email, $password){
		$pre_stm = $this->conn->prepare("SELECT id,username,password,last_login FROM user WHERE email =? ");
		$pre_stm->bind_param("s",$email);
		$pre_stm->execute() or die($this->conn->error);
		$result = $pre_stm->get_result();
		if ($result->num_rows < 1){
			return "NOT REGISTERED";
		}
		else{
			$row = $result->fetch_assoc();
			if (password_verify($password,$row['password'])) {

				$_SESSION['userid'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['last_login'] = $row['last_login'];

				$last_login = date("Y-m-d h:m:s");
				$pre_stm = $this->conn->prepare("UPDATE user SET last_login = ? WHERE email = ? ");
				$pre_stm->bind_param("ss",$last_login,$email);
				$result= $pre_stm->execute() or die($this->conn->error);
				if ($result) {
					return 1;
				}
				else{
					return 0;
				}
			}
			else{
				return "PASSWORD_NOT_MATCHED";
			}
		}
	}
}
$user = new User();
// $user->creatUserAccount("Nishad","nishad@gmail.com","12345","Admin");

// echo $user->userLogin("sajib@gamil.com", "12345678");

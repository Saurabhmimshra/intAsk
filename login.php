<?php
	require 'connect_db.php';

	if(isset($_POST['email']) && isset($_POST['pass'])){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);
		if(!empty($email) && !empty($pass)){
			$sql = "select * from `users` where `email` = '". $email ."' and `pswd` = '" .$pass. "'";
			if($result = mysqli_query($conn, $sql)){
				if(myqli_num_rows($result) == 1){
					ehco 'ok';
					//header('Location: ../profile.php');
				}else{
					echo "invalid username or password";
				}
			}else{
				die(mysqli_error($conn));
			}
		}else{
			die("All fields are required.");
		}
	}else{
		die('some error has occured.');
	}
?>
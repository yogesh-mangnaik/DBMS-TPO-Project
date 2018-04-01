<?php
	ob_start();
	session_start();
	function login(){
		include("php/conn.php");
		$student_id = $_POST['student_id'];
		$pass = $_POST['pass'];
		$password = sha1($pass);
		$person = $_POST['person'];
		if($person == "0"){
			$query = "SELECT * FROM student WHERE student_id = '$student_id' and password = '$password'";
			$data = mysqli_query ($db, $query) or die(mysqli_error($db));
			$count = mysqli_num_rows($data);

			if($count == 1){
				$_SESSION['user'] = $student_id;
				$_SESSION['user_type'] = 0;
				header("Location: student_profile.php"); 
			}
			else{
				echo "User not found";
			}
		}
		else if($person == "1"){
			$query = "SELECT * FROM company WHERE company_id = '$student_id' and password = '$password'";
			$data = mysqli_query ($db, $query) or die(mysqli_error($db));
			$count = mysqli_num_rows($data);

			if($count == 1){
				$_SESSION['user'] = $student_id;
				$_SESSION['user_type'] = 1;
				header("Location: company.php"); 
			}
			else{
				echo "User not found";
			}
		}
		else if($person == "2"){
			if($student_id == "admin" && $pass == "admin@tpo"){
				$_SESSION['user'] = $student_id;
				$_SESSION['user_type'] = 2;
				header("Location: tpo.php"); 
			}
		}
	}

	if(isset($_POST['submit'])) {
		login(); 
	}
?>
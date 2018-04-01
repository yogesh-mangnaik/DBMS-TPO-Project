<?php
	ob_start();
	session_start();
	function login(){
		include("conn.php");
		$student_id = $_POST['student_id'];
		$pass = $_POST['pass'];
		$password = sha1($pass);

		$query = "SELECT * FROM student WHERE student_id = '$student_id' and password = '$password'";
		$data = mysqli_query ($db, $query) or die(mysqli_error($db));
		$count = mysqli_num_rows($data);

		if($count == 1){
			$_SESSION['user'] = $student_id;
			$_SESSION['user_type'] = 0;
			header("Location: student_profile.php"); 
		}
	}

	if(isset($_POST['submit'])) {
		login(); 
	}
?>
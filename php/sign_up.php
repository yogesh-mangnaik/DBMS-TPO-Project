<?php
	session_start();
	function newUser() {
		include("conn.php");
		$student_id = $_POST['student_id'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name']; 
		$last_name = $_POST['last_name']; 
		$email = $_POST['email']; 
		$cpi = $_POST['cpi'];
		$branch = $_POST['branch'];
		$ssc_marks = $_POST['10_marks']; 
		$hsc_marks = $_POST['12_marks']; 
		$resume = $_POST['resume'];
		$pass = $_POST['pass'];
		$password = sha1($pass);

		$query = "INSERT INTO student (student_id,first_name,middle_name,last_name,branch_id,email,gpa,10_marks,12_marks,resume_link,password) VALUES ('$student_id','$first_name','$middle_name','$last_name','$branch','$email','$cpi','$ssc_marks','$hsc_marks','$resume','$password')";
		$data = mysqli_query ($db, $query) or die(mysqli_error($db));
		if($data){
			$_SESSION['user'] = $student_id;
			$_SESSION['user_type'] = 0;
			header("Location: ../student_profile.php"); 
    		exit;
		}
	}

	function SignUp() {
		if (!empty($_POST['student_id']))
		{ 
			newUser();
		}
		else{
			echo "Empty";
		}
	}

	if(isset($_POST['submit'])) {
		SignUp(); 
	}


?>
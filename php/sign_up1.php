<?php

	function NewUser() {
		include('conn.php');
		$student_id = $_POST['student_id']; 
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name']; 
		$branch_id = $_POST['branch_id'];
		$email = $_POST['email'];
		$gpa = $_POST['gpa'];
		$ssc = $_POST['10_marks'];
		$hsc = $_POST['12_marks'];
		$resume = $_POST['resume'];
		$pass = $_POST['pass'];
		
		$query = "INSERT INTO `student` (`student_id`, `first_name`, `middle_name`, `last_name`, `branch_id`, `email`, `gpa`, `10_marks`, `12_marks`, `resume_link`, `password`) VALUES
			('$student_id', '$first_name', '$middle_name', '$last_name', '$branch_id', '$email', '$gpa', '$ssc', 'hsc', '$resume', '$pass')";
		$data = mysqli_query ($db, $query) or die(mysqli_error($db));
		if($data) {
			echo "YOUR REGISTRATION IS COMPLETED..."; 
		} 
		else{
			echo "REGISTRATION FAILED";
		}
	}

	function SignUp() {
		if (!empty($_POST['student_id']))
		{ 
			echo "Registering";
			newUser();
		}
		else{
			echo "Empty";
		}
	}

	if(isset($_POST['submit']))
	{
		SignUp();
	}
	else{
		echo "problem";
	}
?>
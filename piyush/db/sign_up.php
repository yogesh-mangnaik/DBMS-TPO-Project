<?php
	ob_start();
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
			header("Location: student_profile.php");
    		exit;
		}
	}

	function SignUp() { 
		if (!empty($_POST['student_id'])){ 
            if($_POST['pass'] == $_POST['repass']){
                newUser();
            }else{
                echo '<script type="text/javascript">';
                echo 'alert("Enter password correctly.")';
                echo '</script>';
            }
		}else{
			echo "Empty";
		}
	}

	if(isset($_POST['submit'])) {
		SignUp(); 
	}

    if(isset($_SESSION['user'])){
        header("Location : student_profile.php");
    }
    else{
        echo "<strong>Error</strong>";
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>V J T I</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/sign_up.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Background -->
    <div id="back_colour">
        
    </div>
    
    <!-- Form -->
    <section class="container">
        <div id="form">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 id="sign_text">Sign Up</h2>
                </div>
            </div>
            <form id="signup" method="POST" action="sign_up.php">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" id="student_id" name="student_id" type="text" placeholder="Registration id *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="container">
                    <div class="row" id="name">
                        <div class="col-lg-4 text-center">
                            <div class="form-group">
                                <input class="form-control" name="first_name" type="text" placeholder="First Name *" required data-validation-required-message="Please enter your name." autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    
                        
                        <div class="col-lg-4 text-center">
                            <div class="form-group">
                                <input class="form-control" name="middle_name" type="text" placeholder="Middle Name *" required data-validation-required-message="Please enter your name." autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                       
                        <div class="col-lg-4 text-center">
                            <div class="form-group">
                                <input class="form-control" name="last_name" type="text" placeholder="Last Name *" required data-validation-required-message="Please enter your name." autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="email" type="text" placeholder="Email *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="cpi" type="text" placeholder="CPI *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <select class="form-control" id="branch" name="branch">
                            <option value="1">Civil Engineering</option>
                            <option value="2">Computer Engineering</option>
                            <option value="3">Electrical Engineering</option>
                            <option value="4">Electronics and Telecommunication Engineering</option>
                            <option value="5">Electronics Engineering</option>
                            <option value="6">Information Technology</option>
                            <option value="7">Mechanical Engineering</option>
                            <option value="8">Production Engineering</option>
                            <option value="9">Textile Engineering</option>
                        </select>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="10_marks" type="text" placeholder="10th Marks *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="12_marks" type="text" placeholder="12th Marks *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="resume" type="text" placeholder="Resume Link *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="pass" type="password" placeholder="Password *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="repass" type="password" placeholder="Re-Password *" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div >
                            <button class="btn btn-xl" type="submit" name="submit">Sign Up</button>
                        </div> 
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="copyright">Copyright &copy; VJTI 2017</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>


</body>

</html>


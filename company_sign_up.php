<?php
	session_start();
	function newUser() {
		include("php/conn.php");
		$company_id = $_POST['company_id'];
		$company_name = $_POST['company_name'];
		$email = $_POST['email']; 
		$visiting_date = $_POST['visiting_date'];
		$pass = $_POST['pass'];
		$password = sha1($pass);
        $job_desc = $_POST['job_desc'];
        $package = $_POST['package'];

		$query = "INSERT INTO company (company_id,company_name,email_id,visiting_date,password) VALUES ('$company_id','$company_name','$email','$visiting_date','$password')";
		$data = mysqli_query ($db, $query) or die(mysqli_error($db));
        $query = "INSERT INTO job_desc (company_id,job_description,package_intern,package_placement) VALUES ('$company_id', '$job_desc', '$package', '0')";
        $data2 = mysqli_query($db, $query) or die(mysqli_error($db));
		if($data){
			$_SESSION['user'] = $company_id;
			$_SESSION['user_type'] = 1;
			header("Location: company.php"); 
    		exit;
		}
        else{
            echo "Sign up failed";
        }
	}

	function SignUp() {
		if (!empty($_POST['company_id']))
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


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>V J T I</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>s

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
            <form id="signup" method="POST" action="">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" id="company_id" name="company_id" type="text" placeholder="Company id *" required data-validation-required-message="Please enter company id." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>     
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" id="company_name" name="company_name" type="text" placeholder="Company Name *" required data-validation-required-message="Please enter company name." autocomplete="off">
                            <p class="help-block text-danger"></p>
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
                            <input class="form-control" name="visiting_date" type="text" placeholder="Visiting Date (YYYY-MM-DD)*" required data-validation-required-message="Please enter your visiting date." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="package" type="text" placeholder="Package*" required data-validation-required-message="Please enter your visiting date." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="job_desc" type="text" placeholder="Job Description*" required data-validation-required-message="Please enter your visiting date." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="pass" type="password" placeholder="Password *" required data-validation-required-message="Please enter your password." autocomplete="off">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <input class="form-control" name="repass" type="password" placeholder="Re-Password *" required data-validation-required-message="Password do not match." autocomplete="off">
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

<!DOCTYPE html>
<html lang="en">
<?php 
	include("php/conn.php"); 
	session_start();
	if(!isset($_SESSION['user'])){
	    header("Location: index.html");
	}
    else{
        if($_SESSION['user_type'] == 0){
            header("Location : student_profile.php");
        }
        else if($_SESSION['user_type'] == 1){
            header("Location : company.php");
        }
    }
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Training And Placement Office</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/tpo.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse" id="mainNav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">TPO ADMIN</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="php/logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Tabs -->
    <div id="main_tabs">
        <div class="container">
            <div class="tabs">
                <div class="row">
                    <div class="col-lg-4">
                        <button class="btn btn-xl active tab_buttons" id="student_button" onclick="#">Students</button>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-xl tab_buttons" id="company_button" onclick="#">Companies</button>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-xl tab_buttons" id="statistics_button" onclick="#">Statistics</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Students -->
    <div id="student" class="section-active">
        <div class="main-section">
            <?php 
                $query = "SELECT s.first_name, s.last_name, s.student_id, b.branch_name, s.email, s.gpa, s.resume_link FROM student s, branch b where s.branch_id = b.branch_id";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $s = $row['student_id'];
                        echo "<div class='company-details'>";
                        echo "<div class='container'>";
                        echo "    <div class='row'>";
                        echo "        <div class='col-lg-8'>";
                        echo "<div class='company-data-row'>"."Student Id : ".$row['student_id']."</div>";
                        echo "<div class='company-data-row'>"."Student Name  : ".$row['first_name']." ".$row['last_name']."</div>";
                        echo "<div class='company-data-row'>"."Branch : ".$row['branch_name']."</div>";
                        echo "</div>";
                        echo "<div class='col-lg-4'>";
                        echo "<div class='company-data-row'>"."Email : ".$row['email']." LPA"."</div>";
                        echo "<div class='company-data-row'>"."GPA : ".$row['gpa']."</div>";
                        echo "<div class='company-data-row'>"."Resume Link : ".$row['resume_link']."</div>";
                        echo "</div>";
                        echo "</div>";
                        $query1 = "SELECT c.company_name from company c, applied_students a where c.company_id = a.company_id and a.student_id = $s";
                        echo "<div class='applied_to'";
                        echo "<div class='row'>Applied to : </div>";
                        $result1 = mysqli_query($db, $query1);
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "<div class='row'>";
                            echo "<div class='col-lg-12' style='font-size: 20px; align-content: center;'>";
                            echo $row['company_name'];      
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='seperator'></div>";
                    }
                }
                else{
                    echo "No Result Found";
                }
            ?>
        </div>
    </div>

    <!-- company -->
    <div id="company" class="section-inactive">
        <div class="main-section">
            <?php 
                $query = "SELECT c.company_id, c.company_name, c.email_id, c.visiting_date, c.dream_regular, j.job_description,j.package_placement from company c, job_desc j where c.company_id = j.company_id";
                $result = mysqli_query($db, $query);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div class='company-details'>";
                        echo "<div class='container'>
                                  <div class='row'>
                                      <div class='col-lg-8'>";
                        echo "<div class='company-data-row'>"."Company Name : ".$row['company_name']."</div>";
                        echo "<div class='company-data-row'>"."Email Id : ".$row['email_id']."</div>";
                        echo "<div class='company-data-row'>"."Job Description : ".$row['job_description']."</div>";
                        echo "</div>";
                        echo "<div class='col-lg-4'>";
                        echo "<div class='company-data-row'>"."Package : ".$row['package_placement']." LPA"."</div>";
                        echo "<div class='company-data-row'>"."Visiting Date : ".$row['visiting_date']."</div>";
                        if($row['dream_regular'] == "0"){
                            echo "<div class='company-data-row'>"."Dream/Regular : "."Regular"."</div>";
                        }
                        else{
                            echo "<div class='company-data-row'>"."Dream/Regular : "."Dream"."</div>";
                        }
                        echo "</div></div></div>";
                        echo "</div>";
                        echo "<div class='seperator'></div>";
                    }
                }
            ?>
        </div>
    </div>

    <!-- Statistics -->
    <div id="statistics" class="section-inactive">
        <div class="main-section">
            <?php 
                echo "<div class='container'>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(*) as count FROM student s";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Total Number of Students Registered for the Process : ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(*) as count FROM company s";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Total Number of Company Registered for the Process : ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT avg(s.gpa) as avg FROM student s";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Average GPA of all the branches : ".round($row['avg'], 2);
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT avg(j.package_placement) as avg from company c, job_desc j where c.company_id = j.company_id;";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Average package offered by the companies: ".round($row['avg'],2)."  lpa";
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(*) as count from company c where c.dream_regular = 1;";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Number of dream companies coming to the campus: ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(*) as count from company c where c.dream_regular = 0;";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Number of regular companies coming to the campus: ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(distinct a.student_id) as count from applied_students a";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Total Number of students who have applied to atleast one company: ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(distinct student_id) as count from applied_students a where a.student_id in (select s.student_id
                                    from applied_students s group by s.student_id having count(*) > 5)";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Total Number of students who have applied to more than 5 companies: ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(distinct student_id) as count from applied_students a where a.student_id in (select s.student_id
                                    from applied_students s group by s.student_id having count(*) > 5)";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Total Number of students who have not applied to any company: ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                    echo "<div class='row company-data-row'>";
                        $query = "SELECT count(*) as count from student s1
                                where s1.student_id not in (
                                SELECT s.student_id from company c, student s, applied_students a where c.company_id = a.company_id
                                and a.student_id = s.student_id group by s.student_id having count(*) = 0
                                );";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "Number of students who have not applied to any company: ".$row['count'];
                        echo "<div class='seperator'></div>";
                    echo "</div>";
                echo "</div>";
                // $query = "SELECT s.first_name, s.last_name, s.student_id, b.branch_name, s.email, s.gpa, s.resume_link FROM student s, branch b where s.branch_id = b.branch_id";
                // $result = mysqli_query($db, $query);
                // if(mysqli_num_rows($result) > 0){
                //     while($row = mysqli_fetch_assoc($result)){
                //         echo "<div class='company-details'>";
                //         echo "<div class='container'>
                //                   <div class='row'>
                //                       <div class='col-lg-8'>";
                //         echo "<div class='company-data-row'>"."Student Id : ".$row['student_id']."</div>";
                //         echo "<div class='company-data-row'>"."Student Name  : ".$row['first_name']." ".$row['last_name']."</div>";
                //         echo "<div class='company-data-row'>"."Branch : ".$row['branch_name']."</div>";
                //         echo "</div>";
                //         echo "<div class='col-lg-4'>";
                //         echo "<div class='company-data-row'>"."Email : ".$row['email']." LPA"."</div>";
                //         echo "<div class='company-data-row'>"."GPA : ".$row['gpa']."</div>";
                //         echo "<div class='company-data-row'>"."Resume Link : ".$row['resume_link']."</div>";
                //         echo "</div></div></div>";
                //         echo "</div>";
                //         echo "<div class='seperator'></div>";
                //     }
                // }
                // else{
                //     echo "No Result Found";
                // }
            ?>
        </div>
    </div>

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

    <!-- Hiding -->
    <script type="text/javascript">
        var btn1 = document.getElementById("student_button"),
            btn2 = document.getElementById("company_button"),
            btn4 = document.getElementById("statistics_button");

        function student(){
            btn1.classList.add("active");
            btn2.classList.remove("active");
            btn4.classList.remove("active");
            document.getElementById("student").classList.add("section-active");
            document.getElementById("student").classList.remove("section-inactive");
            document.getElementById("company").classList.add("section-inactive");
            document.getElementById("company").classList.remove("section-active");
            document.getElementById("statistics").classList.add("section-inactive");
            document.getElementById("statistics").classList.remove("section-active");
        }

        function companies(){
            btn1.classList.remove("active");
            btn2.classList.add("active");
            btn4.classList.remove("active");
            document.getElementById("student").classList.add("section-inactive");
            document.getElementById("student").classList.remove("section-active");
            document.getElementById("company").classList.add("section-active");
            document.getElementById("company").classList.remove("section-inactive");
            document.getElementById("statistics").classList.add("section-inactive");
            document.getElementById("statistics").classList.remove("section-active");
        }

        function statistics(){
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn4.classList.add("active");
            document.getElementById("student").classList.add("section-inactive");
            document.getElementById("student").classList.remove("section-active");
            document.getElementById("company").classList.add("section-inactive");
            document.getElementById("company").classList.remove("section-active");
            document.getElementById("statistics").classList.add("section-active");
            document.getElementById("statistics").classList.remove("section-inactive");
        }

        btn1.onclick = student;
        btn2.onclick = companies;
        btn4.onclick = statistics;
    </script>

</body>

</html>

<?php 
	include("conn.php"); 
	session_start();
	$query = "INSERT INTO job_offered (student_id, company_id) VALUES (".$_POST['cid'].",".$_SESSION['user'].")";
	$data = mysqli_query ($db, $query);

	echo "<div class='main-section'>";
		$company_id_saved = $_SESSION['user'];
		$query = "SELECT s.first_name, s.last_name, s.student_id, b.branch_name, s.email, s.gpa, s.resume_link FROM student s, branch b, 
                        job_offered a where s.branch_id = b.branch_id and a.company_id = $company_id_saved
                        and s.student_id = a.student_id";
	            $result = mysqli_query($db, $query);
		            if(mysqli_num_rows($result) > 0){
		                while($row = mysqli_fetch_assoc($result)){
		                    echo "<div class='company-details'>";
		                    echo "<div class='container'>
		                              <div class='row'>
	                                  <div class='col-lg-8'>";
	                    echo "<div class='company-data-row'>"."Student Id : ".$row['student_id']."</div>";
	                    echo "<div class='company-data-row'>"."Student Name  : ".$row['first_name']." ".$row['last_name']."</div>";
	                    echo "<div class='company-data-row'>"."Branch : ".$row['branch_name']."</div>";
	                    echo "</div>";
	                    echo "<div class='col-lg-4'>";
	                    echo "<div class='company-data-row'>"."Email : ".$row['email']." LPA"."</div>";
	                    echo "<div class='company-data-row'>"."GPA : ".$row['gpa']."</div>";
	                    echo "<div class='company-data-row'>"."Resume Link : ".$row['resume_link']."</div>";
	                    echo "</div></div></div>";
	                    echo "</div>";
	                    echo "<div class='seperator'></div>";
	                }
	            }
	            else{
	                echo "No Result Found";
	            }
 ?>
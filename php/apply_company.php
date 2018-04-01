<?php 
	include("conn.php"); 
	session_start();
	$query = "INSERT INTO applied_students (student_id, company_id) VALUES (".$_SESSION['user'].",".$_POST['cid'].")";
	$data = mysqli_query ($db, $query);
	echo "<div class='main-section'>";
	    $saved_student_id = $_SESSION['user'];
	    $query = "SELECT c.company_name, c.email_id, c.visiting_date, c.dream_regular, j.job_description, j.package_placement from company c, job_desc j, applied_students a where c.company_id = j.company_id and a.student_id = $saved_student_id and a.company_id = c.company_id";
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
                echo "<div class='seperator'></div>";
                echo "</div>";
	        }
	    }
	    else{
	        echo "No Results";
	    }
?>

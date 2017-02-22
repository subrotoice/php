<?php
include("inc/header.php");
include("classes/student.php");

$studentID = trim( filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT) );
// Creating a Student Object
$aStudent = new Student();

//check if more than 0 record found
if( $studentID > 0 ) {
echo "<table class='table table-hover table-responsive table-bordered'>";
  echo $aStudent->get_student_details( $studentID );
echo "</table>";
}

// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>
<a href="allstudents.php" class="btn btn-primary">View All Students List</a>
<?php include('inc/footer.php'); ?>

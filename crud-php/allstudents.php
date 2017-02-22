<?php
include("inc/header.php");
include("classes/student.php");
// Creating a Student Object
$aStudent = new Student();
$allStudents = $aStudent->allStudetnArray();
//var_dump($allStudents);

// this is how to get number of rows returned
$num = count( $allStudents );

// link to create record form
echo "<a href='index.php' class='btn btn-primary studentAdd'>Create New Student</a>";

//check if more than 0 record found
if( $num>0 ) {
    echo "<table class='table table-hover table-responsive table-bordered allstudents'>";//start table

        //creating our table heading
        echo "<tr>";
            echo "<th>Image</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Age</th>";
            echo "<th>Sex</th>";
            echo "<th>Hobby</th>";
            echo "<th>Address</th>";
            echo "<th>Action</th>";
        echo "</tr>";

        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        foreach ($allStudents as $student) {
          echo $aStudent->get_student_html( $student );
        }

    // end table
    echo "</table>";

}

// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}
?>

<?php include('inc/footer.php'); ?>

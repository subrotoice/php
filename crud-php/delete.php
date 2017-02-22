<?php
include("inc/header.php");
include("classes/student.php");

$studentID = trim(filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT));
// Creating a Student Object
$aStudent = new Student();

$aStudent->deleteStudent( $studentID );

header("Location: allstudents.php");

<?php
if($_POST){

    // include database connection
    include 'config/database.php';

    try{
        // insert query
        $query = "UPDATE students SET name=:name, age=:age, sex=:sex, hobby=:hobby, address=:address WHERE id=:id";

        // prepare query for execution
        $stmt = $pdoCon->prepare($query);
        // posted values
        // $name=htmlspecialchars(strip_tags($_POST['name']));
        // $description=htmlspecialchars(strip_tags($_POST['description']));
        // $price=htmlspecialchars(strip_tags($_POST['price']));

        $id = trim(filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT));
        $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
        $age = trim(filter_input(INPUT_POST,"age",FILTER_SANITIZE_NUMBER_INT));
        $sex = trim(filter_input(INPUT_POST,"sex",FILTER_SANITIZE_STRING));
        $hobby = trim(filter_input(INPUT_POST,"hobby",FILTER_SANITIZE_STRING));
        $address = trim(filter_input(INPUT_POST,"address",FILTER_SANITIZE_SPECIAL_CHARS));
        // bind the parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':hobby', $hobby);
        $stmt->bindParam(':address', $address);
        // specify when this record was inserted to the database

        // Execute the query
        if( $stmt->execute() ) {
            $lastInsertId = $pdoCon->lastInsertId();
            echo "<div class='alert alert-success'>Record Updated. <a href=''>View Record</a></div>";
        } else {
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }

    }

    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}

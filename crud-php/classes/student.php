<?php
class Student
{
  private $name;
  private $email;
  private $age;
  private $address;

  public function allStudetnArray()
  {
      include("config/database.php");
      try {
         $sql = "SELECT * FROM students ORDER BY id DESC";
         $result = $pdoCon->prepare($sql);
         $result->execute();
      } catch (Exception $e) {
         echo "Unable to retrieved results";
         exit;
      }
      $catalog = $result->fetchAll();
      return $catalog;
  }

  // Check if there already exist email in DB
  public function checkDuplicateEmail( $email )
  {
      include("config/database.php");
      try {
         $sql = "SELECT email FROM students where email='$email'";
         $result = $pdoCon->prepare($sql);
         $result->execute();
         $rows = $result->rowCount();
      } catch (Exception $e) {
         echo "Unable to retrieved results";
         exit;
      }
      return $rows;
  }

  // Single Student Record in HTML format where providing an array
  function get_student_html( $student ) {
      $output = "<tr><td style='text-align: center;'><img src='uploads/". $student['image'] ."' alt='Profile Img' /></td>"
          . "<td>". $student['name'] ."</td>"
          . "<td>". $student['email'] ."</td>"
          . "<td>". $student['age'] ."</td>"
          . "<td>". $student['sex'] ."</td>"
          . "<td>". $student['hobby'] ."</td>"
          . "<td>". $student['address'] ."</td>"
          . "<td><a href='details.php?id=". $student['id'] ."' class='btn btn-success'>View Details</a> <a href='update.php?id=". $student['id'] ."' class='btn btn-warning'>Update</a> <a href='delete.php?id=". $student['id'] ."' class='btn btn-danger'>Delete</a></td></tr>";
      return $output;
  }

  // Single Student Details in Details page
  function get_student_details( $studentID ) {
    include("config/database.php");
    $output = "";
    try {
       $sql = "SELECT * FROM students WHERE id = ?";
       $result = $pdoCon->prepare($sql);
       $result->bindParam(1, $studentID, PDO::PARAM_INT);
       $result->execute();
    } catch (Exception $e) {
       echo "Unable to retrieved results";
       exit;
    }
    while ($student = $result->fetch(PDO::FETCH_ASSOC)) {
      //var_dump($student);
      $output = "<tr><td style='text-align: center;' colspan='2'><img src='uploads/". $student['image'] ."' class='img-thumbnail' alt='' /></td></tr>"
              . "<tr><td>Email</td><td>". $student['name'] ."</td></tr>"
              . "<tr><td>Email</td><td>". $student['email'] ."</td></tr>"
              . "<tr><td>Age</td><td>". $student['age'] ."</td></tr>"
              . "<tr><td>Sex</td><td>". $student['sex'] ."</td></tr>"
              . "<tr><td>Hobbby</td><td>". $student['hobby'] ."</td></tr>"
              . "<tr><td>Address</td><td>". $student['address'] ."</td></tr>"
              . "<tr><td>Created</td><td>". $student['created'] ."</td></tr>";
    }
    return $output;
  }

  // Delete student recored
  function deleteStudent( $studentID ) {
    include("config/database.php");
    $studentID = trim(filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT));
    if ( $studentID ) {

      try {
        //Get Image file name of delete record
        $sql= "SELECT image FROM students WHERE id=:id";
        $result = $pdoCon->prepare($sql);
        $result->bindParam(':id', $studentID);
        $result->execute();
        $student = $result->fetch(PDO::FETCH_ASSOC);
        $studentImage = $student['image'];
        if (! unlink("uploads/" . $student['image'])) {
          echo "Error deleting $studentImage";
          } else{
          echo "Deleted $studentImage";
          }

        // Delete All Records form database table
         $sql = "DELETE FROM students WHERE id = ?";
         $result = $pdoCon->prepare($sql);
         $result->bindParam(1, $studentID, PDO::PARAM_INT);
         $result->execute();
      } catch (Exception $e) {
         echo "Unable to Delete Data";
         exit;
      }
    } else {
      // nothing
    }
  }
}

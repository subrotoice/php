<?php
include("inc/header.php");
include("classes/student.php");
include('model/update.php');
$studentID = trim( filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT) );
// Creating a Student Object
$aStudent = new Student();

//check if more than 0 record found
if( $studentID > 0 ) {
    include("config/database.php");
    try {
       $sql = "SELECT * FROM students WHERE id = ?";
       $result = $pdoCon->prepare($sql);
       $result->bindParam(1, $studentID, PDO::PARAM_INT);
       $result->execute();
    } catch (Exception $e) {
       echo "Unable to retrieved results";
       exit;
    }
    $student = $result->fetch(PDO::FETCH_ASSOC);
?>

<div class="row">
  <div class="col-md-6">
    <!-- html form here where the product information will be entered -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table class='table table-hover table-responsive table-borderless'>
            <tr>
                <td>Name</td>
                <td><input type='text' name='name' value="<?php echo $student['name'];?>" class='form-control' maxlength="250" required="requried" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type='email' name='email' value="<?php echo $student['email'];?>" class='form-control' required="requried"  disabled/></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type='number' name='age' value="<?php echo $student['age'];?>" class='form-control' /></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td>
                  <select name="sex" class="form-control">
                    <option value="Male" <?php if ( $student['sex'] == "Male") { echo " selected"; } ?>>Male</option>
                    <option value="Female" <?php if ( $student['sex'] == "Female") { echo " selected"; } ?>>Female</option>
                  </select>
                </td>
            </tr>
            <tr>
                <td>Hobby</td>
                <td>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hobby" id="optionsRadios2" <?php if ( $student['hobby'] == "reading") { echo " checked"; } ?> value="reading">
                        Reading
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hobby" id="optionsRadios2" <?php if ( $student['hobby'] == "programming") { echo " checked"; } ?> value="programming">
                        Programming
                    </label>
                  </div>
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name='address' class='form-control'> <?php echo $student['address'];?> </textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Update' class='btn btn-primary pull-right' />
                </td>
            </tr>
            <input type='hidden' name='id' value="<?php echo $student['id'];?>" />
        </table>
    </form>
  </div>
</div>

<?php
}

// if no records found
else{
    header("Location: allstudents.php");
}
?>
<?php include('inc/footer.php'); ?>

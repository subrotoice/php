<?php
include("inc/header.php");

// All Specific code to create new record
include('model/create.php');
?>
      <div class="row">
        <div class="col-md-6">
          <!-- html form here where the product information will be entered -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              <table class='table table-hover table-responsive table-borderless'>
                  <tr>
                      <td>Name</td>
                      <td><input type='text' name='name' class='form-control' maxlength="250" required="requried" /></td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td><input type='email' name='email' class='form-control' required="requried"  /></td>
                  </tr>
                  <tr>
                      <td>Age</td>
                      <td><input type='number' name='age' class='form-control' /></td>
                  </tr>
                  <tr>
                      <td>Sex</td>
                      <td>
                        <select name="sex" class="form-control">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </td>
                  </tr>
                  <tr>
                      <td>Hobby</td>
                      <td>
                        <div class="radio">
                          <label>
                            <input type="radio" name="hobby" id="optionsRadios2" value="reading">
                              Reading
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="hobby" id="optionsRadios2" value="programming">
                              Programming
                          </label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td>Address</td>
                      <td><textarea name='address' class='form-control'></textarea></td>
                  </tr>
                  <tr>
                      <td>Image</td>
                      <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>
                          <input type='submit' value='Add Student' class='btn btn-primary pull-right' />
                      </td>
                  </tr>
              </table>
          </form>
        </div>
      </div>


<?php include('inc/footer.php'); ?>

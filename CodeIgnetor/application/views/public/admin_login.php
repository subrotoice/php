<?php include('public_header.php') ?>
<div class="container">
  <?php if ($error = $this->session->flashdata('login_failed')): ?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?= $error?></strong>
    </div>
  <?php endif; ?>
  <?php echo form_open('login/admin_login', ['class' => 'form-horizontal']); ?>
<fieldset>
    <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <?php echo form_input(['name' => 'userName', 'class' => 'form-control', 'id' => 'inputEmail', 'placeholder' => 'Email', 'value' => set_value('userName')]); ?>
            </div>
          </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('userName'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
              <?php echo form_password(['name' => 'password', 'class' => 'form-control', 'id' => 'inputPassword', 'placeholder' => 'Password']); ?>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Checkbox
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <?php
                echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-default']);
                echo form_submit(['name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-primary']);
              ?>
            </div>
          </div>

      </div>
      <div class="col-lg-6">
        <?php echo form_error('password'); ?>
      </div>
    </div>
</fieldset>
</form>
</div>
<?php include('public_footer.php') ?>

<?php include('admin_header.php') ?>
<div class="container">
  <?php if ($error = $this->session->flashdata('login_failed')): ?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?= $error?></strong>
    </div>
  <?php endif; ?>
  <?php echo form_open("admin/update_article/{$article->id}", ['class'  => 'form-horizontal']); ?>
<fieldset>
    <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
            <label for="title" class="col-lg-4 control-label">Article Title</label>
            <div class="col-lg-8">
              <!-- set_value('title', $article->title) first parameter submit korar por abar call hole dekhy, but second parameter default. Form load holey ase. -->
              <?php echo form_input(['name' => 'title', 'class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title', 'value' => set_value('title', $article->title)]); ?>
            </div>
          </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('title'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
            <label for="body" class="col-lg-4 control-label">Password</label>
            <div class="col-lg-8">
              <?php echo form_textarea(['name' => 'body', 'class' => 'form-control', 'id' => 'body', 'placeholder' => 'Body', 'value' => set_value('body',  $article->body)]); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-8 col-lg-offset-4">
              <?php
                echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-default']);
                echo form_submit(['name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-primary']);
              ?>
            </div>
          </div>

      </div>
      <div class="col-lg-6">
        <?php echo form_error('body'); ?>
      </div>
    </div>
</fieldset>
</form>
</div>
<?php include('admin_footer.php') ?>

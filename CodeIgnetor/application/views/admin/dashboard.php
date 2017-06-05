<?php include_once('admin_header.php') ?>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-6">
      <a href="<?= base_url('admin/add_article')?>" class="btn btn-primary pull-right">Add Article</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <?php if ($feedback = $this->session->flashdata('feedback')):
          $feedback_class = $this->session->flashdata('feedback_class'); ?>
        <div class="alert alert-dismissible <?= $feedback_class?>">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?= $feedback?></strong>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($articles)): ?>
        <?php $i = 1; foreach ($articles as $article): ?>
          <tr>
            <td><?= $i++?></td>
            <td><?= $article->title ?></td>
            <td>
              <!-- single quote will not work here so use double quote -->
              <?= anchor("admin/edit_article/{$article->id}", 'edit', ['class' => 'btn btn-warning'])?>
              <?= form_open('admin/delete_article'),
                  form_hidden('article_id', $article->id),
                  form_submit(['name' => 'submit', 'value' => 'Delete', 'class' => 'btn btn-denger']),
                  form_close();
              ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">
            No Record Found
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php include_once('admin_footer.php') ?>

<div class="container">
  <div class="card card-category mx-auto mt-2">
    <div class="card-header"><strong>Edit Post</strong></div>
    <div class="card-body">
      

      <?= form_open('update-post'); ?>
        <!-- display error message -->
        <?php if ($message = $this->session->userdata('error_message')): ?>
          <div class="form-group">
              <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong><?= $message; $this->session->unset_userdata('error_message') ?>
              </div>
            <?php endif ?>
            <?php if ($message = $this->session->userdata('success_message')): ?>
              <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> <?= $message; $this->session->unset_userdata('success_message') ?>
              </div>
          </div>
        <?php endif ?>
        <?php if ($post): ?>
          <?php foreach ($post as $key => $value): ?>
            <input type="hidden" name="post_id" value="<?= $value->post_id ?>">
            <div class="form-group">
              <label for="post_title">Post Title</label>
              <input class="form-control" id="post_title" name="post_title" type="text"  placeholder="Post Title" value="<?= $value->post_title ?>">
            </div>
            <div class="form-group">
              <label for="editor">Post Description</label>
              <textarea name="post_description" id="editor" class="form-control"  name="post_description" placeholder="Post description"><?= $value->post_description ?></textarea>
            </div>
            <div class="form-group">
                <label for="publication_status">Publication Status(current status: <?= $value->publication_status == 1 ? 'published' : 'unpublished' ?>)</label>
                <select class="form-control" name="publication_status" id="publication_status">
                  <option value="0">unpublished</option>
                  <option value="1">published</option>
                </select>
              </div>
          <?php endforeach ?>
        <?php endif ?>
        
        <?= form_submit(['class'=>'btn btn-primary btn-block','type'=>'submit','value'=>'Update Post']); ?>      
    </div>
  </div>
</div>
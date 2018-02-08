<div class="container">
  <div class="card card-post mx-auto mt-2">
    <div class="card-header"><strong>Add Post</strong></div>
    <div class="card-body">
      

      <?= form_open('save-post'); ?>
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
        <div class="form-group">
            <label for="category_id">Category Name</label>
            <select class="form-control" name="category_id" id="category_id">
              <?php if ($result = $this->Super_Admin_Model->select_all_published_category()): ?>
                <?php foreach ($result as $key => $value): ?>
                  <option value="<?= $value->category_id ?>"><?= $value->category_name ?></option>
                <?php endforeach ?>
              <?php endif ?>
            </select>
        </div>
        <div class="form-group">
          <label for="post_title">Post Title</label>
          <input class="form-control" id="post_title" name="post_title" type="text" aria-describedby="emailHelp" placeholder="Post Title">
        </div>
        <div class="form-group">
          <label for="editor">Post Description</label>
          <textarea name="post_description" id="editor" class="form-control" aria-describedby="catdes" placeholder="Post Description"></textarea>
        </div>
        <div class="form-group">
            <label for="publication_status">Publication Status</label>
            <select class="form-control" name="publication_status" id="publication_status">
              <option value="1">published</option>
              <option value="0">unpublished</option>
            </select>
        </div>
        
        <?= form_submit(['class'=>'btn btn-primary btn-block','type'=>'submit','value'=>'Add Post']); ?>      
    </div>
  </div>
</div>
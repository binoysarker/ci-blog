<div class="container">
  <div class="card card-category mx-auto mt-2">
    <div class="card-header"><strong>Edit Category</strong></div>
    <div class="card-body">
      

      <?= form_open('update-category'); ?>
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
        <?php if ($category): ?>
          <?php foreach ($category as $key => $value): ?>
            <input type="hidden" name="category_id" value="<?= $value->category_id ?>">
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input class="form-control" id="category_name" name="category_name" type="text"  placeholder="Category Name" value="<?= $value->category_name ?>">
            </div>
            <div class="form-group">
              <label for="editor">Category Description</label>
              <textarea name="category_description" id="editor" class="form-control"  name="category_description" placeholder="Category description"><?= $value->category_description ?></textarea>
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
        
        <?= form_submit(['class'=>'btn btn-primary btn-block','type'=>'submit','value'=>'Add Category']); ?>      
    </div>
  </div>
</div>
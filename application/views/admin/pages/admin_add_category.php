<div class="container">
  <div class="card card-category mx-auto mt-2">
    <div class="card-header"><strong>Add Category</strong></div>
    <div class="card-body">
      

      <?= form_open('save-category'); ?>
        <!-- if there is any for validarion error then show this -->
        <?php if (validation_errors()): ?>
          <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong><?= validation_errors(); ?>
          </div>
        <?php endif ?>
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
          <label for="category_name">Category Name</label>
          <input class="form-control" required id="category_name" name="category_name" type="text" aria-describedby="emailHelp" placeholder="Category Name">
        </div>
        <div class="form-group">
          <label for="editor">Category Description</label>
          <textarea name="category_description" id="editor" class="form-control" aria-describedby="catdes" required name="category_description" placeholder="Category description"></textarea>
        </div>
        <div class="form-group">
            <label for="publication_status">Publication Status</label>
            <select class="form-control" required name="publication_status" id="publication_status">
              <option value="1">published</option>
              <option value="0">unpublished</option>
            </select>
          </div>
        <?= form_submit(['class'=>'btn btn-primary btn-block','type'=>'submit','value'=>'Add Category']); ?>      
    </div>
  </div>
</div>
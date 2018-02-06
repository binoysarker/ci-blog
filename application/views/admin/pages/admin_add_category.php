<div class="container">
  <div class="card card-category mx-auto mt-2">
    <div class="card-header"><strong>Add Category</strong></div>
    <div class="card-body">
      

      <?= form_open('/save-category'); ?>
        <div class="form-group">
          <label for="category_name">Category Name</label>
          <input class="form-control" id="category_name" name="category_name" type="text" aria-describedby="emailHelp" placeholder="Category Name">
        </div>
        <div class="form-group">
          <label for="editor">Category Description</label>
          <textarea name="category_description" id="editor" class="form-control" aria-describedby="catdes" name="category_description" placeholder="Category description"></textarea>
        </div>
        <div class="form-group">
            <label for="publication_status">Publication Status</label>
            <select class="form-control" name="publication_status" id="publication_status">
              <option value="1">published</option>
              <option value="0">unpublished</option>
            </select>
          </div>
        <?= form_submit(['class'=>'btn btn-primary btn-block','type'=>'submit','value'=>'Add Category']); ?>      
    </div>
  </div>
</div>
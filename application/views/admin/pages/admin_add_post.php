<div class="container">
  <div class="card card-post mx-auto mt-2">
    <div class="card-header"><strong>Add Post</strong></div>
    <div class="card-body">
      <?= form_open('/save-post'); ?>
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
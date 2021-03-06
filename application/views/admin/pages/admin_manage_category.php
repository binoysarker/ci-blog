<!-- confirmation for delete using javascript -->
<script type="text/javascript">
  function checkDelete() {
    var check = confirm('do you want to delete.It will be permanently delted ?');
    if (check) {
      return true;
    }
    else{
      return false;
    }
  }
  function checkStatus() {
    var check = confirm('do you want to change status?');
    if (check) {
      return true;
    }
    else{
      return false;
    }
  }
</script>
<div class="container">
  <div class="row">
    <div class="col-lg-8 offset-lg-2 mx-auto">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i> Manage Category</div>
          <div class="card-body">
            <div class="table-responsive">
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
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php if ($all_category): ?>
                    <?php foreach ($all_category as $key => $value): ?>
                      <tr>
                        <td><?= $value->category_name ?></td>
                        <td><?= substr($value->category_description,0,50) ?></td>
                        <td><?= $value->publication_status == 1 ? 'Published' : 'UnPublished'  ?></td>
                        <td>
                          <?php if ($value->publication_status == 1): ?>
                            <a href="<?= base_url('unpublish-status/'.$value->category_id) ?>" class="btn btn-danger btn-sm" onclick="return checkStatus();">inactive</a>
                          <?php endif ?>
                          <?php if ($value->publication_status == 0): ?>
                            <a href="<?= base_url('publish-status/'.$value->category_id) ?>" class="btn btn-primary btn-sm" onclick="return checkStatus();">active</a>
                          <?php endif ?>
                          <a href="<?= base_url('edit-category/'.$value->category_id) ?>" class="btn btn-info btn-sm">edit</a>
                          <a href="<?= base_url('delete-category/'.$value->category_id) ?>" class="btn btn-danger btn-sm" onclick="return checkDelete();">delete</a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</div>

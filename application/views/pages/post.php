<!-- Page Header -->
    <header class="masthead" style="background-image: url('front_end/img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>Man must explore, and this is exploration at its greatest</h1>
              <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
              <span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on August 24, 2018</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            
            <?php if ($get_specific_post): ?>
              <?php foreach ($get_specific_post as $key => $value): ?>
                <h2 class="section-heading"><?= $value->post_title ?></h2>
                
                <?php 
                $data = $value->post_image;    
                $image_path = substr($data, strpos($data, "/admin_asset") + 1);    
                echo $image_path;
                 ?>

                <img src="<?= base_url(''.$image_path) ?>" class="img-thumbnail" alt="">
                <p><?= $value->post_description ?></p>
                <?php foreach ($category as $key => $value): ?>
                  <p>Category:
                    <a href="http://spaceipsum.com/"><?= $value->category_name ?></a>. Author name: <?= $this->session->userdata('admin_name'); ?>
                  </p>  
                <?php endforeach ?>
              <?php endforeach ?>
            <?php else: ?>
              <p>Category:
                <a href="#">Un Categorised</a>. Author name: No Author; ?>
              </p>  
            <?php endif ?>
            
          </div>
        </div>
        <!-- comment section  -->
        <div >
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <!-- show comment section -->
                <?php if ($comments): ?>
                  <?php foreach ($comments as $key => $value): ?>
                    <div class="alert alert-success col-12" id='showComment' role="alert">
                      Comment: <?= $value->comment_body ?> 
                      <?php $comment_id = $value->comment_id ?>
                    </div>
                    <!-- show all reply for specific comment -->
                    <?php if ($get_reply_by_comment = $this->Super_Admin_Model->get_reply_by_comment($comment_id)): ?>
                      <?php foreach ($get_reply_by_comment as $key => $value): ?>
                        <div class="alert alert-info col-10 offset-2" id="showReply" role="alert">
                          Reply: <?= $value->reply_body ?>
                        </div>
                      <?php endforeach ?>
                    <?php endif ?>
                    <!-- reply form  section -->
                      <?= form_open('/add-reply',['id'=>'form-reply','method'=>'post']); ?>
                        <?php if ($get_specific_post): ?>
                          <?php foreach ($get_specific_post as $key => $value): ?>
                            <input type="hidden" name="post_id" value="<?= $value->post_id ?>">
                          <?php endforeach ?>
                        <?php endif ?>
                        <?php if ($category): ?>
                          <?php foreach ($category as $key => $value): ?>
                            <input type="hidden" name="category_id" value="<?= $value->category_id ?>">
                          <?php endforeach ?>
                        <?php endif ?>
                        <!-- comment id input field -->
                          <input type="hidden" name="comment_id" value="<?= $comment_id ?>">
                        <div class="form-group">
                          <label style="display: none;" for="reply_body">Reply</label>
                          <input type="text" class="form-control" name="reply_body" id="reply_body" placeholder="Enter your reply">
                        </div>
                        <div class="form-group">
                          <input type="submit" style="display: none;" class="btn btn-primary float-right" name="submit"  value="Reply">
                        </div>
                      <?= form_close(); ?>
                  <?php endforeach ?>

                <?php endif ?>

                

                <!-- comment form sectioin -->
                <?= form_open('/add-comment',['id'=>'form-comment','method'=>'post']); ?>
                  <?php if ($get_specific_post): ?>
                    <?php foreach ($get_specific_post as $key => $value): ?>
                      <input type="hidden" name="post_id" value="<?= $value->post_id ?>">
                    <?php endforeach ?>
                  <?php endif ?>
                  <?php if ($category): ?>
                    <?php foreach ($category as $key => $value): ?>
                      <input type="hidden" name="category_id" value="<?= $value->category_id ?>">
                    <?php endforeach ?>
                  <?php endif ?>
                  <div class="form-group">
                    <label for="comment_body">Comment</label>
                    <input type="text" name="comment_body" class="form-control" id="comment_body" placeholder="Enter your Comment">
                  </div>
                  <div>
                    <input type="submit" class="btn btn-success float-right"  name="submit" value="Comment">
                  </div>
                <?= form_close(); ?>
                  
            </div>
          </div>
        </div>
      </div>
    </article>

    <hr>

    <script type="text/javascript" src="<?= base_url('front_end/js/myCustomcode.js') ?>"></script>
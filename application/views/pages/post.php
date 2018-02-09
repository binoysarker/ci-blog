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
        <!-- comment section using vue js -->
        <div id="app">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <!-- show comment section -->
                <div class="alert alert-success col-12 " role="alert">
                  Comment: {{comment}}
                </div>
                <!-- show reply section -->
                <div class="alert alert-info col-10 offset-2" role="alert">
                  Reply: {{reply}}
                </div>
                <!-- comment form sectioin -->
                <form action="<?= base_url('/add-comment') ?>" method="get" accept-charset="utf-8">
                  <fieldset class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" v-model='comment' class="form-control" id="comment" placeholder="Enter your Comment">
                  </fieldset>
                  <?php $url = base_url() ?>
                  <fieldset>
                    <input type="submit" class="btn btn-success float-right" @click.prevent="getComment()" name="comment" value="Comment">
                  </fieldset>
                </form>
                  <!-- show reply button -->
                  <button type="button" class="btn btn-info float-right" v-show='showbtn' @click='showForm()'>Reply</button>
                <!-- reply section -->
                <transition name='slide-fade'>
                  <form action="<?= base_url('/add-reply') ?>" v-if='show' method="post" accept-charset="utf-8">
                    <fieldset class="form-group">
                      <label for="replay">Reply</label>
                      <input type="text" class="form-control" v-model='reply' id="replay" placeholder="Enter your reply">
                    </fieldset>
                    <fieldset class="form-group">
                      <input type="submit" class="btn btn-primary float-right" name="reply" @click.prevent='getReply()' value="Reply">
                    </fieldset>
                  </form>
                </transition>  
                
            </div>
          </div>
        </div>
      </div>
    </article>

    <hr>

    <script type="text/javascript" src="<?= base_url('front_end/js/myCustomcode.js') ?>"></script>
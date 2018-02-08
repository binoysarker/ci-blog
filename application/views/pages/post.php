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
            <?php endif ?>
            
          </div>
        </div>
      </div>
    </article>

    <hr>
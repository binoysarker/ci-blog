<!-- Page Header -->
<header class="masthead" style="background-image: url('front_end/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Clean Blog</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 ">
        <!-- now display all the available categoris here -->
        <aside>
        <ul class="list-group">
          <?php if ($published_category): ?>
            <?php foreach ($published_category as $key => $value): ?>
              <a href="#" class="list-group-item justify-content-between">
                <?= $value->category_name ?>
                <?php if ($post = $this->Super_Admin_Model->post_by_category($value->category_id)): ?>
                    <span class="badge badge-default badge-pill float-right">posts: <?= count($post) ?></span>
                <?php endif ?>
              </a>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
        </aside>
    </div>
    <div class="col-lg-6 col-md-10 ">
      <!-- now lets start to load the posts in the home page -->
    <?php if ($published_post): ?>
      <?php foreach ($published_post as $key => $value): ?>
        
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              <?= $value->post_title ?>
            </h2>
            <h3 class="post-subtitle">
              <?= substr($value->post_description,0,200) ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2018</p>
        </div>
        <hr>

      <?php endforeach ?>
    <?php endif ?>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>

  </div>
</div>
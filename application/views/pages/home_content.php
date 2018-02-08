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
          <?php if ($result): ?>
            <?php foreach ($result as $key => $value): ?>
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

      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            Man must explore, and this is exploration at its greatest
          </h2>
          <h3 class="post-subtitle">
            Problems look mighty small from 150 miles up
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Start Bootstrap</a>
          on September 24, 2018</p>
      </div>
      <hr>
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
          </h2>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Start Bootstrap</a>
          on September 18, 2018</p>
      </div>
      <hr>
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            Science has not yet mastered prophecy
          </h2>
          <h3 class="post-subtitle">
            We predict too much for the next year and yet far too little for the next ten.
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Start Bootstrap</a>
          on August 24, 2018</p>
      </div>
      <hr>
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            Failure is not an option
          </h2>
          <h3 class="post-subtitle">
            Many say exploration is part of our destiny, but it’s actually our duty to future generations.
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Start Bootstrap</a>
          on July 8, 2018</p>
      </div>
      <hr>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>

  </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
    <h1><?php the_title(  ) ?></h1>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <div class="work-inner">
          <img src="<?php the_post_thumbnail_url() ?>"> </div>
        <?php the_content() ?>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <?php get_sidebar('single-blog'); ?>
  </div>
</div>
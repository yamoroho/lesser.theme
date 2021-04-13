<?php get_header(); ?>
ARCHIVE
<div id="fh5co-blog-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><?php the_title() ?></h2>
				</div>
			</div>
			<div class="row blog-posts-section">
        <?php		
          global $post;

          $query = new WP_Query( [
            'orderby'        => 'comment_count',
            'post_type' => 'blog',
          ] );

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              ?>
              <div class="col-md-4 text-center">
                <div class="blog-inner">
                  <a href="single.html"><img class="img-responsive" src="<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>" alt="Blog"></a>
                  <div class="desc">
                    <h3><a href="single.html"><?php the_title() ?></a></h3>
                    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 230, '...') ?></p>
                    <p><a href="<?php the_permalink() ?>" class="btn btn-primary btn-outline with-arrow">Read More<i class="icon-arrow-right"></i></a></p>
                  </div>
                </div>
              </div>
              <?php 
            }
          } else {
            // Постов не найдено
          }

          wp_reset_postdata(); // Сбрасываем $post
        ?>

				

			</div>

			</div>
		</div>
<?php get_footer(); ?>
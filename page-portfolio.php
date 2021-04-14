<?php
/*
Template Name: Страница портфолио
*/
?>

<?php get_header(); ?>
<div id="fh5co-work-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><?php the_title() ?></h2>
				</div>
			</div>
			<div class="row">
        <?php		
          global $post;

          $query = new WP_Query( [
            'orderby'        => 'comment_count',
          ] );

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              ?>
              <div class="col-md-4 text-center">
                <div class="work-inner">
                  <a href="<?php the_permalink() ?>" class="work-grid" style="background-image: url(<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>);"></a>
                  <div class="desc">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
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
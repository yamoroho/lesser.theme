<?php get_header(); ?>
<div id="fh5co-blog-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>
          <?php
          if( ! empty(single_term_title( '', false )) ){
            single_term_title();
          }
          if( empty(single_term_title('', false)) ){
            echo 'Блог';
            ?>
            <script>
              $('#menu-item-20').addClass('current-menu-item');
            </script>
            <?php
          }
          ?>
          </h2>
				</div>
			</div>
			<div class="row blog-posts-section">
      <?php while ( have_posts() ){ the_post(); ?>
            <div class="col-md-4 text-center">
                <div class="blog-inner">
                  <a href="<?php the_permalink() ?>"><img class="img-responsive" src="<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>" alt="Blog"></a>
                  <div class="desc">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 230, '...') ?></p>
                    <p><a href="<?php the_permalink() ?>" class="btn btn-primary btn-outline with-arrow">Read More<i class="icon-arrow-right"></i></a></p>
                  </div>
                </div>
              </div>
          <?php } ?>
          <?php if ( ! have_posts() ){ ?>
            Записей нет.
          <?php } ?>
          
        

				

			</div>

			</div>
		</div>
<?php get_footer(); ?>
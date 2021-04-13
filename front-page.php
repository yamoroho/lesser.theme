<?php get_header(); ?>
<div id="fh5co-intro-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h1><?php the_title() ?></h1>
          </div>
        </div>
      </div>
    </div>
    <div id="fh5co-featured-section">
      <div class="container">
        <div class="row">
        <?php		
        global $post;
        
        $query = new WP_Query( [
          'posts_per_page' => 4,
        ] );

        if ( $query->have_posts() ) {
          // создаем переменную-счетчик постов
          $cnt = 0;
          // пока посты есть, выводим их
          while ( $query->have_posts() ) {          
            $query->the_post();
            // увеличиваем счетчик постов
            $cnt++;
            switch ($cnt) {
              // выводим первый пост
              case '1':
                ?> 
                  <div class="col-md-6">
                    <a href="<?php the_permalink() ?>" class="featured-grid" style="background-image: url(<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>);">
                      <div class="desc">
                        <h3><?php the_title() ?></h3>
                        <span><?$category = get_the_category(); echo $category[0]->name;?></span>
                      </div>
                    </a>
                  </div>
                <?php
                break;



              // Выводим второй пост  
              case '2': 
                ?>
                <div class="col-md-6">
                  <a href="<?php the_permalink() ?>" class="featured-grid featured-grid-2" style="background-image: url(<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>);">
                    <div class="desc">
                      <h3><?php the_title() ?></h3>
                      <span><?$category = get_the_category(); echo $category[0]->name;?></span>
                    </div>
                  </a>
                <?php

                break;

              case '3': 
                ?>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?php the_permalink() ?>" class="featured-grid featured-grid-2" style="background-image: url(<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>);">
                      <div class="desc">
                        <h3><?php the_title() ?></h3>
                        <span><?$category = get_the_category(); echo $category[0]->name;?></span>
                      </div>
                    </a>
                  </div>
                <?php

                break;


              
              // выводим остальные посты
              default: ?>
                <div class="col-md-6">
                  <a href="<?php the_permalink() ?>" class="featured-grid featured-grid-2" style="background-image: url(<?php 
                    if( has_post_thumbnail() ) {
                      the_post_thumbnail_url();
                    }
                    else {
                      echo get_template_directory_uri() . '/assets/images/image-default.png';
                    }
                    ?>);">
                    <div class="desc">
                      <h3><?php the_title() ?></h3>
                      <span><?$category = get_the_category(); echo $category[0]->name;?></span>
                    </div>
                  </a>
                </div>
                </div></div>
                <?php
                break;
            }
            ?>
            <!-- Вывода постов, функции цикла: the_title() и т.д. -->
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
    
    <div id="fh5co-services-section">
      <div class="container">
        <?php the_content() ?>
      </div>
    </div>
    <div id="fh5co-blog-section" class="fh5co-grey-bg-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <h2>Блог</h2>
          </div>
        </div>
        <div class="row">
          <?php		
            global $post;

            $query = new WP_Query( [
              'posts_per_page' => 3,
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
                        <p><a href="<?php the_permalink() ?>" class="btn btn-primary btn-outline with-arrow">Read More<i
                              class="icon-arrow-right"></i></a></p>
                      </div>
                    </div>
                  </div>
                <?php 
              }
            } else {

            }

            wp_reset_postdata(); // Сбрасываем $post
          ?>
          
        </div>
      </div>
    </div>
    <div id="fh5co-client-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <h2>Отзывы</h2>
            <p><?php echo the_field('reviews_description', 7)?></p>
          </div>
        </div>
        <div class="row">
          <?php		
            global $post;

            $query = new WP_Query( [
              'posts_per_page' => 2,
              'post_type' => 'reviews',
            ] );

            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <div class="col-md-6 text-center">
                  <div class="testimony">
                    <span class="quote"><i class="icon-quote-right"></i></span>
                    <blockquote>
                      <p><?php the_content() ?></p>
                      <span><?php the_title() ?></span>
                    </blockquote>
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
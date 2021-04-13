<?php get_header(); ?>
  <div id="fh5co-single-section">
    <div class="container">
  <?php
    // запускаем цикл Wordpress, проверяем есть ли посты
		while ( have_posts() ) :
      // если пост есть, выводим содержимое
			the_post();

      // находим шаблон для вывода поста в шапке template_parts
			get_template_part( 'template-parts/content', get_post_type() );
			


		  endwhile; // Конец цыкла Wordpress.
		?>
    
    </div>
	</div>
<?php get_footer(); ?>
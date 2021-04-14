<?php
/*
Template Name: Страница контакты
*/
?>

<?php get_header(); ?>
<div id="fh5co-contact-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
        <h2>Contact</h2>
        <p><span>Created with <i class="sl-icon-heart"></i> by the fine folks at <a
              href="http://freehtml5.co">FreeHTML5.co</a></span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <h3>Contact Info.</h3>
        <ul class="contact-info">
          <li><i class="sl-icon-map"></i><?php the_field('address') ?> </li>
          <li><i class="sl-icon-phone"></i><?php the_field('phone'); ?></li>
          <li><i class="sl-icon-envelope-open"></i><a href="<?php the_field('email'); ?>"><?php the_field('email'); ?></a></li>
          <li><i class="sl-icon-globe-alt"></i><a href="<?php the_field('link'); ?>"><?php the_field('link'); ?></a></li>
        </ul>
      </div>
      <div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
        <?php the_content() ?>
        
      </div>
      
    </div>
  </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82744.55860802854!2d34.48719877350548!3d49.60213457637038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d825e425e6ba6b%3A0xcf3e6bdfb9e4ca82!2z0J_QvtC70YLQsNCy0LAsINCf0L7Qu9GC0LDQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCAzNjAwMA!5e0!3m2!1suk!2sua!4v1618324562392!5m2!1suk!2sua" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<?php get_footer(); ?>
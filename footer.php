<footer id="fh5co-footer" role="contentinfo">

<div class="container">
  <div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
    <h3>О нас</h3>
    <p><?php the_field('footer_about', '12') ?></p>
  </div>
  <div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
    
    <?php dynamic_sidebar('sidebar-footer-category') ?>

  </div>

  <div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
    <?php dynamic_sidebar('sidebar-footer-links') ?>
  </div>


  <div class="col-md-12 fh5co-copyright text-center">
    <p>&copy; <?php echo date("Y"); ?> Все права защищены. <span><?php the_field('footer_bottom_text', 7) ?></span></p>
  </div>

</div>
</footer>
  <?php wp_footer() ?>
  </body>
</html>
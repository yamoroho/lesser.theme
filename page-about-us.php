<?php
/*
Template Name: Страница О нас
*/
?>

<?php get_header(); ?>
<div id="fh5co-about-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><?the_title()?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="about-inner">
                <img class="img-responsive" src="<?php the_post_thumbnail_url() ?>" alt="About">
                <?php the_content(  ) ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<aside class="sidebar">
						<div class="row">
							<div class="col-md-12 side">
								<h3>Paragraph</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>

						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
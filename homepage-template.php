<?php
/**
 * HomePage Template
 *
 * Template Name: Happy Property Homepage
*/

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

				<section class="hero">

					<div class="hero-photo">
						<?php
							$image = get_field('bg-img');
							$size = 'full';
							if( $image ) {
								echo wp_get_attachment_image( $image, $size, "", array( "class" => "hero-img-top" ) );
							}
						?>
						<div class="overlay"></div>
					</div>
					<div class="hero-text container">
						<h1 class="hero-title"> <?php the_field('title') ?> </h1>
					</div>
					
				</section>

				<section class="filters-sec my-5">
					<div class="filters container">
						<?php //echo do_shortcode( '[estate_ajax_filter_search]' ) ?>
						<?php dynamic_sidebar( 'filters-widget-area' ); ?>
					</div>
				</section>

				<section class="recommended my-5">
					<h2 class="text-center container mb-4">Рекоммендуем</h2>
					<div class="estate-listings-row container">
						<div class="row row-cols-1 row-cols-md-3">
							<?php 
								$estates = get_posts([
									'post_type' => 'estate',
									'numberposts' => 3,
								]);
								foreach($estates as $estate) {
									?>
										<div class="col pb-4">
											<article class="card">
												<?php
													$image = get_field('photo', $estate);
													$size = 'large';
													if( $image ) {
														echo wp_get_attachment_image( $image, $size, "", array( "class" => "card-img-top" ) );
													}
												?>
												<div class="card-body">
													<h5 class="card-title "> <?php echo get_the_title( $estate ) ?> </h5>
													<div class="row border-top mb-2">
														<div class="col-6 border-right border-bottom py-2">
															<p class="small mb-0">Площадь </p> 
															<?php echo get_field('room', $estate)['area'] . ' м2'?> 
														</div>
														<div class="col-6 py-2 border-bottom">
															<p class="small mb-0">Комнат </p> 
															<?php echo get_field('room', $estate)['rooms']?> 
														</div>
														<div class="col-6 border-right py-2">
															<p class="small mb-0">Этажей </p> 
															<?php the_field('stores-count', $estate)?> 
														</div>
														<div class="col-6 py-2">
															<p class="small mb-0">Тип дома </p> 
															<?php the_field('building-type', $estate)?> 
														</div>
														<div class="col-12 border-top py-2"> <?php the_field('coordinates', $estate)?></div>
													</div>
													<a href="<?php echo get_post_permalink($estate)?> " class="btn btn-primary">Подробнее</a>
												</div>
											</article>
										</div>
									<?php
								}
							?>
						</div>
					</div>
				</section>
				<hr>
				<section class="blog-section my-5">
				<h2 class="text-center container mb-4">Последнее из блога</h2>
					<div class="estate-listings-row container">
						<div class="row row-cols-1 row-cols-md-3">
							<?php 
								$posts = get_posts([
									'post_type' => 'post',
									'numberposts' => 3,
								]);
								foreach($posts as $post) {
									?>
										<div class="col pb-4">
											<article class="card">
												<?php echo get_the_post_thumbnail( $post, 'large' ); ?>
												<div class="card-body">
													<h5 class="card-title "> <?php echo get_the_title( $post ) ?> </h5>
													<p class="card-text"> <?php echo get_the_excerpt( $post ) ?> </p>
												</div>
											</article>
										</div>
									<?php
								}
							?>
						</div>
					</div>
				</section>

				<?php the_content(); ?>

			
			<?php endwhile;
		?>

	</main>

<?php get_footer();
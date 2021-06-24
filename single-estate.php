<?php
/**
 * The template for displaying single real estate objects
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div id="content" tabindex="-1">

		<div class="w-100">

			<main class="site-main w-100" id="main">

				<?php
				while ( have_posts() ) {
					the_post();?>
					
					<div class="entry-header">
						<div class="entry-photo">
							<?php
								$image = get_field('photo');
								$size = 'full';
								if( $image ) {
									echo wp_get_attachment_image( $image, $size, "", array( "class" => "property-img-top" ) );
								}
							?>
							<div class="overlay"></div>
						</div>
						<div class="entry-text <?php echo esc_attr( $container ); ?>">
							<h1 class="property-title"> <?php the_title() ?> </h1>
							
							<p> <i class="fa fa-map-marker"></i> <?php the_field('coordinates')?></p>
						</div>
					</div>

					<div class="entry-body <?php echo esc_attr( $container ); ?>">
							<div class="row row-cols-1 row-cols-md-2">
								<div class="col">
									<ul class="list-group properties d-flex flex-column mb-4">
										<li class="d-flex justify-content-between list-group-item">
											<h5 class="mb-0">О жилом комплексе</h5>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p>Название дома</p>
											<p><?php the_field('home-name')?></p>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p>Количество этажей</p>
											<p><?php the_field('stores-count')?></p>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p>Тип строения</p>
											<p><?php the_field('building-type')?></p>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p>Экологичность</p>
											<p><?php the_field('ecology')?></p>
										</li>
									</ul>
									<ul class="list-group properties d-flex flex-column">
										<li class="d-flex justify-content-between list-group-item">
											<h5 class="mb-0">О квартире</h5>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p class="mb-0">Площадь </p> 
											<?php echo get_field('room')['area'] . ' м2'?>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p class="mb-0">Комнат </p> 
											<?php echo get_field('room')['rooms']?>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p class="mb-0">Балкон </p> 
											<?php echo get_field('room')['balcony']?>
										</li>
										<li class="d-flex justify-content-between list-group-item">
											<p class="mb-0">Санузел </p> 
											<?php echo get_field('room')['bathroom']?>
										</li>
									</ul>
								</div>
								<div class="col room">
									<?php
										$image = get_field('room')['room-photo'];
										$size = 'full';
										if( $image ) {
											echo wp_get_attachment_image( $image, $size, "", array( "class" => "room-img" ) );
										}
									?>
								</div>
							</div>
					</div>


					<?php
					//understrap_post_nav();
				}
				?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();

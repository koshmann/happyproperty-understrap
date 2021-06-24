<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) { ?>
					
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div class="estate-listings-row">
						<div class="row row-cols-1 row-cols-md-2">					
							<?php
							// Start the loop.
							while ( have_posts() ) {
								the_post(); ?>

								<div class="col pb-4">
									<article class="card">
										<?php
											$image = get_field('photo');
											$size = 'large';
											if( $image ) {
												echo wp_get_attachment_image( $image, $size, "", array( "class" => "card-img-top" ) );
											}
										?>
										<div class="card-body">
											<h5 class="card-title "> <?php the_title() ?> </h5>
											<div class="row border-top mb-2">
												<div class="col-6 border-right border-bottom py-2">
													<p class="small mb-0">Площадь </p> 
													<?php echo get_field('room')['area'] . ' м2'?> 
												</div>
												<div class="col-6 py-2 border-bottom">
													<p class="small mb-0">Комнат </p> 
													<?php echo get_field('room')['rooms']?> 
												</div>
												<div class="col-6 border-right py-2">
													<p class="small mb-0">Этажей </p> 
													<?php the_field('stores-count')?> 
												</div>
												<div class="col-6 py-2">
													<p class="small mb-0">Тип дома </p> 
													<?php the_field('building-type')?> 
												</div>
												<div class="col-12 border-top py-2"> <?php the_field('coordinates')?></div>
											</div>
											<a href="<?php the_permalink()?> " class="btn btn-primary">Подробнее</a>
										</div>
									</article>
								</div>

							<?php } ?>
						</div>
					</div>
				<?php
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<?php
			// Display the pagination component.
			understrap_pagination();
			// Do the right sidebar check.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();

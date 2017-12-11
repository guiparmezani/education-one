<?php
/**
 * Template Name: Template Philosofy
 *
 * @package educationone
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php if (have_rows('callouts')): ?>
			<div class="container">
				<div class="page-section callouts-wrapper">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="callouts">
						<p class="section-title"><?php the_field('callouts_title'); ?></p>
						<div class="row">
							<?php while(have_rows('callouts')): the_row(); ?>
								<div class="col-sm-4">
									<div class="callout">
										<?php echo wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
										<p><?php the_sub_field('caption'); ?></p>
									</div>
								</div>
							<?php endwhile ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		<div class="aproach-wrapper">
			<div class="container">
				<div class="page-section approach">
					<div class="approach-content col-md-7">
						<h1><?php the_field('approach_title'); ?></h1>
						<p class="subtitle"><?php the_field('approach_subtitle'); ?></p>
						<div class="bubbles">
							<?php while(have_rows('bubbles')): the_row(); ?>
								<div class="bubble-text">
									<p><?php the_sub_field('copy'); ?></p>
								</div>
							<?php endwhile ?>
						</div>
						<p><?php the_field('body_copy'); ?></p>
					</div>
				</div>
			</div>
			
		</div>

	<div class="container">
		<div class="form-area page-section">
			<?php get_template_part('loop-templates/eo-form'); ?>
		</div>
	</div>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
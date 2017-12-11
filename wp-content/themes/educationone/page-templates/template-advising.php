<?php
/**
 * Template Name: Template Advising
 *
 * @package educationone
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="hero-section page-section">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<h2 class="text-center"><strong><?php the_field('subheading'); ?></strong></h2>
			<p class="text-center"><?php the_field('subtitle'); ?></p>

			<div class="timeline-wrapper">
				<div class="timeline-numbers">
					<div class="row">
						<?php for ($i=1; $i < 13; $i++) : ?>
							<div class="col-sm-1">
								<span><?php echo $i; ?></span>
								<?php while(have_rows('bubbles')): the_row(); ?>
									<?php if ($i == get_sub_field('position')): ?>
										<div class="timeline-item <?php the_sub_field('direction'); ?>">
											<span><?php the_sub_field('copy'); ?></span>
										</div>
									<?php endif ?>
								<?php endwhile ?>
							</div>
						<?php endfor ?>
					</div>
					<div class="timeline"></div>
				</div>

				
			</div>
			<h2 class="text-center hero-bottom-copy"><?php the_field('hero_bottom_copy'); ?></h2>
		</div>

		<?php if (have_rows('callouts')): ?>
			<div class="page-section callouts-wrapper">
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
		<?php endif ?>
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
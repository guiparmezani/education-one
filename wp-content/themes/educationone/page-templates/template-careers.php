<?php
/**
 * Template Name: Template Careers
 *
 * @package educationone
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="hero-section page-section parallax-bg" style="background-image: linear-gradient(rgba(0,0,0,.36), rgba(0,0,0,.36)), url(<?php echo wp_get_attachment_image_src(get_field('hero_image'), 'full')[0]; ?>);">
			<div class="hero-content">
				<?php echo get_post_field('post_content', $post->ID); ?>
			</div>
		</div>

		<div class="opportunities-section page-section">
			<h1>Open Opportunities</h1>
			<?php if (have_rows('opportunities')): ?>
				<div class="opportunities-wrapper">
					<div class="row">
						<?php while(have_rows('opportunities')): the_row(); ?>
							<div class="col-lg-4">
								<div class="opportunity-item">
									<h4><?php the_sub_field('heading'); ?></h4>
									<h5><?php the_sub_field('subheading'); ?></h5>
									<p><?php the_sub_field('copy'); ?></p>
								</div>
							</div>
						<?php endwhile ?>
					</div>
				</div>
			<?php endif ?>
		</div>

		<div class="form-area">
			<div class="container">
				<div class="row">
					<div class="eo-form-wrapper">
						<div class="row">
							<div class="col-md-6" style="background-image: url(<?php echo bloginfo('template_url'); ?>/img/kids-bg-2.jpg);">
								<?php if (get_field('title', get_the_ID())): ?>
									<div class="form-copy">
										<h1><?php the_field('title', get_the_ID()); ?></h1>
										<p><?php the_field('copy', get_the_ID()); ?></p>
									</div>
								<?php endif ?>
							</div>
							<div class="col-md-6">
								<div class="form-wrapper">
									<?php gravity_form(2, false, true, false, '', true, 12); ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php get_template_part('loop-templates/locations'); ?>
	</div>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>



<?php get_footer(); ?>
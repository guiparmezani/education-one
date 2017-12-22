<?php
/**
 * Template Name: Template Personal Tutoring
 *
 * @package educationone
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="personal-tutoring-wrapper">

		<div class="container">
			<div class="hero-section page-section">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="hero-content">
					<h2><?php the_field('hero_subtitle'); ?></h2>
					<p><?php the_field('hero_copy'); ?></p>
					<a href="/locations-contact/" class="btn btn-orange">Get Started with Personalized Subject Tutoring Today!</a>
				</div>
				
				<?php if (have_rows('topics')): ?>
					<div class="topics">
						<div class="row">
							<?php $i=0; while(have_rows('topics')): the_row(); ?>
								<?php if ($i==5): $i=0; ?>
									</div>
									<div class="row">
								<?php endif ?>
								<div class="col-md-15">
									<div class="topic-item" style="background-image: url(<?php echo wp_get_attachment_image_src(get_sub_field('image'))[0]; ?>);">
										<div class="topic-title">
											<span><?php the_sub_field('title'); ?></span>
										</div>
									</div>
								</div>
							<?php $i++; endwhile ?>
						</div>
					</div>
				<?php endif ?>
			</div>

			<?php if (have_rows('callouts')): ?>
				<div class="page-section callouts-wrapper">
					<div class="callouts">
						<h1 class="section-title"><?php the_field('callouts_title'); ?></h1>
						<div class="row">
							<?php while(have_rows('callouts')): the_row(); ?>
								<div class="col-sm-4">
									<div class="callout">
										<div class="img-wrapper">
											<?php echo wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
										</div>
										<p><?php the_sub_field('copy'); ?></p>
									</div>
								</div>
							<?php endwhile ?>
						</div>
					</div>
					<p class="bottom-copy"><?php the_field('callouts_bottom_copy'); ?></p>
				</div>
			<?php endif ?>

			<div class="form-area page-section">
				<?php get_template_part('loop-templates/eo-form'); ?>
			</div>
		</div>
	</div>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
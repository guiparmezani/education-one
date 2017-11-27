<?php
/**
 * Template Name: Template Home
 *
 * Template for displaying home page content
 *
 * @package educationone
 */

get_header();
?>

<div class="home-page-wrapper">
	<div data-ride="carousel" class="carousel carousel-fade" id="carousel-image-slider" data-interval="false" data-pause="false">
		<ol class="carousel-indicators">
	    <?php $i=0; while(have_rows('slides')): the_row(); ?>
	    	<li data-target="#carousel-image-slider" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo ' active'; ?>"></li>
			<?php $i++; endwhile ?>
	  </ol>
	  <div role="listbox" class="carousel-inner">
	  	<?php $i=0; while(have_rows('slides')): the_row(); ?>
		    <div class="carousel-item item-<?php echo $i; if($i == 0) echo ' active'; ?>" style="background-image: url(<?php echo the_sub_field('image'); ?>); ">
		    	<div class="container">
			    	<div class="slide-copy-wrapper">
			    		<?php the_sub_field('copy'); ?>
			    	</div>
		    	</div>
		    </div>
			<?php $i++; endwhile ?>
	  </div>
	  <a data-slide="prev" class="carousel-control-prev nav-button arrow-left" role="button" href="#carousel-image-slider" class="left carousel-control">
	    <span aria-hidden="true" class="icon-prev"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a data-slide="next" class="carousel-control-next nav-button arrow-right" role="button" href="#carousel-image-slider" class="right carousel-control">
	    <span aria-hidden="true" class="icon-next"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	
	<div class="form-area">
		<div class="container">
			<?php get_template_part('loop-templates/eo-form'); ?>
		</div>
	</div>

	<div class="page-section callouts-wrapper">
		<div class="container">
			<div class="callouts">
				<h1 class="section-title"><?php the_field('callouts_title'); ?></h1>
				<div class="row">
					<?php while(have_rows('callouts')): the_row(); ?>
						<div class="col-sm-4">
							<div class="callout">
								<?php echo wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
								<?php the_sub_field('copy'); ?>
							</div>
						</div>
					<?php endwhile ?>
				</div>
			</div>
		</div>
	</div>

	<div class="page-section testimonial-wrapper">
		<div class="container">
			<div class="testimonials">
				<h1 class="section-title"><?php the_field('testimonial_title'); ?></h1>
				<div class="testimonial-image text-center">
					<?php echo wp_get_attachment_image(get_field('testimonial_image'), 'medium'); ?>
				</div>
				<div class="testimonial-copy">
					<p><?php the_field('testimonial_copy'); ?></p>
					<p class="testimonial-name"><?php the_field('testimonial_name'); ?></p>
					<p class="testimonial-subname"><?php the_field('testimonial_sub_name'); ?></p>
				</div>
				<div class="text-center">
					<a href="/test-prep/" class="btn btn-orange">LEARN MORE ABOUT TEST PREP <i class="fa fa-angle-right" aria-hidden="true"></i></a>
					<a href="/test-prep/" class="btn btn-blue-gradient">LEARN MORE ABOUT SUBJECT TUTORING <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
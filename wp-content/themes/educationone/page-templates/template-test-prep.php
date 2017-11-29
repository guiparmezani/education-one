<?php
/**
 * Template Name: Template Test Prep
 *
 * @package educationone
 */

get_header();
?>

<div class="container">
	<div class="hero-section page-section">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="hero-copy">
			<?php the_field('hero_copy'); ?>
		</div>

		<?php if (have_rows('tabs')): ?>
			<nav class="nav nav-tabs" id="myTab" role="tablist">
				<?php $i=0; while(have_rows('tabs')): the_row(); ?>
				  <a class="nav-item nav-link <?php if($i===0) echo 'active'; ?>" id="nav-<?php echo $i; ?>-tab" data-toggle="tab" href="#nav-<?php echo $i; ?>" role="tab" aria-controls="nav-<?php echo $i; ?>" aria-selected="true"><?php the_sub_field('tab_name'); ?></a>
				<?php $i++; endwhile ?>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<?php $i=0; while(have_rows('tabs')): the_row(); ?>
			  	<div class="tab-pane fade show <?php if($i===0) echo 'active'; ?>" id="nav-<?php echo $i; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $i; ?>-tab">
			  		<div class="row">
				  		<div class="col-md-7">
					  		<div class="main-content-wrapper">
				  				<?php the_sub_field('main_content'); ?>
					  		</div>
				  		</div>
				  		<?php if (get_sub_field('secondary_content')): ?>
					  		<div class="col-md-5">
					  			<div class="secondary-content-wrapper">
					  				<?php the_sub_field('secondary_content'); ?>
					  			</div>
					  		</div>
				  		<?php endif ?>
			  		</div>
			  	</div>
				<?php $i++; endwhile ?>
			</div>
		<?php endif ?>

	</div>

	<div class="form-area page-section">
		<div class="container">
			<div class="row">
				<?php get_template_part('loop-templates/eo-form'); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
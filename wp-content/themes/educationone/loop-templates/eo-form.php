<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="eo-form-wrapper">
	<div class="row">
		<div class="col-md-6" style="background: linear-gradient(270deg, <?php the_field('background_color', get_the_ID()) ?>,  transparent 20%), <?php the_field('background_color', get_the_ID()); ?> no-repeat;">
			<?php if (get_field('title', get_the_ID())): ?>
				<div class="form-copy">
					<h1><?php the_field('title', get_the_ID()); ?></h1>
					<p><?php the_field('copy', get_the_ID()); ?></p>
				</div>
			<?php endif ?>
			<img src="<?php if(get_field('background', get_the_ID())) the_field('background', get_the_ID()); else echo ''; ?>">
		</div>

		<div class="col-md-6">
			<div class="form-wrapper">
				<?php gravity_form(1, false, true, false, '', true, 12); ?>
			</div>
		</div>
	</div>
</div>


<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
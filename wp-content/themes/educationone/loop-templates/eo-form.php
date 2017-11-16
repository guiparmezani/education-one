<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="eo-form-wrapper">
	<div class="row">
		<div class="col-md-6" style="background-image: url(<?php if(get_field('background', get_the_ID())) the_field('background', get_the_ID()); else echo ''; ?>);">
			<?php if (get_field('title', get_the_ID())): ?>
				<div class="form-copy">
					<h3><?php the_field('title', get_the_ID()); ?></h3>
					<p><?php the_field('copy', get_the_ID()); ?></p>
				</div>
			<?php endif ?>
		</div>

		<div class="col-md-6">
			<?php gravity_form(1, false, false, false, '', true, 12); ?>
		</div>
	</div>
</div>


<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
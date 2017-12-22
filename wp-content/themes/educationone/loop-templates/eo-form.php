<div class="eo-form-wrapper">
	<div class="row">
		<!-- <div class="col-md-6" style="background: linear-gradient(270deg, #6FC3DC,  transparent 20%), <?php //the_field('background_color', get_the_ID()); ?> no-repeat;"> -->
		<div class="col-md-6" style="background-image: url(<?php echo bloginfo('template_url'); ?>/img/kids-bg-2.jpg);">
			<?php if (get_field('title', get_the_ID())): ?>
				<div class="form-copy">
					<h1><?php the_field('title', get_the_ID()); ?></h1>
					<p><?php the_field('copy', get_the_ID()); ?></p>
				</div>
			<?php endif ?>
			<!-- <img src="<?php// if(get_field('background', get_the_ID())) the_field('background', get_the_ID()); else echo ''; ?>"> -->
		</div>

		<div class="col-md-6">
			<div class="form-wrapper">
				<?php gravity_form(1, false, true, false, '', true, 12); ?>
			</div>
		</div>
	</div>
</div>

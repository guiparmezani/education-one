<div class="eo-form-wrapper">
	<div class="row">
		<div class="col-md-6 wp-block-cover" style="background-image: url(http://educate-one.com/wp-content/uploads/2019/05/edu-one-fran.jpg);">
			<?php if (get_field('title', get_the_ID())): ?>
				<div class="form-copy">
					<h1 style="color: #ffffff;">It's Your Time.</h1><br><h2 style="color: #ffffff;">OWN AN </h2><BR><h2 style="color: #ffffff;"><STRONG>EDUCATION ONE</STRONG></h2><BR><h2 style="color: #ffffff;">FRANCHISE</h2>
					<p><?php the_field('copy', get_the_ID()); ?></p>
				</div>
			<?php endif ?>
		</div>

		<div class="col-md-6">
			<div class="form-wrapper">
				<?php gravity_form(3, false, true, false, '', true, 12); ?>
			</div>
		</div>
	</div>
</div>
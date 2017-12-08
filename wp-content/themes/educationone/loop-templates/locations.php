<div class="locations-section page-section">
	<h1 class="entry-title text-center">Education One Locations</h1>
	<?php if (have_rows('locations', 'options')): ?>
		<div class="locations-wrapper">
			<div class="row">
				<?php while(have_rows('locations', 'options')): the_row(); ?>
					<div class="col-md-4">
						<div class="location-item">
							<div class="location-copy">
								<h4><?php the_sub_field('name'); ?></h4>
								<p><?php the_sub_field('address'); ?></p>
							</div>
							<?php if (get_sub_field('coming_soon')): ?>
								<div class="coming-soon">COMING SOON!</div>
							<?php endif ?>
						</div>
					</div>
				<?php endwhile ?>
			</div>
		</div>
	<?php endif ?>
</div>
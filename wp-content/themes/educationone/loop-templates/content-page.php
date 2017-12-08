<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php the_content(); ?>

		<div class="form-area page-section">
			<div class="container">
				<div class="row">
					<?php get_template_part('loop-templates/eo-form'); ?>
				</div>
			</div>
		</div>

		<?php get_template_part('loop-templates/locations'); ?>

	</div><!-- .entry-content -->

</div><!-- #post-## -->

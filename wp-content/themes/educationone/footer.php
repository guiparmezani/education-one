<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>


<footer class="wrapper" id="wrapper-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="site-footer" id="colophon">
					
					<nav class="navbar navbar-expand-md">
						<div class="home-link-wrapper">
							<a class="home-link" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								<img src="<?php bloginfo('template_url') ?>/img/educationone-vertical-logo.svg">
							</a>
						</div>

						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'footer-menu',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu-footer',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>
						
						<div class="call-us desktop">
							<span>GIVE US A CALL <i class="fa fa-phone" aria-hidden="true"></i></span>
							<a href="tel:<?php the_field('phone_number', 'options'); ?>"><?php the_field('phone_number', 'options'); ?></a>
						</div>
					</nav><!-- .site-navigation -->

				</div><!-- #colophon -->
			</div><!--col end -->
		</div><!-- row end -->
	</div><!-- container end -->

	<div class="copyright clearfix">
		<div class="container">
			<span class="pull-left">© <?php echo date("Y"); ?> Education One</span>
			<span></span>
			<span class="pull-right"><a href="/careers/">Careers</a></span>
		</div>
	</div>
</footer><!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->

<script type="application/javascript ">
  const ipFormInput = document.getElementById('ipFormInput');

  fetch('https://api.ipify.org?format=json')
      .then((response) => { return response.json() })
      .then((json) => {
          const ip = json.ip;
          ipFormInput.value = ip;
      })
      .catch((err) => { console.error(`Error getting IP Address: ${err}`) })
</script>
<?php wp_footer(); ?>

</body>
</html>


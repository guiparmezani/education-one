<?php
/**
 * Template Name: Franchise
 *
 * @package educationone
 */


get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<main class="site-main" id="main">
			<?php while ( have_posts() ) : the_post(); ?>
			    <div class="form-area page-section">
		<div class="container">
			<div class="row">
				<?php get_template_part('loop-templates/eo-fran-form'); ?>
			</div>
			<div class="row" style="background-color: red;color:white;padding: 75px 0px 75px 0px;">
				<div class="col-lg-6">
					<span><h4 style="color:white;"><strong>Individualized Programs + Great Tutors = Success!</strong></h4></span>
					<hr style="border-top: dotted 1px;" />
					<span>Every child can achieve higher grades and test scores with effective, individualized tutoring. From the struggling student needing help on fundamentals and homework guidance to the gifted child doing advanced coursework, and for every student seeking SAT or ACT Prep, personalized tutoring at Education One can make a difference.</span>
				</div>
				<div class="col-lg-6">
					<span>
						<img style="border:3px solid #fff" src="http://educate-one.com/wp-content/uploads/2019/05/Tutoring-Center_-1.jpg">
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12" style="padding-top: 40px; padding-bottom: 40px;">
					<h2>
						WHY OWN YOUR OWN  EDUCATION ONE
					</h2>
				</div><br>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<span><h4>Proven Tutoring Programs</h4><br>
We begin with an academic assessment and diagnostic testing, followed by a personal conference with parents and student to identify areas of need and to set goals. Our Center Director creates an individualized program and customized schedule for each child. Then our expert tutors use a combination of proprietary and third-party curriculum to help each student build the knowledge and skills needed to achieve success in school and beyond.</span><br>
				</div>
				<div class="col-lg-4">
					<span><h4>Superior Teachers</h4><br>
We hire teachers who are experts in their subjects, require them to pass our rigorous testing and then train them in our curriculum and methods. They get to know each student through our individualized tutoring process, providing the knowledge and motivation necessary for struggling students to get back on track, and the advanced skills and inspiration needed to propel good students to new heights.</span><br>
				</div>
				<div class="col-lg-4">
					<span><h4>Availble Market</h4><br>
New territories are available in Virginia communities around D.C. and in the Texas markets of DFW and Austin. Other markets may also be available. Your ideal territory should include above average household incomes for families with children. You should research what other demographic factors may be important to your success.</span><br>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<br><span><h4>A Rewarding Business</h4><br>
There’s no better feeling than to know you’ve helped a child achieve better grades, pass the big exam, or gain acceptance to their dream college. And when students and their parents see improvements from the Education One system, they often refer to their friends and neighbors. Positive word of mouth allows strong business growth from year to year. In fact, many observers consider the education industry to be recession resistant because parents know that admission to top private and state universities is becoming ever more competitive. Concerned parents continue to seek academic guidance and tutoring assistance to give their children the best chance of receiving a “fat envelope” from their preferred schools.</span>
				</div>
				<div class="col-lg-4">
					<br><span><h4>Royalties and Other Fees</h4><br>
Other tutoring franchisors may collect monthly royalty fees as high as 16% and more, with annual minimum royalties reaching $32k, plus many other fees. At Education One, your monthly royalty fee will be just 8%, with only a $1500 monthly minimum. We’ll also require a $500 monthly System Fee which we’ll use to develop improved systems, curriculum, and website development for the benefit of all Education One centers. But because you’ll be one of our very first franchisees, we may be willing to reduce or even waive our initial franchise fee. And if you’re committed to promoting your business extensively, we’ll waive our 2% advertising fee. So, let’s talk! Fill out our inquiry form, and someone will respond to you with more information.</span>
				</div>
				<div class="col-lg-4">					
				</div>
			</div>
				<?php get_template_part( 'loop-templates/content', 'blank' ); ?>
			<?php endwhile; // end of the loop. ?>        
		</div>
	</div>

		</main><!-- #main -->


</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
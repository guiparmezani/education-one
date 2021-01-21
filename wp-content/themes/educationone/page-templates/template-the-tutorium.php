<?php
/**
 * Template Name: Template The Tutorium
 *
 * @package educationone
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="the-tutorium-wrapper">
    <div class="tutorium-nav-wrapper">
      <div class="container">
        <div class="tutorium-nav" id="tutoriumNav">
        </div>

        <?php if (have_rows('subnavs')): ?>
          <ul class="nav tutorium-nav" id="tutoriumNav">
            
            <?php $i=0; while (have_rows('subnavs')): the_row() ?>
              <li class="nav-item">
                <a class="nav-link anchor-link <?php if($i=0) echo 'active' ?>" href="#section<?php the_sub_field('section_number') ?>"><?php the_sub_field('label') ?></a>
              </li>
            <?php $i++; endwhile ?>
          </ul>
        <?php endif ?>
      </div>
    </div>

    <div class="hero-section page-section" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
      <div class="container">
        <div class="hero-content">
          <h1 class="entry-title">THE TUT<img src="<?php echo bloginfo('template_url'); ?>/img/The_Tutorium_Apple-01.svg">RIUM</h1>
          <p><?php the_field('hero_subtitle'); ?></p>
          <div class="form-area">
            <a href="<?php the_field('button_target') ?>" class="btn btn-brand anchor-link"><?php the_field('button_label') ?></a>
          </div>
        </div>
      </div>
    </div>

    <div class="page-content">
      <?php if (have_rows('blurbs')): ?>
        <div class="container">
          <div id="section1" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <?php $i=0; while(have_rows('blurbs')): the_row(); ?>
                <div class="carousel-item <?php if($i==0) echo 'active'; ?>">
                  <div class="carousel-item-content-wrapper">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6">
                          <?php the_sub_field('copy'); ?>
                        </div>
                        <div class="col-md-6">
                          <div class="slider-image-wrapper">
                            <?php echo wp_get_attachment_image(get_sub_field('image'), 'large') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile ?>
            </div>
            <a class="carousel-control carousel-control-prev" href="#section1" role="button" data-slide="prev">
              <i class="fas fa-arrow-left"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control carousel-control-next" href="#section1" role="button" data-slide="next">
              <i class="fas fa-arrow-right"></i>
              <span class="sr-only">Next</span>
            </a>
            <ol class="carousel-indicators">
              <?php $i=0; while(have_rows('blurbs')): the_row(); ?>
                <li data-target="#section1" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo ' active'; ?>"></li>
              <?php $i++; endwhile ?>
            </ol>
          </div>
        </div>
      <?php endif ?>

      <?php if (have_rows('topics')): ?>
        <div class="topics" id="section2">
          <div class="container">
            <h2><?php the_field('subjects_heading') ?></h2>
            <div class="row">
              <?php $i=0; while(have_rows('topics')): the_row(); ?>
                <?php if ($i==5): $i=0; ?>
                  </div>
                  <div class="row">
                <?php endif ?>
                <div class="col-md-15">
                  <div class="topic-item" style="background-image: url(<?php echo wp_get_attachment_image_src(get_sub_field('image'))[0]; ?>);">
                    <div class="topic-title">
                      <span><?php the_sub_field('title'); ?></span>
                    </div>
                  </div>
                </div>
              <?php $i++; endwhile ?>
            </div>
          </div>
        </div>
      <?php endif ?>

      <?php if (have_rows('promos')): ?>
        <div class="promos" id="section3">
          <div class="container">
            <h2><?php the_field('offers_heading') ?></h2>
            <p class="memberships-paragraph">Find a membershit that's right for you</p>
            <div class="promos-content-wrapper">
              <div class="row">
                <div class="col-md-6">
                  <div class="standard-wrapper">
                    <p>Standard</p>
                    <h4>Two Sessions Each Day</h4>
                    <?php while(have_rows('promos')): the_row(); ?>
                      <?php if (get_sub_field('type') == 'standard'): ?>
                        <div class="promo">
                          <h3><strong><?php the_sub_field('title') ?></strong></h3>
                          <p><?php the_sub_field('copy') ?></p>
                          <span><?php the_sub_field('rates') ?></span>
                          <a href="#section4" class="btn btn-brand anchor-link">Start Today</a>
                        </div>
                      <?php endif ?>
                    <?php endwhile ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="scholar-wrapper">
                    <p>Scholar</p>
                    <h4>Three Sessions Each Day</h4>
                    <?php while(have_rows('promos')): the_row(); ?>
                      <?php if (get_sub_field('type') == 'scholar'): ?>
                        <div class="promo">
                          <h3><strong><?php the_sub_field('title') ?></strong></h3><?php if(get_sub_field('title') == '6 Months') echo '<span class="sticker">Most Popular</span>'; elseif(get_sub_field('title') == '1 Year') echo '<span class="sticker orange">Best Value</span>'; ?>
                          <p><?php the_sub_field('copy') ?></p>
                          <span><?php the_sub_field('rates') ?></span>
                          <a href="#section4" class="btn btn-brand anchor-link">Start Today</a>
                        </div>
                      <?php endif ?>
                    <?php endwhile ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>

      <?php if (get_field('show_enroll_form_at_bottom')): ?>
        <div id="section4" class="tutorium-enroll bottom-form">
          <h2>Online private tutoring right at your fingertips</h2>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="enroll-form">
                  <h3>Get Started</h3>
                  <p>Boost your child's grades and test scores!</p>
                  <?php gravity_form(7, false, true, false, '', true, 12); ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-area-copy">
                  <p><?php the_field('form_area_copy') ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>
  </div>

<?php endwhile; else : ?>
  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
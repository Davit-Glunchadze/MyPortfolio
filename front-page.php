<?php
// hero section
$hero_section = get_field('hero_section');
$hero_image = $hero_section['hero_image'];
$hero_title = $hero_section['hero_title'];
$hero_subtitle = $hero_section['hero_subtitle'];
$hero_subtitle_span = $hero_section['hero_subtitle_span'];

// about section
    
$about_section = get_field('about_section');
    // Section head
$about_title = $about_section['about_title'];
$about_subtitle = $about_section['about_subtitle'];
$about_image = $about_section['about_image'];
    // section details
$profile_title = $about_section['profile_title'];
$profile_subtitle = $about_section['profile_subtitle'];
    // section columns
$about_me_details = $about_section['about_me_details'];
$column_1 = $about_me_details['column_1'];
$column_2 = $about_me_details['column_2'];

// statistic section
$statistic_section = get_field('statistic_section');


// echo '<pre>';
// print_r($statistic_section);
// echo '</pre>';
// // die();
?>

<?php get_header(); ?>
<main id="main">
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="<?php echo esc_url($hero_image); ?>" alt="hero-photo" data-aos="fade-in" class="mirrored">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <h2><?php echo $hero_title ?></h2>
      <p><?php echo $hero_subtitle ?>
        <span class="typed" data-typed-items="<?php echo implode(', ', $hero_section['hero_subtitle_span']); ?>"></span>
      <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
    </div>
  
  </section><!-- /Hero Section -->
  
  <!-- About Section -->
  <section id="about" class="about section">
  
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php echo $about_title ?></h2>
      <p><?php echo $about_subtitle ?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4">
          <img src="<?php echo esc_url($about_image);?>" class="img-fluid" alt="About photo">
        </div>
        <div class="col-lg-8 content">
          <h2>
            <?php echo $profile_title ?>
          </h2>
          <p class="fst-italic py-3">
            <?php echo $profile_subtitle ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
              <?php foreach($column_1 as $detail): ?>
                <?php if ($detail['name'] &&  $detail['description']): ?>
                  <li><i class="bi bi-chevron-right"></i> <strong><?php echo $detail['name']; ?></strong> <span><?php echo $detail['description']; ?></span></li>
                  <?php endif ?>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <?php foreach($column_2 as $detail): ?>
                  <?php if($detail['name'] && $detail['description']): ?>
                  <li><i class="bi bi-chevron-right"></i> <strong><?php echo $detail['name']; ?></strong> <span><?php echo $detail['description']; ?></span></li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
              </ul>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </section><!-- /About Section -->

    <!-- Stats Section -->
  <section id="stats" class="stats section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <?php foreach ($statistic_section as $section): ?>         
          <div class="col-lg-3 col-md-6">
             <div class="stats-item">
                <div class="emoji-stat">
                  <img src="<?php echo esc_url($section['stat_emoji']); ?>" alt="emoji photo">
                  <span data-purecounter-start="0" data-purecounter-end="<?php echo esc_attr(!empty($section['Quantity']) ? $section['Quantity'] : '0'); ?>" data-purecounter-duration="1" class="purecounter"></span>
                </div>
                <p><strong><?php echo esc_html($section['title']); ?></strong></p>
             </div><!-- End Stats Item -->
          </div>        
        <?php endforeach; ?>
      </div>
    </div>
  </section><!-- /Stats Section -->

</main>


<?php get_footer(); ?>
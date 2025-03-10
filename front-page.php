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

// skill section
$skill_section = get_field('skill_section');
$skills_progress_1 = $skill_section['skills_progress_1'];
$skills_progress_2 = $skill_section['skills_progress_2'];

//resume section 
$resume_section = get_field('resume_section');
$resume_section_1 = $resume_section ['resume_section_1'];
$resume_section_2 = $resume_section ['resume_section_2'];
$resume_button = $resume_section ['resume_button'];





// echo '<pre>';
// print_r($resume_section);
// echo '</pre>';
// die();
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
  
  <!-- Skills Section -->
  <section id="skills" class="skills section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php echo esc_html($skill_section['skill_title']); ?></h2>
      <p><?php echo esc_html($skill_section['skill_subtitle']); ?></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row skills-content skills-animation">
        <div class="col-lg-6">
          <?php foreach ($skills_progress_1 as $section): ?>
          <?php if (esc_html($section['progress_title'])) : ?>
          <div class="progress">
            <span class="skill"><span><?php echo esc_html($section['progress_title']); ?></span> <i class="val"><?php echo esc_html($section['progress_percent_title']); ?></i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_html($section['progress_percent']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->
          <?php endif; ?>
          <?php endforeach; ?>
        </div>

        <div class="col-lg-6">
            <?php foreach ($skills_progress_2 as $section2): ?>
            <?php if (esc_html($section2['progress_title'])) : ?>
            <div class="progress">
              <span class="skill"><span><?php echo esc_html($section2['progress_title']); ?></span> <i class="val"><?php echo esc_html($section2['progress_percent_title']); ?></i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_html($section2['progress_percent']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section><!-- /Skills Section -->

  <!-- Resume Section --> 
<section id="resume" class="resume section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2><?php echo esc_html($resume_section['resume_section_title']); ?></h2>
    <p><?php echo esc_html($resume_section['resume_section_description']); ?></p>
  </div><!-- End Section Title -->

    <div class="container">
      <div class="row">
          <!-- Resume Information Column -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <?php foreach($resume_section_1 as $key => $box_1): ?>
              <h3 class="resume-title"><?php echo wp_kses_post($box_1['title']); ?></h3>
              <div class="resume-item pb-0">
                  <h4><?php echo wp_kses_post($box_1['subtitle']); ?></h4>
                  <h5><?php echo wp_kses_post($box_1['year']); ?></h5>
                  <p><em><?php echo wp_kses_post($box_1['location']); ?></em></p>
                  <p><em><?php echo wp_kses_post($box_1['description']); ?></em></p>
                  <p><em><?php echo wp_kses_post($box_1['information']); ?></em></p>
              </div>
            <?php endforeach; ?>
          </div>
              
          <!-- Professional Experience Column -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <?php foreach($resume_section_2 as $key => $box_2): ?>
              <h3 class="resume-title"><?php echo wp_kses_post($box_2['title']); ?></h3>
              <div class="resume-item pb-0">
                  <h4><?php echo wp_kses_post($box_2['subtitle']); ?></h4>
                  <h5><?php echo wp_kses_post($box_2['year']); ?></h5>
                  <p><em><?php echo wp_kses_post($box_2['location']); ?></em></p>
                  <p><em><?php echo wp_kses_post($box_2['description']); ?></em></p>
                  <p><em><?php echo wp_kses_post($box_2['information']); ?></em></p>
              </div>
            <?php endforeach; ?>
          </div>
      </div>
    </div><!-- Resume Information Column -->
    
</section><!-- /Resume Section -->
<div class="download-button">
  <?php if($resume_section['resume_button']): ?>
  <a href="<?php echo $resume_button['button_link']?>" id="downloadBtn" class="btn btn-outline-primary"><?php echo $resume_button['button_title']?></a>
  <?php endif; ?>
</div>


</main>

<?php get_footer(); ?>

</body>
</html>

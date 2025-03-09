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

// echo '<pre>';
// print_r($skill_section);
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
    <h2>Resume</h2>
    <p>Here, you can find my experience, skills, and projects as a Front-End Developer. I am continuously learning and improving my expertise to build modern and user-friendly web applications. Feel free to download my CV using the button below!</p>
  </div><!-- End Section Title -->

  <div class="container">
      <div class="row">
          <!-- Resume Information Column -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <h3 class="resume-title">Summary</h3>
              <div class="resume-item pb-0">
                  <h4>Brandon Johnson</h4>
                  <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
                  <ul>
                      <li>Portland par 127, Orlando, FL</li>
                      <li>(123) 456-7891</li>
                      <li>alice.barkley@example.com</li>
                  </ul>
              </div>
              
              <h3 class="resume-title">Education</h3>
              <div class="resume-item">
                  <h4>Master of Fine Arts &amp; Graphic Design</h4>
                  <h5>2015 - 2016</h5>
                  <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                  <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit.</p>
              </div>
              
              <div class="resume-item">
                  <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
                  <h5>2010 - 2014</h5>
                  <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
                  <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates.</p>
              </div>
          </div>
              
          <!-- Professional Experience Column -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <h3 class="resume-title">Professional Experience</h3>
              <div class="resume-item">
                  <h4>Senior Graphic Design Specialist</h4>
                  <h5>2019 - Present</h5>
                  <p><em>Experion, New York, NY </em></p>
                  <ul>
                      <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials.</li>
                      <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project.</li>
                      <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design.</li>
                      <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000.</li>
                  </ul>
              </div>
              
              <div class="resume-item">
                  <h4>Graphic Design Specialist</h4>
                  <h5>2017 - 2018</h5>
                  <p><em>Stepping Stone Advertising, New York, NY</em></p>
                  <ul>
                      <li>Developed numerous marketing programs (logos, brochures, infographics, presentations, and advertisements).</li>
                      <li>Managed up to 5 projects or tasks at a given time while under pressure.</li>
                      <li>Recommended and consulted with clients on the most appropriate graphic design.</li>
                      <li>Created 4+ design presentations and proposals a month for clients and account managers.</li>
                  </ul>
              </div>
          </div>
      </div>
  </div><!-- Resume Information Column -->
    
</section><!-- /Resume Section -->
<div class="download-button">
  <a href="javascript:void(0);" id="downloadBtn" class="btn btn-outline-primary">Download CV</a>
</div>


</main>

<?php get_footer(); ?>

</body>
</html>

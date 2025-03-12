<?php
require_once(ABSPATH . 'wp-load.php');
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


$contact_section = get_field('contact_section');

$info_items = [
  'address' => [
      'icon' => 'bi-geo-alt',
      'link' => esc_url($contact_section['address']['address_link']),
      'title' => wp_kses_post($contact_section['address']['address_title']),
      'text' => wp_kses_post($contact_section['address']['address_itself']),
  ],
  'phone' => [
      'icon' => 'bi-telephone',
      'link' => 'Tel:' . wp_kses_post($contact_section['phone']['number']),
      'title' => wp_kses_post($contact_section['phone']['number_title']),
      'text' => wp_kses_post($contact_section['phone']['number_itself']),
  ],
  'mail' => [
      'icon' => 'bi-envelope',
      'link' => 'mailto:' . wp_kses_post($contact_section['mail']['mail']) . '?subject=Hello&body=This%20is%20a%20%20email.',
      'title' => wp_kses_post($contact_section['mail']['mail_title']),
      'text' => wp_kses_post($contact_section['mail']['mail_itself']),
  ]
];

$portfolio_section = get_field('portfolio_section');
$portfolio_filter_menu = $portfolio_section ['portfolio_filter_menu'];
$portfolio_cards = $portfolio_section['portfolio_cards'];


// echo '<pre>';
// print_r($portfolio_filters);
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

  <!-- /Resume Section button -->
  <div class="download-button">
    <?php if($resume_section['resume_button']): ?>
    <a href="javascript:void(0);" id="downloadBtn" class="btn btn-outline-primary"><?php echo $resume_button['button_title']?></a>
    <?php endif; ?>
  </div><!-- /Resume Section button -->

<?php 
echo '<pre>';
print_r($portfolio_section);
echo '</pre>';
// die();
?>
  <!-- Portfolio Section -->
  <section id="portfolio" class="portfolio section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php echo wp_kses_post($portfolio_section['portfolio_title']); ?></h2>
      <p><?php echo wp_kses_post($portfolio_section['portfolio_description']); ?></p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          <?php foreach($portfolio_filter_menu as $menu): ?>
          <?php if(wp_kses_post($menu)): ?>
            <li data-filter=".filter-app"><?php echo wp_kses_post($menu)?></li>
          <?php endif; ?>
          <?php endforeach; ?>
        </ul><!-- End Portfolio Filters -->

        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          <?php foreach($portfolio_cards as $card): ?>
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?php echo wp_kses_post($card['filter_label']) ?>">
            <div class="portfolio-content h-100">
              <img src="<?php echo  esc_url($card['portfolio_image'])?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo wp_kses_post($card['card_order']) ?></h4>
                <p><?php echo wp_kses_post($card['card_description']) ?></p>
                <a href="<?php echo  esc_url($card['card_photo'])?>" title="<?php echo wp_kses_post($card['card_order_label']) ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
          </div><!-- End Portfolio Item -->
          <?php endforeach; ?>

          

        </div><!-- End Portfolio Container -->

      </div>

    </div>

  </section><!-- /Portfolio Section -->

  <!-- Services Section -->
  <section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Services</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
          <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
        </div>
        <!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
          <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
          <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
          <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
          <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
          <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
          <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
          <div>
            <h4 class="title"><a href="service-details.html" class="stretched-link">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>

  </section><!-- /Services Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Testimonials</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 3,
                "spaceBetween": 1
              }
            }
          }
        </script>
        <div class="swiper-wrapper">
        
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <img src="<?php echo  get_template_directory_uri() . '/assets/img/testimonials/testimonials-1.jpg'?>" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>
          </div><!-- End testimonial item -->
        
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <img src="<?php echo get_template_directory_uri() . '/assets/img/testimonials/testimonials-2.jpg'?>" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>
          </div><!-- End testimonial item -->
        
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <img src="<?php echo get_template_directory_uri() . '/assets/img/testimonials/testimonials-3.jpg'?>" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>
          </div><!-- End testimonial item -->
        
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <img src="<?php echo get_template_directory_uri() . '/assets/img/testimonials/testimonials-4.jpg'?>" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>
          </div><!-- End testimonial item -->
        
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
              <img src="<?php echo get_template_directory_uri() . '/assets/img/testimonials/testimonials-5.jpg'?>" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>
          </div><!-- End testimonial item -->
        
        </div>
        <div class="swiper-pagination"></div>
      </div>
        
    </div>

  </section><!-- /Testimonials Section -->
        
  <!-- Contact Section -->
  <section id="contact" class="contact section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2><?php echo wp_kses_post($contact_section['contact_title'])?></h2>
      <p><?php echo wp_kses_post($contact_section['contact_description'])?></p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-5">
          <div class="info-wrap">
              <?php foreach ($info_items as $key => $item) :
                if (!empty($item['link'])) : ?>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="<?php echo $item['link']; ?>" target="_blanket">
                            <i class="bi <?php echo $item['icon']; ?> flex-shrink-0"></i>
                        </a>
                        <div>
                            <h3><?php echo $item['title']; ?></h3>
                            <p><?php echo $item['text']; ?></p>
                        </div>
                    </div><!-- End Info Item -->
                <?php endif; 
              endforeach; ?>
              <iframe src="<?php echo  esc_url($contact_section['google_address'])?>" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>  
        <div class="col-lg-7">
          <?php echo do_shortcode('[contact-form-7 id="a173800" title="Contact form 1"]'); ?>
        </div><!-- End Contact Form --> 
      </div>  
    </div>  
  </section><!-- /Contact Section -->

</main>

<?php get_footer(); ?>

</body>
</html>

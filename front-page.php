<?php

$hero_section = get_field('hero_section');
$hero_image = $hero_section['hero_image'];
$hero_title = $hero_section['hero_title'];
$hero_subtitle = $hero_section['hero_subtitle'];
$hero_subtitle_span = $hero_section['hero_subtitle_span'];


// echo '<pre>';
// print_r($hero_section);
// echo '</pre>';
// // die();
?>

<?php get_header(); ?>

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



<?php get_footer(); ?>
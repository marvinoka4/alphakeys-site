<?php

/**
 * Feature Scroll Slider
 *
 * @package helium-fdn
 */
?>
<section class="feature-slider-section fluid grid-container">
  <div class="grid-x grid-margin-x align-center">
    <div class="cell text-center padding-bottom-2">
      <h2>Our <span style="font-weight: 700; color: #02066F;">Top Services</span></h2>
    </div>
    <div class="cell">
      <div class="swiper feature-slider">
        <div class="swiper-wrapper">
          <?php
          $services = [
            ['title' => 'Specialist Lending', 'id' => 'fs-specialist-lending', 'permalink' => get_the_permalink(38), 'icon' => 'ic5.svg'],
            ['title' => 'Income Protection', 'id' => 'fs-income-protection', 'permalink' => get_the_permalink(36) . '/#income-protection-section', 'icon' => 'ic3.svg'],
            ['title' => 'Mortgages', 'id' => 'fs-mortgages', 'permalink' => get_the_permalink(34), 'icon' => 'ic15.svg'],
            ['title' => 'Buy-to-Let', 'id' => 'fs-buy-to-let', 'permalink' => get_the_permalink(38), 'icon' => 'ic11.svg'],
            ['title' => 'Protection', 'id' => 'fs-protection', 'permalink' => get_the_permalink(36), 'icon' => 'ic7.svg'],
            ['title' => 'Bridging Loan', 'id' => 'fs-bridging-loan', 'permalink' => get_the_permalink(38), 'icon' => 'ic12.svg'],
            ['title' => 'Purchase', 'id' => 'fs-purchase', 'permalink' => get_the_permalink(34) . '/#purchase-section', 'icon' => 'ic8.svg'],
            ['title' => 'Development Finance', 'id' => 'fs-development-finance', 'permalink' => get_the_permalink(38), 'icon' => 'ic13.svg'],
            ['title' => 'Remortgage', 'id' => 'fs-remortgage', 'permalink' => get_the_permalink(34) . '/#remortgage-section', 'icon' => 'ic10.svg'],
            ['title' => 'Life Insurance', 'id' => 'fs-life-insurance', 'permalink' => get_the_permalink(36) . '/#life-insurance-section', 'icon' => 'ic14.svg'],
            ['title' => 'Equity Release', 'id' => 'fs-equity-release', 'permalink' => get_the_permalink(38), 'icon' => 'ic16.svg'],
          ];
          foreach ($services as $service) :
          ?>
            <div class="swiper-slide feature-slide" id="<?php echo esc_attr($service['id']); ?>">
              <div class="ins-feature-scroll-item text-center">
                <div class="ins-ft-scroll-area">
                  <div class="callout">
                    <a class="ft-inner-area-content click-track" id="<?php echo esc_url($service['id']); ?>" href="<?php echo esc_url($service['permalink']); ?>">
                      <div class="ins-ft-scroll-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/scroll/<?php echo esc_attr($service['icon']); ?>" alt="<?php echo esc_attr($service['title']); ?> Icon" width="70">
                      </div>
                      <div class="ins-ft-scroll-text pera-content">
                        <h3><?php echo esc_html($service['title']); ?></h3>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-controls">
          <div class="swiper-pagination"></div>
          <div class="swiper-navigation">
            <div class="swiper-button-prev" aria-label="Previous slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/util/vector-9.svg" alt="Previous" width="40">
            </div>
            <div class="swiper-button-next" aria-label="Next slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/util/vector-10.svg" alt="Next" width="40">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.feature-slider', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    });
  });
</script>
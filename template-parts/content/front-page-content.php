<?php

/**
 * Front Page Content
 *
 * @package helium-fdn
 */
?>

<div class="grid-container full bg-hero">
    <div class="grid-container">
        <div class="grid-x align-middle padding-vertical-4">
            <div class="large-6 medium-12 small-12 cell text-center">
                <h1 class="lead-heading">Opening Doors to Financial Possibilities</h1>
                <p class="lead-text padding-vertical-1">From Your Trusted Mortgage and Protection Advisers</p>
                <div class="grid-x align-center text-center">
                    <div class="large-6 medium-12 small-12 cell padding-vertical-1">
                        <a href="<?php echo esc_url(get_permalink(34)); ?>/#cta-content" class="button hero-button medium-expanded click-track" id="home-hero-mortgage">Mortgages</a>
                    </div>
                    <div class="large-6 medium-12 small-12 cell padding-vertical-1">
                        <a href="<?php echo esc_url(get_permalink(36)); ?>/#cta-content" class="button hero-button medium-expanded click-track" id="home-hero-protection">Protection</a>
                    </div>
                </div>
                <div class="grid-x align-center text-center">
                    <div class="large-8 medium-12 small-12 cell padding-vertical-1">
                        <a href="<?php echo esc_url(get_permalink(38)); ?>/#cta-content" class="button hero-button medium-expanded click-track" id="home-hero-specialist-lending">Specialist Lending</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid-container">
    <div class="grid-x grid-padding-x padding-vertical-4 align-center-middle">
        <div class="medium-9 cell small-order-2 medium-order-1 callout light-grey">
            <p class="text-center lead">We provide exceptional services to clients from all walks of life including professionals, self-employed traders, families, and businesses. We value customer satisfaction greatly and will go above and beyond to provide solution to your mortgage, protection and insurance needs. </p>
        </div>
    </div>
</div>


<!-- Feature Scroll Section -->
<?php get_template_part('template-parts/components/feature-scroll'); ?>

<!-- About Us Section -->
<?php get_template_part('template-parts/components/summary-about-us'); ?>

<!-- Testimonial Section -->
<?php get_template_part('template-parts/components/testimonials-slider'); ?>
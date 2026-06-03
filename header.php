<?php

/**
 * Header template for Helium-Fdn Theme
 *
 * @package helium-fdn
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alphakey Mortgages">
    <!-- SEO Semantics -->
    <meta name="description" content="<?php
                                        if (is_front_page()) {
                                            echo 'Alphakey Mortgages offers expert UK mortgage, remortgage, specialist lending, and protection services.';
                                        } elseif (is_page('mortgages')) {
                                            echo 'Explore UK mortgage and remortgage options with Alphakey Mortgages.';
                                        } elseif (is_page('protection')) {
                                            echo 'Discover UK protection services with Alphakey Mortgages.';
                                        } elseif (is_page('specialist-lending')) {
                                            echo 'Find specialist lending solutions with Alphakey Mortgages.';
                                        } else {
                                            echo esc_attr(get_the_excerpt());
                                        }
                                        ?>">
    <meta name="keywords" content="mortgage, remortgage, specialist lending, protection, UK, Alphakey Mortgages">
    <meta name="robots" content="index, follow">
    <title><?php
            if (is_front_page()) {
                echo 'Home | Alphakey Mortgages';
            } else {
                wp_title('|', true, 'right');
                echo 'Alphakey Mortgages';
            }
            ?></title>
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo is_front_page() ? 'Alphakey Mortgages' : wp_title('', false); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alphakey Mortgages">
    <meta property="og:image" content="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/og-image.jpg">
    <!-- Performance -->
    <link rel="preload" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/util/site_logo_white_.svg" as="image">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <!-- Schema Markup -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "Alphakey Mortgages",
            "url": "<?php echo esc_url(home_url()); ?>",
            "logo": "<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/util/site_logo_white_.svg",
            "telephone": "+44-7419-617498"
        }
    </script>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtm.js?id=GTM-MCJWQBKM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
    </script>
    <!-- End Google Tag Manager -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCJWQBKM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'helium-fdn'); ?></a>
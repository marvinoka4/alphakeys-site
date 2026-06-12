<?php

/**
 * Footer template for Helium-Fdn Theme
 *
 * @package helium-fdn
 */
?>
<footer class="footer text-white" role="contentinfo">
    <div class="grid-container">
        <div class="inner-footer grid-x grid-margin-x grid-margin-y text-center align-center-middle padding-vertical-4">
            <div class="cell large-12 medium-12 small-12 align-center text-center">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/util/site_logo_white_.svg" width="300" height="100" alt="Footer Logo">
                </a>
            </div>
            <div class="small-12 medium-10 large-10 cell text-center" style="padding-left: 10px; padding-right: 10px;">
                <p class="text-small">Alphakey Mortgages is a trading style of ITM Capital Limited, a company registered in
                    England and Wales. No. 15075995. Registered Office: 20 Wenlock Road, London, England,
                    N1 7GU</p>
                <p class="text-small">ITM Capital Limited is an Appointed Representative of Cornerstone Finance Group Ltd,
                    which is authorised and regulated by the Financial Conduct Authority.</p>
                <p class="text-small">Cornerstone Finance Group Ltd is registered in England &amp; Wales. No. 08458702.
                    Registered Office: Unit E Copse Walk, Pontprennau, Cardiff, Wales, CF23 8RB.</p>
                <p class="text-small">ITM Capital Limited (No. 1029113) and Cornerstone Finance Group Ltd (No. 767202) are
                    entered on the Financial Services Register at <a href="https://register.fca.org.uk/"><span style="color: white; text-decoration:underline;">register.fca.org.uk</span></a></p>
            </div>
            <div class="small-12 medium-12 large-12 cell text-center">
                <nav aria-label="Footer navigation">
                    <ul class="menu align-center">
                        <li><a href="/privacy-policy" class="click-track" id="privacy-policy" style="color: white">Privacy Policy </a></li>
                        <li><a href="/cookie-policy" class="click-track" id="cookie-policy" style="color: white">Cookie Policy</a></li>
                        <li><a href="/complaints-procedure" class="click-track" id="compliants-procedure" style="color: white">Complaints Procedure</a></li>
                    </ul>
                </nav>
            </div>
            <div class="small-12 medium-12 large-12 cell text-center">
                <p class="text-small"><i class="uil uil-copyright"></i> <?php echo date('Y'); ?> Alphakey Mortgages. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<?php get_template_part('template-parts/components/site-cookie-banner'); ?>
<div class="progress-wrap margin-bottom-2">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<?php wp_footer(); ?>
</body>

</html>
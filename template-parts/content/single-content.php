<?php

/**
 * Single Post Content
 *
 * @package helium-fdn
 */
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <section class="grid-container relative" aria-labelledby="single-content-title">
            <div class="grid-container">
                <div class="grid-x grid-padding-x padding-vertical-1 align-middle">
                    <div class="large-12 medium-12 cell small-order-1 medium-order-1">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1><?php the_title(); ?></h1>
                            </header>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

        </section>
<?php
    endwhile;
endif;
?>
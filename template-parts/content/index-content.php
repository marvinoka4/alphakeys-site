<?php

/**
 * Index Content
 *
 * @package helium-fdn
 */
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <section class="grid-container relative" aria-labelledby="index-content-title">
            <div class="grid-container">
                <div class="grid-x grid-padding-x padding-vertical-1 align-middle">
                    <div class="large-12 medium-12 cell small-order-1 medium-order-1">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </section>
<?php
    endwhile;
else :
    _e('No content found.', 'helium-fdn');
endif;
?>
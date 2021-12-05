<article class="artikel">
    <h2 class="artikel__ueberschrift"><?php the_title(); ?></h2>
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="artikel__foto__div">
            <img src="<?php the_post_thumbnail_url() ?>" class="artikel__foto">
            <p class="artikel__foto__bildnachweis"><?php the_post_thumbnail_caption() ?></p>
        </div>
    <?php } ?>

    <div class="artikel__text">
        <div class="artikel__content">
            <?php the_content(); ?>
            <p class="artikel__content__autor">
                <?php if ( get_field("anderer_autor") ) {
                    the_field("anderer_autor");
                } else {
                    the_author_posts_link();
                } ?>
            </p>
        </div>
        <div class="artikel__rand">
            <?php get_sidebar(); ?>
        </div>
    </div>
</article>
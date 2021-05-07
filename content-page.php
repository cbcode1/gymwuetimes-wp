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
        </div>
    </div>
</article>
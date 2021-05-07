<div class="artikel__seitenleiste">
    <i class="far fa-calendar-alt"></i>
    <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">
        <?php the_date(); ?>
    </a>

    <i class="fas fa-user"></i>
    <?php if ( get_field("anderer_autor") ) {
        the_field("anderer_autor");
    } else {
        echo "<span>";
        the_author_posts_link();
        echo "</span>";
    } ?>

    <i class="fas fa-tag"></i>
    <?php the_category(); ?>

    <?php if ( get_comments_number() != 0 ) { ?>
        <i class="fas fa-comment-alt"></i>
        <a href="#kommentare"><?php echo get_comments_number(); if (get_comments_number() == 1) { echo " Kommentar"; } else { echo " Kommentare"; } ?></a>
    <?php } 
    
    if ( get_field("ausgabennummer") ) { ?>
        <i class="fas fa-book-open"></i>
        <a href="/ausgaben/<?php the_field("ausgabennummer") ?>">aus Ausgabe <?php the_field("ausgabennummer") ?></a>
    <?php } ?>
</div>

<!-- <?php dynamic_sidebar("gwt_post-sidebar"); ?> -->
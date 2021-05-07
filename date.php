<?php get_header(); ?>

    <div class="archiv__archivleiste seitenleiste">
        <h2 class="archiv__archivleiste__ueberschrift">
            Archiv
        </h2>
        <ul class="archiv__archivleiste__nav__liste seitenleiste__nav__liste">
            <?php wp_get_archives() ?>
        </ul>
    </div>

    <select onchange="document.location.href=this.options[this.selectedIndex].value;" class="archiv__auswahl">
        <?php wp_get_archives('type=monthly&format=option'); ?>
    </select>
    
    <ul class="artikelliste">
        <?php
            if ( have_posts() ) : 
                while ( have_posts() ) : 
                    the_post();
                        get_template_part( 'content', get_post_format() );
                endwhile;
            endif;
        ?>
    </ul>
    
    </div>
    <?php wp_footer(); ?>
</body>
</html>
<?php get_header(); ?>

    <h2 class="suche__suchbegriff">
        Suchergebnisse für „<?php echo get_search_query(); ?>“
    </h2>
    <p class="suche__anzahl-ergebnisse">
        Es 
        <?php 
            global $wp_query;
            $anzahl_suchergebnisse = $wp_query->found_posts;
            if ( $anzahl_suchergebnisse == 1 ) {
                echo "wurde 1";
            } else {
                echo "wurden $anzahl_suchergebnisse";
            }
        ?>
         Artikel gefunden.
    </p>
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
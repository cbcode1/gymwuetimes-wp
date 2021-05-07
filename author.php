<?php get_header(); ?>

    <h3 class="autor__ueberschrift">Redakteur</h3>
    <h2 class="autor__name"><?php the_author() ?></h2>
    <p class="autor__beschreibung"><?php echo get_the_author_meta( 'description' ) ?></p>
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
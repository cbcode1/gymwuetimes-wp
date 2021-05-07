<?php get_header(); ?>

    <ul class="ressorts">
        <?php wp_list_categories( '&title_li=' ); ?>
    </ul>
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
    <script>
        aktiveKategorie = document.querySelector(".current-cat a");
        aktiveKategorie.href = "<?php echo get_bloginfo( 'wpurl' );?>";
    </script>
</body>
</html>
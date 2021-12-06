<?php get_header(); ?>

    <?php
        $args =  array(
            'post_type' => 'ausgaben',
            'orderby' => 'title',
            'order' => 'DESC',
            'posts_per_page' => 1,
        );

        $custom_query = new WP_Query( $args );
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        <a class="banner" href="<?php the_permalink() ?>">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="Cover von <?php the_title(); ?>" title="Cover von <?php the_title(); ?>">

                <div class="banner__text">
                    <h2 class="banner__ueberschrift"><?php the_title(); ?> ist da!</h2>
                    <?php the_content(); ?>
                </div>
        </a>
            
    <?php endwhile; ?>

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
</body>
</html>
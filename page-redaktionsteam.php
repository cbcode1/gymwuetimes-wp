<?php get_header(); ?>

    <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : 
                the_post();
                    get_template_part( 'content-page', get_post_format() );
            endwhile;
        endif; ?>

        <h2>Redaktion</h2>
        <ul class="artikelliste">

            <?php $authors = get_multiple_authors();
            foreach($authors as $author) { ?>

                <a href="/author/<?php the_author_meta("nickname", $author->ID) ?>" class="artikelliste__link">
                    <div class="artikelliste__kasten">
                        <div class="artikelliste__div">
                            <?php $author::get_avatar() ?>
                            <h2 class="artikelliste__ueberschrift"><?php the_author_meta("display_name", $author->ID) ?></h2>
                            <div class="artikelliste__vorschau">                                
                                <?php the_author_meta("description", $author->ID); ?>
                            </div>
                        </div>
                        <span class="artikelliste__mehr-lesen">Mehr lesen <i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
            
            <?php } ?>
        </ul>


    </div>
    <?php wp_footer(); ?>
</body>
</html>
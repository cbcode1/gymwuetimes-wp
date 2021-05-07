<?php get_header(); ?>
        <h2 class="artikel__ueberschrift">Ausgaben</h2>
        <ul class="ausgabenliste">
            <?php
            $args =  array(
                'post_type' => 'ausgaben',
                'orderby' => 'title',
                'order' => 'DESC',
            );

            $custom_query = new WP_Query( $args );
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <li class="ausgabenliste__ausgabe">
                        <a href="<?php the_permalink() ?>">
                            <img src="<?php the_post_thumbnail_url(); ?>" class="ausgabenliste__cover" alt="Cover von <?php the_title(); ?>" title="Cover von <?php the_title(); ?>">
                        </a>
                        <div class="ausgabenliste__inhalt">
                            <h2 class="ausgabenliste__ueberschrift">
                                <?php the_title(); ?>
                            </h2>
                            <p class="ausgabenliste__datum">
                                <?php the_date( 'F Y' ) ?>
                            </p>
                            <div class="ausgabenliste__beschreibung">
                                <?php the_content(); ?>
                            </div>
                            <div class="ausgabenliste__buttons">
                                <a href="<?php the_permalink() ?>" class="ausgabenliste__button">Mehr Informationen</a>
                                <?php if ( get_field("kaufen_moglich") == true ) { ?>
                                    <a href="/kaufen?ausgabe=<?php echo get_post_field("post_name") ?>" class="ausgabenliste__button ausgabenliste__button--kontur">Kaufen</a>
                                <?php } if ( get_field("download_moglich") == true && get_field("download-link") ) { ?>
                                    <a href="<?php echo get_field("download-link")["url"]; ?>" class="ausgabenliste__button ausgabenliste__button--kontur">Download</a>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
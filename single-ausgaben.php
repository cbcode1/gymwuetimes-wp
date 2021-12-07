<?php get_header(); ?>

    <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>

                <div class="ausgabe__header">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="ausgabe__header__cover" alt="Cover von <?php the_title(); ?>" title="Cover von <?php the_title(); ?>">
                    <div class="ausgabe__header__inhalt">
                        <p class="ausgabe__header__datum">
                            <?php the_date( 'F Y' ) ?>
                        </p>
                        <h1 class="ausgabe__header__titel"><?php the_title(); ?></h2>
                        <div class="ausgabe__header__beschreibung">
                            <?php the_content(); ?>
                        </div>
                        <?php if ( get_field("kaufen_moglich") == true || get_field("download_moglich") == true ) { ?>
                            <div class="ausgabe__header__buttons ausgabenliste__buttons">
                                <?php if ( get_field("kaufen_moglich") == true ) { ?>
                                    <a href="/kaufen?ausgabe=<?php echo get_post_field("post_name") ?>" class="ausgabenliste__button ausgabenliste__button--kontur ausgabe__header__button">Kaufen</a>
                                <?php } if ( get_field("download_moglich") == true && get_field("download-link") ) { ?>
                                    <a href="<?php echo get_field("download-link")["url"]; ?>" class="ausgabenliste__button ausgabenliste__button--kontur ausgabe__header__button">Download</a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="ausgabe__inhalt">
                    <h2 class="ausgabe__inhalt__ueberschrift">Inhaltsverzeichnis</h3>
                    <div class="ausgabe__inhalt__inhaltsverzeichnis">
                        <?php the_field("inhaltsverzeichnis"); ?>
                    </div>
                </div>
            
            <?php endwhile;
        endif;
    ?>
    </div>
    <?php wp_footer(); ?>
</body>
</html>
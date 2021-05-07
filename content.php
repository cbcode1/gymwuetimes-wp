<?php if ( has_post_thumbnail() ) { ?>

<li class="artikelliste__artikel artikelliste__artikel--bild">
    <a href="<?php the_permalink() ?>" class="artikelliste__link">
        <div class="artikelliste__kasten">
            <span class="artikelliste__datum"><?php the_date(); ?></span>
            <?php the_post_thumbnail( 'medium_large', array('alt' => "Foto zu " . get_the_title()) ); ?>

<?php } else { ?>

<li class="artikelliste__artikel">
<a href="<?php the_permalink() ?>" class="artikelliste__link">
    <div class="artikelliste__kasten">
        <span class="artikelliste__datum artikelliste__datum--schwarz"><?php the_date(); ?></span>
            
<?php } ?>
            
            <div class="artikelliste__div">
                <h2 class="artikelliste__ueberschrift"><?php the_title(); ?></h2>
                <div class="artikelliste__vorschau">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <span class="artikelliste__mehr-lesen">Mehr lesen <i class="fas fa-arrow-right"></i></span>
        </div>
    </a>
</li>
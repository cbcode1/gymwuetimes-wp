<?php if ( post_password_required() ) {
	return;
} ?>

<div id="kommentare" class="kommentare">
    <?php if ( have_comments() ) : ?>
        <h3 class="kommentare__ueberschrift">
            <?php
                printf( _nx( '1 Kommentar zu "%2$s"', '%1$s Kommentare zu "%2$s"', get_comments_number(), 'comments title'),
                number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
        </h3>
        <ul class="kommentare__liste">
            <?php
                wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 25,
            ) );
            ?>
        </ul>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="kommentare__geschlossen">
            <?php _e( 'Die Kommentare sind geschlossen.' ); ?>
        </p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
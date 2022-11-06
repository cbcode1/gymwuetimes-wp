<?php

// CSS einbinden
function gymwuetimes_css_js() {
    wp_enqueue_style( 'gwt', get_stylesheet_uri() );
    wp_enqueue_style( 'gwt-mobile', get_template_directory_uri() . '/mobile.css');
    wp_enqueue_style( 'gwt-print', get_template_directory_uri() . '/print.css');
    wp_enqueue_script( 'gwtscript', get_template_directory_uri() . '/gwt.js');
}
add_action( 'wp_enqueue_scripts', 'gymwuetimes_css_js' );

function gymwuetimes_fonts() {
    wp_register_style( 'fonts', get_theme_mod('gymwuetimes_schriftart_link', get_template_directory_uri() . '/fonts.css') );
	wp_enqueue_style( 'fonts' );
    wp_register_style( 'icons', get_template_directory_uri() . '/icons/css/all.min.css');
    wp_enqueue_style( 'icons' );
}
add_action('wp_print_styles', 'gymwuetimes_fonts');

// WordPress Titel
add_theme_support( 'title-tag' );

// Beitragsbilder
add_theme_support( 'post-thumbnails' );

// Artikel-Auszüge verkürzen
add_filter( 'excerpt_length', function($length) {
    return 30;
} );

// Widgets anzeigen
function gwt_register_sidebars() {
    register_sidebar(
        array(
            'id'            => 'gwt_post-sidebar',
            'name'          => __( 'Seitenleiste Posts' ),
            'description'   => __( 'Widgets in diesem Bereich werden rechts neben Artikeln angezeigt.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action("widgets_init", "gwt_register_sidebars");

// Anderer Text im "Antworten" Button bei den Kommentaren
function gwt_comment_reply_text( $link ) {
    $link = str_replace( 'Antworten', '<i class="fas fa-reply comment-reply-link__icon"></i> Antworten', $link );
    return $link;
}
add_filter( 'comment_reply_link', 'gwt_comment_reply_text' );


// Custom Posts
function gymwuetimes_custom_posts() {
    register_post_type( 'ausgaben',
        array(
            'labels'        => array(
                'name'          => __( 'Ausgaben' ),
                'singular_name' => __( 'Ausgaben' ),
            ),
            'public'        => true,
            'has_archive'   => true,
            'supports'      => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'custom-fields',
            ),
        ) );
}
add_action( 'init', 'gymwuetimes_custom_posts' );


// Funktionen im WordPress-Theme-Customizer
function gymwuetimes_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_section( 'gymwuetimes_farben' , array(
        'title'      => __( 'Farben', 'gymwuetimes' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'gymwuetimes_farben_akzent_hell' , array(
        'default'   => '#f1c85c',
    ) );

    $wp_customize->add_setting( 'gymwuetimes_farben_akzent_dunkel' , array(
        'default'   => '#5ba44f',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gymwuetimes_farben_akzent_hell', array(
        'label'      => __( 'Akzentfarbe (hell)', 'gymwuetimes' ),
        'section'    => 'gymwuetimes_farben',
        'settings'   => 'gymwuetimes_farben_akzent_hell',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gymwuetimes_farben_akzent_dunkel', array(
        'label'      => __( 'Akzentfarbe (dunkel)', 'gymwuetimes' ),
        'section'    => 'gymwuetimes_farben',
        'settings'   => 'gymwuetimes_farben_akzent_dunkel',
    ) ) );



    $wp_customize->add_section( 'gymwuetimes_schriftarten' , array(
        'title'      => __( 'Schriftarten', 'gymwuetimes' ),
        'priority'   => 31,
    ) );

    $wp_customize->add_setting( 'gymwuetimes_schriftart_link' );

    $wp_customize->add_control( 'gymwuetimes_schriftart_link', array(
        'label'      => __( 'Einbettungs-Link: Schriftarten', 'gymwuetimes' ),
        'description' => __( '<b>Wichtig:</b> In diesem Feld muss ein Link eingefügt werden, der auf die Schriftarten verweist.<br>Falls etwas schief gehen sollte, bitte den Inhalt der Box löschen, um sie zurückzusetzen.' ),
        'section'    => 'gymwuetimes_schriftarten',
        'type'       => 'textarea',
    ) );
 }
 add_action( 'customize_register', 'gymwuetimes_customize_register' );
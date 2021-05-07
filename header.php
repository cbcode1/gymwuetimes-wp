<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .farbmodus--hell {
            --akzent: <?php echo get_theme_mod('gymwuetimes_farben_akzent_hell', '#f1c85c'); ?>;
            --hintergrund: white;
            --text: black;
            --schatten: gray;
            --dezent: #ddd;
            --dezenter: #eee;
            --grau: #666;
        }
        .farbmodus--dunkel {
            --akzent: <?php echo get_theme_mod('gymwuetimes_farben_akzent_dunkel', '#5ba44f'); ?>;
            --hintergrund: #181818;
            --text: white;
            --schatten: black;
            --dezent: #222;
            --dezenter: #222;
            --grau: #888;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body class="farbmodus--hell">
    <script>
        farbmodus = "hell";
        body = document.querySelector("body");
        if (localStorage.farbmodus == "dunkel") {
            farbmodusWechseln();
        }
    </script>
    <div class="seitenleiste seitenleiste--versteckt">
        <!-- <button class="seitenleiste__umschalten" onclick="seitenleisteEinfahren()"><i class="fas fa-chevron-left"></i></button> -->
        <a href="<?php echo get_bloginfo( 'wpurl' );?>" class="seitenleiste__start-link">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/logo.webp" class="seitenleiste__logo"
            alt="<?php echo get_bloginfo( 'name' ); ?>: <?php echo get_bloginfo( 'description' ); ?>" 
            title="<?php echo get_bloginfo( 'name' ); ?>: <?php echo get_bloginfo( 'description' ); ?>"
            height="130px">
        </a>
        <form role="search" method="get" id="searchform" action="<?php echo get_bloginfo( 'wpurl' );?>" class="seitenleiste__suche">
            <input type="text" placeholder="Suchen" spellcheck="false" name="s" id="s" autocomplete="off"
            value="<?php echo get_search_query(); ?>" class="seitenleiste__suche__suchfeld">
            <button type="submit" id="searchsubmit" class="seitenleiste__suche__button" aria-label="Suchen"><i class="fas fa-search"></i></button>
        </form>
        <nav class="seitenleiste__nav">
            <?php wp_nav_menu( array(
                "menu" => "Seiten",
                "container" => 0,
                "menu_class" => "seitenleiste__nav__liste"
            ) ); ?>
        </nav>
        <div class="seitenleiste__buttons">
            <a href="https://instagram.com/sz.gwt">
                <div class="seitenleiste__buttons__instagram">
                    <i class="fab fa-instagram"></i>
                </div>
            </a>
            <div class="seitenleiste__buttons__dark-mode" onclick="farbmodusWechseln()">
                <i class="fas fa-adjust"></i>
            </div>
        </div>
        <footer class="seitenleiste__footer">
            © <?php echo get_bloginfo( 'name' ); ?> <?php echo date("Y"); ?><br/>
            <?php wp_nav_menu( array(
                "menu" => "Rechtliches",
                "container" => 0,
                "after" => "<span> | </span>",
            ) ); ?>
        </footer>
    </div>

    <div class="inhalt">
        <div class="inhalt__mobil-header mobile-only">
            <!-- Logo mobil -->
            <a href="<?php echo get_bloginfo( 'wpurl' );?>">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/logo.webp" class="seitenleiste__logo"
                alt="<?php echo get_bloginfo( 'name' ); ?>: <?php echo get_bloginfo( 'description' ); ?>" 
                title="<?php echo get_bloginfo( 'name' ); ?>: <?php echo get_bloginfo( 'description' ); ?>">
            </a>

            <div class="inhalt__mobil-header__nav">
                <button class="inhalt__mobil-header__nav__button inhalt__mobil-header__nav__button--menu" onclick="seitenleisteZeigen()">
                    <i class="fas fa-bars"></i>
                    <span class="font1">Menü</span>
                </button>

                <button class="inhalt__mobil-header__nav__button inhalt__mobil-header__nav__button--share" onclick="share()">
                    <i class="fas fa-share-alt"></i>
                </button>
            </div>
        
            <div class="inhalt__overlay" onclick="seitenleisteVerstecken()"></div>
        </div>
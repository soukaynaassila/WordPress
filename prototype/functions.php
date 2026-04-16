<?php
/**
 * Mon Portfolio - Theme Functions
 *
 * @package mon-portfolio
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sécurité : empêche l'accès direct
}

// ============================================================
// CONSTANTES DU THÈME
// ============================================================
define( 'MON_PORTFOLIO_VERSION', '1.0.0' );
define( 'MON_PORTFOLIO_DIR', get_template_directory() );
define( 'MON_PORTFOLIO_URI', get_template_directory_uri() );


// ============================================================
// CONFIGURATION DU THÈME
// ============================================================
function mon_portfolio_setup() {

    // Support de la traduction
    load_theme_textdomain( 'mon-portfolio', MON_PORTFOLIO_DIR . '/languages' );

    // Support des formats de post
    add_theme_support( 'post-formats', array( 'post', 'image', 'gallery' ) );

    // Balises de titre automatiques (HTML <title>)
    add_theme_support( 'title-tag' );

    // Support des images mises en avant
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 630, true );

    // Support du logo personnalisé
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Support de l'éditeur Gutenberg
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );

    // Couleurs de l'éditeur
    add_theme_support( 'editor-color-palette', array(
        array( 'name' => 'Violet principal', 'slug' => 'primary',   'color' => '#6C63FF' ),
        array( 'name' => 'Bleu secondaire',  'slug' => 'secondary', 'color' => '#48CAE4' ),
        array( 'name' => 'Texte',            'slug' => 'dark',      'color' => '#2D3436' ),
        array( 'name' => 'Texte clair',      'slug' => 'muted',     'color' => '#636E72' ),
        array( 'name' => 'Fond',             'slug' => 'light',     'color' => '#F8F9FA' ),
    ) );

    // HTML5 semantique
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ) );

    // Flux RSS automatiques
    add_theme_support( 'automatic-feed-links' );

    // Taille d'image ajoutée
    add_image_size( 'portfolio-thumbnail', 600, 400, true );

    // Enregistrement des emplacements de menu
    register_nav_menus( array(
        'primary' => __( 'Menu principal', 'mon-portfolio' ),
        'footer'  => __( 'Menu pied de page', 'mon-portfolio' ),
    ) );
}
add_action( 'after_setup_theme', 'mon_portfolio_setup' );


// ============================================================
// LARGEUR DU CONTENU
// ============================================================
function mon_portfolio_content_width() {
    $GLOBALS['content_width'] = 1140;
}
add_action( 'after_setup_theme', 'mon_portfolio_content_width', 0 );


// ============================================================
// CHARGEMENT DES SCRIPTS ET STYLES
// ============================================================
function mon_portfolio_scripts() {

    // Feuille de style principale (style.css)
    wp_enqueue_style(
        'mon-portfolio-style',
        get_stylesheet_uri(),
        array(),
        MON_PORTFOLIO_VERSION
    );

    // Script principal du thème
    wp_enqueue_script(
        'mon-portfolio-main',
        MON_PORTFOLIO_URI . '/js/main.js',
        array(),
        MON_PORTFOLIO_VERSION,
        true // Chargement en pied de page
    );

    // Données passées au JS
    wp_localize_script( 'mon-portfolio-main', 'monPortfolio', array(
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'mon_portfolio_nonce' ),
        'siteUrl'  => esc_url( home_url() ),
    ) );

    // Script commentaires
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mon_portfolio_scripts' );


// ============================================================
// ZONES DE WIDGETS (SIDEBARS)
// ============================================================
function mon_portfolio_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Barre latérale', 'mon-portfolio' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Ajoutez des widgets ici.', 'mon-portfolio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Pied de page', 'mon-portfolio' ),
        'id'            => 'footer-1',
        'description'   => __( 'Zone widget pied de page.', 'mon-portfolio' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mon_portfolio_widgets_init' );


// ============================================================
// PAGE D'ACCUEIL STATIQUE (Configuration automatique)
// ============================================================
function mon_portfolio_setup_homepage() {

    // Crée les pages si elles n'existent pas encore
    $pages = array(
        'accueil'  => array(
            'title'    => 'Accueil',
            'template' => 'front-page.php',
            'content'  => '',
        ),
        'a-propos' => array(
            'title'    => 'À propos',
            'template' => 'page-a-propos.php',
            'content'  => '',
        ),
        'contact'  => array(
            'title'    => 'Contact',
            'template' => 'page-contact.php',
            'content'  => '',
        ),
    );

    foreach ( $pages as $slug => $page_data ) {
        $existing = get_page_by_path( $slug );
        if ( ! $existing ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $page_data['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => $page_data['content'],
            ) );

            // Assigner le template de page
            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
            }
        }
    }

    // Configurer la page d'accueil statique
    $homepage = get_page_by_path( 'accueil' );
    if ( $homepage && get_option( 'page_on_front' ) != $homepage->ID ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $homepage->ID );
    }
}
add_action( 'after_switch_theme', 'mon_portfolio_setup_homepage' );


// ============================================================
// LONGUEUR DE L'EXTRAIT
// ============================================================
function mon_portfolio_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mon_portfolio_excerpt_length', 999 );

function mon_portfolio_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'mon_portfolio_excerpt_more' );


// ============================================================
// WPCF7 / FORMULAIRE DE CONTACT (si plugin installé)
// ============================================================
add_filter( 'wpcf7_autop_or_not', '__return_false' );


// ============================================================
// SÉCURITÉ — Supprimer la version WordPress
// ============================================================
remove_action( 'wp_head', 'wp_generator' );

function mon_portfolio_remove_version( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'style_loader_src',  'mon_portfolio_remove_version', 9999 );
add_filter( 'script_loader_src', 'mon_portfolio_remove_version', 9999 );


// ============================================================
// MÉTA TITLES (SEO)
// ============================================================
function mon_portfolio_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
    $title .= get_bloginfo( 'name', 'display' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep " . $site_description;
    }
    return $title;
}
add_filter( 'wp_title', 'mon_portfolio_wp_title', 10, 2 );


// ============================================================
// CLASSE BODY PERSONNALISÉE
// ============================================================
function mon_portfolio_body_classes( $classes ) {
    if ( is_singular() && ! is_front_page() ) {
        $classes[] = 'single-page';
    }
    if ( is_front_page() ) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter( 'body_class', 'mon_portfolio_body_classes' );

<?php
/**
 * En-tête du site - header.php
 * Inclus sur toutes les pages via get_header()
 *
 * @package mon-portfolio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php
        if ( is_front_page() ) {
            echo esc_attr( get_bloginfo( 'description' ) );
        } elseif ( is_singular() ) {
            echo esc_attr( get_the_excerpt() );
        } else {
            echo esc_attr( get_bloginfo( 'description' ) );
        }
    ?>">
    <meta name="theme-color" content="#6C63FF">

    <!-- Open Graph -->
    <meta property="og:title"       content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?>">
    <meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?php echo esc_url( get_permalink() ); ?>">
    <meta property="og:site_name"   content="<?php bloginfo( 'name' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ===============================================
     SKIP TO CONTENT (Accessibilité)
=============================================== -->
<a class="sr-only" href="#main-content">Aller au contenu principal</a>

<!-- ===============================================
     EN-TÊTE PRINCIPAL
=============================================== -->
<header class="site-header" id="site-header" role="banner">
    <div class="container">
        <div class="header-inner">

            <!-- Branding / Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="site-branding"
               rel="home"
               aria-label="<?php bloginfo( 'name' ); ?> — Accueil">

                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="logo-mark" aria-hidden="true">MP</div>
                    <div>
                        <div class="site-title-text">
                            <?php bloginfo( 'name' ); ?>
                        </div>
                        <div class="site-tagline-text">
                            <?php bloginfo( 'description' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </a>

            <!-- Navigation principale -->
            <nav class="main-navigation" id="main-navigation" role="navigation" aria-label="Navigation principale">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'mon_portfolio_fallback_menu',
                ) );
                ?>

                <!-- CTA de navigation -->
                <div class="nav-cta">
                    <?php
                    $contact_page = get_page_by_path( 'contact' );
                    if ( $contact_page ) :
                    ?>
                    <a href="<?php echo esc_url( get_permalink( $contact_page->ID ) ); ?>"
                       class="btn btn--primary"
                       id="nav-contact-btn">
                        ✉&nbsp; Me contacter
                    </a>
                    <?php endif; ?>
                </div>
            </nav>

            <!-- Bouton menu mobile -->
            <button class="menu-toggle"
                    id="menu-toggle"
                    aria-controls="main-navigation"
                    aria-expanded="false"
                    aria-label="Ouvrir le menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div><!-- .header-inner -->
    </div><!-- .container -->
</header><!-- .site-header -->

<!-- ===============================================
     DÉBUT DU CONTENU PRINCIPAL
=============================================== -->
<main id="main-content" role="main">

<?php
/**
 * Menu de repli (fallback) si aucun menu n'est assigné
 */
function mon_portfolio_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Accueil</a></li>';
    $about   = get_page_by_path( 'a-propos' );
    $contact = get_page_by_path( 'contact' );
    if ( $about )   echo '<li><a href="' . esc_url( get_permalink( $about->ID ) )   . '">À propos</a></li>';
    if ( $contact ) echo '<li><a href="' . esc_url( get_permalink( $contact->ID ) ) . '">Contact</a></li>';
    echo '</ul>';
}

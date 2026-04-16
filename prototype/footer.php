<?php
/**
 * Pied de page du site - footer.php
 *
 * @package mon-portfolio
 */
?>

</main><!-- #main-content -->

<!-- ===============================================
     PIED DE PAGE
=============================================== -->
<footer class="site-footer" id="site-footer" role="contentinfo">
    <div class="container">

        <div class="footer-grid">

            <!-- Colonne 1 : Branding -->
            <div class="footer-col">
                <div class="site-branding" style="margin-bottom:0;">
                    <div class="logo-mark" aria-hidden="true">MP</div>
                    <div>
                        <div class="site-title-text"><?php bloginfo( 'name' ); ?></div>
                        <div class="site-tagline-text"><?php bloginfo( 'description' ); ?></div>
                    </div>
                </div>
                <p class="footer-desc">
                    Un portfolio minimaliste créé avec passion pour présenter mes projets 
                    et compétences en développement web.
                </p>
            </div>

            <!-- Colonne 2 : Navigation -->
            <div class="footer-col">
                <h3 class="footer-heading">Navigation</h3>
                <nav class="footer-links" aria-label="Liens pied de page">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'fallback_cb'    => 'mon_portfolio_footer_fallback',
                        'items_wrap'     => '%3$s',
                        'walker'         => new Mon_Portfolio_Footer_Walker(),
                    ) );
                    ?>
                </nav>
            </div>

            <!-- Colonne 3 : Contact rapide -->
            <div class="footer-col">
                <h3 class="footer-heading">Contact</h3>
                <div class="footer-links">
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>">
                        ✉&nbsp; Envoyer un message
                    </a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        🏠&nbsp; Page d'accueil
                    </a>
                    <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'a-propos' ) ) ); ?>">
                        👤&nbsp; À propos de moi
                    </a>
                </div>
            </div>

        </div><!-- .footer-grid -->

        <!-- Barre du bas -->
        <div class="footer-bottom">
            <p class="footer-copy">
                &copy; <?php echo date( 'Y' ); ?> 
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:rgba(255,255,255,0.55)">
                    <?php bloginfo( 'name' ); ?>
                </a>. 
                Tous droits réservés.
            </p>
            <div class="footer-tech">
                <span>Propulsé par</span>
                <span class="badge-wp">WordPress</span>
                <span>&amp; créé avec ❤️</span>
            </div>
        </div>

    </div><!-- .container -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Walker personnalisé pour le menu du footer (liens plats sans <li>)
 */
class Mon_Portfolio_Footer_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $url    = $item->url    ? $item->url    : '#';
        $title  = $item->title  ? $item->title  : '';
        $output .= '<a href="' . esc_url( $url ) . '">' . esc_html( $title ) . '</a>';
    }
    function start_lvl( &$output, $depth = 0, $args = null ) {}
    function end_lvl( &$output, $depth = 0, $args = null ) {}
    function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

/**
 * Fallback menu footer
 */
function mon_portfolio_footer_fallback() {
    $about   = get_page_by_path( 'a-propos' );
    $contact = get_page_by_path( 'contact' );
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">Accueil</a>';
    if ( $about )   echo '<a href="' . esc_url( get_permalink( $about->ID ) )   . '">À propos</a>';
    if ( $contact ) echo '<a href="' . esc_url( get_permalink( $contact->ID ) ) . '">Contact</a>';
}

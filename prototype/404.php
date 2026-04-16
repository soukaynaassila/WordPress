<?php
/**
 * Page 404 - 404.php
 *
 * @package mon-portfolio
 */

get_header();
?>

<section class="section" style="text-align:center;min-height:60vh;display:flex;align-items:center;">
    <div class="container">
        <div style="font-size:6rem;margin-bottom:1rem;" aria-hidden="true">😕</div>
        <span class="section-label">Erreur 404</span>
        <h1 class="section-title" style="margin-top:12px;">Page introuvable</h1>
        <p class="section-subtitle" style="margin:0 auto 2rem;">
            Oups ! La page que vous cherchez n'existe pas ou a été déplacée.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
                🏠 Retour à l'accueil
            </a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="btn btn--outline">
                ✉ Me contacter
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

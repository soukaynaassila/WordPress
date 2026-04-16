<?php
/**
 * Page générique - page.php
 * Utilisé pour les pages WordPress sans template spécifique.
 *
 * @package mon-portfolio
 */

get_header();
?>

<!-- En-tête de page -->
<div class="page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<!-- Contenu de la page -->
<div class="post-content">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</div>

<?php get_footer(); ?>

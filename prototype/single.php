<?php
/**
 * Template d'article individuel - single.php
 *
 * @package mon-portfolio
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<div class="post-content" id="post-<?php the_ID(); ?>">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <p style="font-size:0.85rem;color:var(--color-text-muted);margin-bottom:2rem;">
            Publié le <?php the_date(); ?> · <?php the_author(); ?>
        </p>
        <?php
        the_content();
        the_post_navigation( array(
            'prev_text' => '← Article précédent',
            'next_text' => 'Article suivant →',
        ) );
    endwhile;
    ?>
</div>

<?php get_footer(); ?>

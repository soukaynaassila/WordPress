<?php
/**
 * Page de blog (index) - index.php
 * Affiché comme liste de posts ou fallback.
 *
 * @package mon-portfolio
 */

get_header();
?>

<div class="page-hero">
    <div class="container">
        <h1>Blog</h1>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="skills-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="skill-card" id="post-<?php the_ID(); ?>">
                        <div class="skill-name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <p class="skill-desc"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn--outline" style="padding:8px 18px;font-size:0.85rem;">
                            Lire la suite →
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            <div style="margin-top:40px;text-align:center;">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <div class="text-center">
                <p>Aucun article trouvé.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

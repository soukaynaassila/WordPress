<?php
/**
 * Page d'accueil - front-page.php
 * Affiché quand "Accueil" est définie comme page statique
 *
 * @package mon-portfolio
 */

get_header();
?>

<!-- ===============================================
     SECTION 1 : HERO
=============================================== -->
<section class="hero" id="hero" aria-label="Section héros">
    <div class="container">
        <div class="hero-content">

            <div class="hero-badge" role="status">
                Disponible pour des projets
            </div>

            <h1 class="hero-title">
                <span>Bienvenue sur</span>
                <span class="highlight">mon portfolio</span>
            </h1>

            <p class="hero-desc">
                Je suis un développeur web débutant passionné par la création 
                de sites modernes. Découvrez mes projets et compétences.
            </p>

            <div class="hero-actions">
                <a href="<?php
                    $projects_page = get_page_by_path('a-propos');
                    echo $projects_page ? esc_url(get_permalink($projects_page->ID)) : '#';
                ?>"
                   class="btn btn--light"
                   id="hero-btn-projects">
                    🚀 Voir mes projets
                </a>
                <a href="<?php
                    $contact_page = get_page_by_path('contact');
                    echo $contact_page ? esc_url(get_permalink($contact_page->ID)) : '#';
                ?>"
                   class="btn btn--outline"
                   style="--color-primary:#fff;border-color:rgba(255,255,255,0.5);color:#fff;"
                   id="hero-btn-contact">
                    ✉ Me contacter
                </a>
            </div>

        </div><!-- .hero-content -->
    </div><!-- .container -->

    <div class="hero-scroll" aria-hidden="true">
        <div class="scroll-line"></div>
        <span>Défiler</span>
    </div>
</section>

<!-- ===============================================
     SECTION 2 : STATISTIQUES
=============================================== -->
<section class="stats-bar" aria-label="Statistiques">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">3+</div>
                <div class="stat-label">Technologies maîtrisées</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Passion & motivation</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">∞</div>
                <div class="stat-label">Envie d'apprendre</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24h</div>
                <div class="stat-label">Temps de réponse</div>
            </div>
        </div>
    </div>
</section>

<!-- ===============================================
     SECTION 3 : INTRODUCTION
=============================================== -->
<section class="section section--alt" id="introduction" aria-label="Introduction">
    <div class="container">
        <div class="intro-grid">

            <!-- Visuel animé -->
            <div class="intro-visual" aria-hidden="true">
                <div class="intro-card">
                    <div class="intro-card-inner">
                        <div class="intro-card-icon">💻</div>
                        <div class="intro-card-title">Développeur Web</div>
                        <div class="intro-card-sub">HTML · CSS · WordPress</div>
                    </div>
                </div>

                <!-- Tags flottants -->
                <div class="floating-tag">
                    <span class="dot dot--green"></span>
                    <span>Disponible</span>
                </div>
                <div class="floating-tag">
                    <span class="dot dot--purple"></span>
                    <span>En formation</span>
                </div>
            </div>

            <!-- Texte -->
            <div class="intro-text">
                <span class="section-label">À propos de moi</span>
                <h2 class="section-title">
                    Passionné par le web &amp; le design
                </h2>
                <p class="section-subtitle">
                    Étudiant en développement web, je construis des sites modernes, 
                    accessibles et performants. J'apprends chaque jour de nouvelles 
                    technologies pour améliorer mes compétences.
                </p>
                <p style="color:var(--color-text-muted);font-size:0.95rem;line-height:1.8;margin-bottom:2rem;">
                    Mon objectif est de devenir un développeur web professionnel capable 
                    de créer des expériences numériques exceptionnelles. Je maîtrise 
                    HTML, CSS et WordPress, et j'explore JavaScript chaque jour.
                </p>
                <a href="<?php
                    $about = get_page_by_path('a-propos');
                    echo $about ? esc_url(get_permalink($about->ID)) : '#';
                ?>"
                   class="btn btn--primary"
                   id="intro-learn-more">
                    En savoir plus →
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ===============================================
     SECTION 4 : COMPÉTENCES
=============================================== -->
<section class="section" id="competences" aria-label="Compétences">
    <div class="container">

        <div class="text-center" style="margin-bottom:48px;">
            <span class="section-label">Mes outils</span>
            <h2 class="section-title">Compétences techniques</h2>
            <p class="section-subtitle">
                Les technologies que j'utilise pour construire des sites modernes et responsives.
            </p>
        </div>

        <div class="skills-grid">

            <!-- HTML -->
            <div class="skill-card">
                <div class="skill-icon">🌐</div>
                <div class="skill-name">HTML5</div>
                <p class="skill-desc">
                    Structure sémantique, accessibilité et bonnes pratiques du web moderne.
                </p>
                <div class="skill-bar-wrap" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="HTML5 - 75%">
                    <div class="skill-bar" data-percent="75"></div>
                </div>
                <small style="color:var(--color-text-muted);font-size:0.8rem;margin-top:8px;display:block;">75% — Intermédiaire</small>
            </div>

            <!-- CSS -->
            <div class="skill-card">
                <div class="skill-icon">🎨</div>
                <div class="skill-name">CSS3</div>
                <p class="skill-desc">
                    Mise en page, animations, Flexbox, Grid et design responsive.
                </p>
                <div class="skill-bar-wrap" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" aria-label="CSS3 - 70%">
                    <div class="skill-bar" data-percent="70"></div>
                </div>
                <small style="color:var(--color-text-muted);font-size:0.8rem;margin-top:8px;display:block;">70% — Intermédiaire</small>
            </div>

            <!-- WordPress -->
            <div class="skill-card">
                <div class="skill-icon">🔷</div>
                <div class="skill-name">WordPress</div>
                <p class="skill-desc">
                    Thèmes, pages, menus, plugins et personnalisation du CMS.
                </p>
                <div class="skill-bar-wrap" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" aria-label="WordPress - 60%">
                    <div class="skill-bar" data-percent="60"></div>
                </div>
                <small style="color:var(--color-text-muted);font-size:0.8rem;margin-top:8px;display:block;">60% — Débutant avancé</small>
            </div>

        </div><!-- .skills-grid -->

    </div>
</section>

<!-- ===============================================
     SECTION 5 : APPEL À L'ACTION FINAL
=============================================== -->
<section class="section section--alt" aria-label="Appel à l'action">
    <div class="container text-center">
        <span class="section-label">Contactez-moi</span>
        <h2 class="section-title">Travaillons ensemble !</h2>
        <p class="section-subtitle">
            Vous avez un projet en tête ? N'hésitez pas à me contacter, 
            je serai ravi d'en discuter avec vous.
        </p>
        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
            <a href="<?php
                $contact = get_page_by_path('contact');
                echo $contact ? esc_url(get_permalink($contact->ID)) : '#';
            ?>"
               class="btn btn--primary"
               id="cta-contact-btn">
                ✉ Me contacter
            </a>
            <a href="<?php
                $about = get_page_by_path('a-propos');
                echo $about ? esc_url(get_permalink($about->ID)) : '#';
            ?>"
               class="btn btn--outline"
               id="cta-about-btn">
                👤 À propos de moi
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

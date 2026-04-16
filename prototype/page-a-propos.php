<?php
/**
 * Page "À propos" - page-a-propos.php
 * Template Name: Page À propos
 *
 * @package mon-portfolio
 */

get_header();
?>

<!-- ===============================================
     HERO
=============================================== -->
<div class="about-hero" aria-label="En-tête à propos">
    <div class="container">
        <div class="about-hero-content">
            <span class="section-label" style="background:rgba(255,255,255,0.2);color:#fff;">
                Mon histoire
            </span>
            <h1 class="about-hero-title">À propos de moi</h1>
            <p class="about-hero-sub">
                Apprendre, créer, progresser — voilà ma philosophie.
            </p>
        </div>
    </div>
</div>

<!-- ===============================================
     PROFIL
=============================================== -->
<section class="section section--alt" aria-label="Profil">
    <div class="container">

        <div class="profile-card">

            <div class="profile-avatar" aria-hidden="true">👨‍💻</div>

            <div class="profile-info">
                <h2>Développeur Web en Formation</h2>
                <p class="profile-role">🎓 Étudiant · HTML · CSS · WordPress</p>
                <p class="profile-bio">
                    Je suis soukayna assila ,je suis étudiant en développement web, passionné par la conception 
                    de sites modernes et accessibles. Chaque projet est pour moi une 
                    opportunité d'apprendre, de m'améliorer et de créer quelque chose 
                    de beau et fonctionnel.
                </p>
                <p class="profile-bio">
                    Je maîtrise les bases du HTML, du CSS et de WordPress, et je 
                    continue à explorer JavaScript et les frameworks modernes. 
                    Mon objectif est de devenir un développeur web professionnel 
                    capable de relever tous types de défis.
                </p>
                <div style="display:flex;gap:12px;margin-top:1.5rem;flex-wrap:wrap;">
                    <a href="<?php
                        $contact = get_page_by_path('contact');
                        echo $contact ? esc_url(get_permalink($contact->ID)) : '#';
                    ?>"
                       class="btn btn--primary"
                       id="about-contact-btn">
                        ✉ Me contacter
                    </a>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       class="btn btn--outline"
                       id="about-home-btn">
                        ← Retour à l'accueil
                    </a>
                </div>
            </div>

        </div><!-- .profile-card -->

        <!-- Grille d'infos -->
        <div class="about-grid">

            <!-- Compétences -->
            <div class="info-card" id="competences-card">
                <div class="info-card-header">
                    <div class="info-card-icon">🛠</div>
                    <h3 class="info-card-title">Compétences</h3>
                </div>
                <ul class="info-list" role="list">
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span><strong>HTML5</strong> — Structure sémantique &amp; accessibilité</span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span><strong>CSS3</strong> — Design responsive &amp; animations</span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span><strong>WordPress</strong> — Thèmes, pages &amp; plugins</span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span><strong>JavaScript</strong> — Bases &amp; manipulation du DOM</span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span><strong>Git</strong> — Versioning &amp; collaboration</span>
                    </li>
                </ul>
            </div>

            <!-- Objectifs -->
            <div class="info-card" id="objectifs-card">
                <div class="info-card-header">
                    <div class="info-card-icon">🎯</div>
                    <h3 class="info-card-title">Objectifs</h3>
                </div>
                <ul class="info-list" role="list">
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span>Devenir <strong>développeur web professionnel</strong></span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span>Maîtriser <strong>JavaScript &amp; React</strong></span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span>Créer des <strong>expériences utilisateur</strong> exceptionnelles</span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span>Contribuer à des <strong>projets open source</strong></span>
                    </li>
                    <li>
                        <span class="bullet" aria-hidden="true"></span>
                        <span>Obtenir mon <strong>premier emploi</strong> en développement web</span>
                    </li>
                </ul>
            </div>

        </div><!-- .about-grid -->

    </div><!-- .container -->
</section>

<!-- ===============================================
     PARCOURS
=============================================== -->
<section class="section" aria-label="Parcours d'apprentissage">
    <div class="container">

        <div class="text-center" style="margin-bottom:48px;">
            <span class="section-label">Mon parcours</span>
            <h2 class="section-title">Étapes d'apprentissage</h2>
            <p class="section-subtitle">
                Mon évolution en tant que développeur web débutant.
            </p>
        </div>

        <div style="max-width:640px;margin:0 auto;">
            <div class="timeline">

                <div class="timeline-item">
                    <div class="timeline-date">Début 2025</div>
                    <div class="timeline-title">Découverte du HTML &amp; CSS</div>
                    <p class="timeline-desc">
                        Premiers pas dans le développement web. Apprentissage 
                        des bases de la structure et du style des pages.
                    </p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-date">Mi-2025</div>
                    <div class="timeline-title">Premières pages web</div>
                    <p class="timeline-desc">
                        Création de projets personnels simples : pages statiques, 
                        formulaires, et mises en page responsives.
                    </p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-date">Fin 2025</div>
                    <div class="timeline-title">Introduction à WordPress</div>
                    <p class="timeline-desc">
                        Découverte du CMS le plus populaire au monde. 
                        Installation, thèmes, plugins et customisation.
                    </p>
                </div>

                <div class="timeline-item">
                    <div class="timeline-date">2026</div>
                    <div class="timeline-title">Portfolio professionnel</div>
                    <p class="timeline-desc">
                        Création de ce portfolio pour présenter mes compétences 
                        et projets. Objectif : mon premier emploi en développement web.
                    </p>
                </div>

            </div><!-- .timeline -->
        </div>

        <!-- CTA -->
        <div class="text-center" style="margin-top:48px;">
            <a href="<?php
                $contact = get_page_by_path('contact');
                echo $contact ? esc_url(get_permalink($contact->ID)) : '#';
            ?>"
               class="btn btn--primary"
               id="about-cta-btn">
                ✉ Me contacter →
            </a>
        </div>

    </div>
</section>

<?php get_footer(); ?>

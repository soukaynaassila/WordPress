<?php
/**
 * Page "Contact" - page-contact.php
 * Template Name: Page Contact
 *
 * @package mon-portfolio
 */

get_header();
?>

<!-- ===============================================
     HERO CONTACT
=============================================== -->
<div class="contact-hero" aria-label="En-tête Contact">
    <div class="container" style="position:relative;z-index:1;">
        <span class="section-label" style="background:rgba(255,255,255,0.2);color:#fff;margin-bottom:16px;display:inline-block;">
            Restons en contact
        </span>
        <h1 class="contact-hero-title">Me contacter</h1>
        <p class="contact-hero-sub">
            N'hésitez pas à me contacter pour vos projets ou questions.
        </p>
    </div>
</div>

<!-- ===============================================
     SECTION PRINCIPALE
=============================================== -->
<section class="section" aria-label="Formulaire de contact">
    <div class="container">

        <div class="contact-layout">

            <!-- Informations de contact -->
            <div class="contact-info">
                <h2>Parlons de votre projet</h2>
                <p>
                    Que vous ayez une question, un projet en tête, ou simplement 
                    envie d'échanger sur le développement web — je suis là. 
                    Remplissez le formulaire et je reviendrai vers vous 
                    dans les 24 heures.
                </p>

                <div class="contact-methods" role="list">

                    <div class="contact-method" role="listitem">
                        <div class="contact-method-icon" aria-hidden="true">✉</div>
                        <div>
                            <div class="contact-method-label">Email</div>
                            <div class="contact-method-value">contact@monportfolio.fr</div>
                        </div>
                    </div>

                    <div class="contact-method" role="listitem">
                        <div class="contact-method-icon" aria-hidden="true">📍</div>
                        <div>
                            <div class="contact-method-label">Localisation</div>
                            <div class="contact-method-value">France — En télétravail</div>
                        </div>
                    </div>

                    <div class="contact-method" role="listitem">
                        <div class="contact-method-icon" aria-hidden="true">⏱</div>
                        <div>
                            <div class="contact-method-label">Disponibilité</div>
                            <div class="contact-method-value">Lun → Ven, 9h → 18h</div>
                        </div>
                    </div>

                    <div class="contact-method" role="listitem">
                        <div class="contact-method-icon" aria-hidden="true">💬</div>
                        <div>
                            <div class="contact-method-label">Réponse sous</div>
                            <div class="contact-method-value">24 heures maximum</div>
                        </div>
                    </div>

                </div><!-- .contact-methods -->
            </div>

            <!-- Formulaire -->
            <div class="contact-form-wrap">

                <?php
                // Si Contact Form 7 est installé, utiliser son shortcode
                if ( function_exists( 'wpcf7_enqueue_scripts' ) ) :
                    // Remplacez "123" par l'ID réel de votre formulaire CF7
                    echo do_shortcode( '[contact-form-7 id="123" title="Formulaire de contact"]' );
                else :
                // Sinon, formulaire HTML natif
                ?>

                <h3>Envoyer un message</h3>
                <p>Tous les champs marqués d'un <span style="color:var(--color-accent)">*</span> sont obligatoires.</p>

                <form id="contact-form"
                      class="contact-form"
                      action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
                      method="POST"
                      novalidate
                      aria-label="Formulaire de contact">

                    <?php wp_nonce_field( 'contact_form_nonce', 'contact_nonce' ); ?>
                    <input type="hidden" name="action" value="mon_portfolio_contact">

                    <div class="form-grid">

                        <div class="form-group">
                            <label class="form-label" for="contact-name">
                                Nom <span style="color:var(--color-accent)" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="text"
                                id="contact-name"
                                name="contact_name"
                                class="form-control"
                                placeholder="Votre nom"
                                required
                                autocomplete="name"
                                minlength="2"
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="contact-email">
                                Email <span style="color:var(--color-accent)" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="email"
                                id="contact-email"
                                name="contact_email"
                                class="form-control"
                                placeholder="votre@email.com"
                                required
                                autocomplete="email"
                            >
                        </div>

                        <div class="form-group form-group--full">
                            <label class="form-label" for="contact-subject">
                                Sujet <span style="color:var(--color-accent)" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="text"
                                id="contact-subject"
                                name="contact_subject"
                                class="form-control"
                                placeholder="À propos de votre projet..."
                                required
                                minlength="4"
                            >
                        </div>

                        <div class="form-group form-group--full">
                            <label class="form-label" for="contact-message">
                                Message <span style="color:var(--color-accent)" aria-hidden="true">*</span>
                            </label>
                            <textarea
                                id="contact-message"
                                name="contact_message"
                                class="form-control"
                                placeholder="Décrivez votre projet, votre question ou votre demande..."
                                required
                                rows="5"
                                minlength="20"
                                aria-describedby="message-hint"
                            ></textarea>
                            <small id="message-hint" style="color:var(--color-text-muted);font-size:0.8rem;">
                                Minimum 20 caractères.
                            </small>
                        </div>

                    </div><!-- .form-grid -->

                    <button type="submit" class="form-submit" id="contact-submit-btn">
                        ✉ Envoyer le message
                    </button>

                    <p class="form-notice">
                        Tous vos messages sont lus et répondus dans les 24h.
                    </p>

                </form>

                <?php endif; ?>

            </div><!-- .contact-form-wrap -->

        </div><!-- .contact-layout -->

    </div><!-- .container -->
</section>

<!-- ===============================================
     FAQ RAPIDE
=============================================== -->
<section class="section section--alt" aria-label="Questions fréquentes">
    <div class="container">

        <div class="text-center" style="margin-bottom:40px;">
            <span class="section-label">FAQ</span>
            <h2 class="section-title">Questions fréquentes</h2>
        </div>

        <div class="about-grid" style="max-width:900px;margin:0 auto;">

            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-card-icon">💼</div>
                    <h3 class="info-card-title">Quel type de projets ?</h3>
                </div>
                <p style="font-size:0.9rem;color:var(--color-text-muted);">
                    Je travaille sur des sites vitrines, portfolios, blogs WordPress 
                    et pages HTML/CSS statiques. Tous types de projets débutants 
                    ou intermédiaires.
                </p>
            </div>

            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-card-icon">⏳</div>
                    <h3 class="info-card-title">Quels délais ?</h3>
                </div>
                <p style="font-size:0.9rem;color:var(--color-text-muted);">
                    Cela dépend de la complexité du projet. En général, je réponds 
                    sous 24h et fournis une estimation de délai dès le premier échange.
                </p>
            </div>

        </div>

    </div>
</section>

<?php get_footer(); ?>

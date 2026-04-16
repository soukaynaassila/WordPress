/**
 * Mon Portfolio - Main JavaScript
 *
 * @package mon-portfolio
 * @version 1.0.0
 */

(function () {
  'use strict';

  // =============================================================
  // DOM READY
  // =============================================================
  document.addEventListener('DOMContentLoaded', function () {

    initMobileMenu();
    initStickyHeader();
    initSkillBars();
    initScrollAnimations();
    initSmoothScroll();

  });

  // =============================================================
  // MENU MOBILE
  // =============================================================
  function initMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    const nav    = document.getElementById('main-navigation');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));
      toggle.setAttribute('aria-label', isOpen ? 'Fermer le menu' : 'Ouvrir le menu');

      // Empêcher le scroll du body quand le menu est ouvert
      document.body.style.overflow = isOpen ? 'hidden' : '';

      // Animation des barres du hamburger
      const bars = toggle.querySelectorAll('span');
      if (isOpen) {
        bars[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        bars[1].style.opacity   = '0';
        bars[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
      } else {
        bars[0].style.transform = '';
        bars[1].style.opacity   = '';
        bars[2].style.transform = '';
      }
    });

    // Fermer le menu en cliquant sur un lien
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Ouvrir le menu');
        document.body.style.overflow = '';
        const bars = toggle.querySelectorAll('span');
        bars[0].style.transform = '';
        bars[1].style.opacity   = '';
        bars[2].style.transform = '';
      });
    });

    // Fermer avec la touche Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // =============================================================
  // EN-TÊTE COLLANT — Ombre au défilement
  // =============================================================
  function initStickyHeader() {
    const header = document.getElementById('site-header');
    if (!header) return;

    let lastScroll = 0;

    window.addEventListener('scroll', function () {
      const currentScroll = window.pageYOffset;

      if (currentScroll > 10) {
        header.style.boxShadow = '0 4px 32px rgba(108,99,255,0.12)';
      } else {
        header.style.boxShadow = '';
      }

      lastScroll = currentScroll;
    }, { passive: true });
  }

  // =============================================================
  // BARRES DE COMPÉTENCES ANIMÉES
  // =============================================================
  function initSkillBars() {
    const bars = document.querySelectorAll('.skill-bar');
    if (!bars.length) return;

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          const bar     = entry.target;
          const percent = bar.getAttribute('data-percent') || '0';
          bar.style.width = percent + '%';
          observer.unobserve(bar);
        }
      });
    }, { threshold: 0.3 });

    bars.forEach(function (bar) {
      bar.style.width = '0%';
      observer.observe(bar);
    });
  }

  // =============================================================
  // ANIMATIONS AU DÉFILEMENT (fade-in)
  // =============================================================
  function initScrollAnimations() {
    const elements = document.querySelectorAll(
      '.skill-card, .stat-item, .info-card, .contact-method, .profile-card, .floating-tag'
    );
    if (!elements.length) return;

    // Style initial
    elements.forEach(function (el, i) {
      el.style.opacity   = '0';
      el.style.transform = 'translateY(24px)';
      el.style.transition = 'opacity 0.6s ease ' + (i * 0.08) + 's, transform 0.6s ease ' + (i * 0.08) + 's';
    });

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity   = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    elements.forEach(function (el) { observer.observe(el); });
  }

  // =============================================================
  // DÉFILEMENT FLUIDE POUR LES ANCRES
  // =============================================================
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  }

  // =============================================================
  // FORMULAIRE DE CONTACT — Validation basique
  // =============================================================
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const btn     = contactForm.querySelector('.form-submit');
      const notice  = contactForm.querySelector('.form-notice');
      const original = btn.textContent;

      // Animation d'envoi
      btn.textContent = '⏳ Envoi en cours...';
      btn.disabled    = true;

      // Simuler envoi (à remplacer par fetch/AJAX WordPress réel)
      setTimeout(function () {
        btn.textContent = '✅ Message envoyé !';
        btn.style.background = 'linear-gradient(135deg, #00C896, #00A876)';
        if (notice) {
          notice.textContent = 'Merci ! Je reviendrai vers vous très prochainement.';
          notice.style.color = '#00C896';
        }
        contactForm.reset();
        setTimeout(function () {
          btn.textContent   = original;
          btn.style.background = '';
          btn.disabled      = false;
          if (notice) {
            notice.textContent = 'Tous vos messages sont lus et répondus dans les 24h.';
            notice.style.color = '';
          }
        }, 4000);
      }, 1800);
    });
  }

})();

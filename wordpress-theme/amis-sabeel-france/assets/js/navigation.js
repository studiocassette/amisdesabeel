/**
 * Navigation functionality for Amis de Sabeel France theme
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

(function() {
    'use strict';

    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.querySelector('.mobile-menu-toggle .menu-icon');
    const closeIcon = document.querySelector('.mobile-menu-toggle .close-icon');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';

            mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('is-open');

            if (menuIcon && closeIcon) {
                menuIcon.style.display = isExpanded ? 'block' : 'none';
                closeIcon.style.display = isExpanded ? 'none' : 'block';
            }

            document.body.classList.toggle('mobile-menu-open');
        });

        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                if (mobileMenu.classList.contains('is-open')) {
                    mobileMenu.classList.remove('is-open');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                    if (menuIcon && closeIcon) {
                        menuIcon.style.display = 'block';
                        closeIcon.style.display = 'none';
                    }
                    document.body.classList.remove('mobile-menu-open');
                }
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
                mobileMenu.classList.remove('is-open');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                if (menuIcon && closeIcon) {
                    menuIcon.style.display = 'block';
                    closeIcon.style.display = 'none';
                }
                document.body.classList.remove('mobile-menu-open');
                mobileMenuToggle.focus();
            }
        });
    }

    const filterButtons = document.querySelectorAll('.filter-btn');
    const articles = document.querySelectorAll('.article-card[data-category]');

    if (filterButtons.length > 0 && articles.length > 0) {
        filterButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');

                filterButtons.forEach(function(btn) {
                    btn.classList.remove('active');
                });
                this.classList.add('active');

                articles.forEach(function(article) {
                    const articleCategory = article.getAttribute('data-category');

                    if (category === 'all' || articleCategory === category) {
                        article.style.display = '';
                        article.style.animation = 'fadeIn 0.3s ease';
                    } else {
                        article.style.display = 'none';
                    }
                });
            });
        });
    }

    const header = document.querySelector('.site-header');
    let lastScroll = 0;

    if (header) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll <= 0) {
                header.classList.remove('scroll-up');
                return;
            }

            if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
                header.classList.remove('scroll-up');
                header.classList.add('scroll-down');
            } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
                header.classList.remove('scroll-down');
                header.classList.add('scroll-up');
            }

            lastScroll = currentScroll;
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            if (href === '#' || href === '#0') {
                return;
            }

            const target = document.querySelector(href);

            if (target) {
                e.preventDefault();
                const headerOffset = header ? header.offsetHeight : 0;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    const newsletterForm = document.querySelector('.newsletter-form');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            const emailInput = this.querySelector('input[type="email"]');
            const submitButton = this.querySelector('button[type="submit"]');

            if (emailInput && submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<span>Envoi...</span>';
            }
        });
    }
})();

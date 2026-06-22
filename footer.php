<?php
/**
 * Footer template — FLCH UNMSM
 *
 * Orden correcto de recursos:
 *   1. <style>  — antes de los elementos que estiliza (evita FOUC en botones fixed)
 *   2. HTML     — footer, botones flotantes
 *   3. <script> — JS no bloqueante, antes de wp_footer
 *   4. wp_footer() — plugins y WP enqueue
 *   5. </body></html>
 *
 * @package LetrasFLCH
 */
?>

<!-- ═══════════════════════════════════════════════════════════
     ESTILOS DEL FOOTER (inline, antes del HTML que estilizan)
════════════════════════════════════════════════════════════ -->
<link rel="stylesheet" id="flch-footer-styles" href="<?php echo esc_url( get_template_directory_uri() . '/css/footer.css' ); ?>">

</main><!-- #main -->

<!-- ═══════════════════════════════════════════════════════════
     FOOTER INSTITUCIONAL
════════════════════════════════════════════════════════════ -->
<footer class="flch-footer" role="contentinfo">

    <div class="flch-footer__background" aria-hidden="true">
        <div class="flch-footer__blob flch-footer__blob--top-left"></div>
        <div class="flch-footer__blob flch-footer__blob--bottom-right"></div>
        <div class="flch-footer__pattern"></div>
    </div>

    <div class="flch-footer__accent-line" aria-hidden="true"></div>

    <div class="flch-footer__container">

        <!-- Grid principal — 4 columnas en desktop -->
        <div class="flch-footer__grid">

            <!-- COLUMNA 1: Identidad institucional -->
            <div class="flch-footer__column flch-footer__column--identity">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php else : ?>
                <div class="flch-footer__brand">
                    <div class="flch-footer__logo" aria-hidden="true">
                        <i class="fas fa-university flch-footer__logo-icon"></i>
                    </div>
                    <div class="flch-footer__title-group">
                        <span class="flch-footer__pretitle">Facultad de</span>
                        <span class="flch-footer__maintitle">Letras</span>
                    </div>
                </div>

                <p class="flch-footer__description">
                    <?php esc_html_e( 'Formando profesionales en humanidades con excelencia académica y compromiso social desde 1551. Decana de América.', 'letrasflch' ); ?>
                </p>

                <div class="flch-footer__accreditation">
                    <i class="fas fa-check-circle flch-footer__accreditation-icon" aria-hidden="true"></i>
                    <span class="flch-footer__accreditation-text"><?php esc_html_e( 'Acreditación Internacional', 'letrasflch' ); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <!-- COLUMNA 2: Publicaciones académicas -->
            <div class="flch-footer__column flch-footer__column--journals">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php else : ?>
                <h3 class="flch-footer__heading">
                    <i class="fas fa-book-open flch-footer__heading-icon" aria-hidden="true"></i>
                    <span><?php esc_html_e( 'Revistas Académicas', 'letrasflch' ); ?></span>
                </h3>

                <ul class="flch-footer__list">
                    <?php
                    $journals = array(
                        array( 'url' => 'https://revistaletras.unmsm.edu.pe/index.php/le',                                 'title' => 'Letras (Lima)',          'description' => 'Investigación literaria' ),
                        array( 'url' => 'https://rcllletras.unmsm.edu.pe/index.php/content',                               'title' => 'Crítica Literaria',      'description' => 'Estudios críticos' ),
                        array( 'url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/lenguaysociedad',            'title' => 'Lengua y Sociedad',      'description' => 'Lingüística aplicada' ),
                        array( 'url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/tesis',                      'title' => 'Tesis (Lima)',           'description' => 'Investigación académica' ),
                        array( 'url' => 'https://revistasinvestigacion.unmsm.edu.pe/index.php/letras',                     'title' => 'Escritura y Pensamiento', 'description' => 'Filosofía y letras' ),
                        array( 'url' => 'https://revistaazulletras.unmsm.edu.pe/index.php/azul/index',                     'title' => 'Azul',                   'description' => 'Creación literaria' ),
                    );
                    foreach ( $journals as $journal ) : ?>
                    <li class="flch-footer__list-item">
                        <a href="<?php echo esc_url( $journal['url'] ); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flch-footer__link">
                            <span class="flch-footer__link-bullet" aria-hidden="true"></span>
                            <span class="flch-footer__link-content">
                                <span class="flch-footer__link-title"><?php echo esc_html( $journal['title'] ); ?></span>
                                <span class="flch-footer__link-description"><?php echo esc_html( $journal['description'] ); ?></span>
                            </span>
                            <i class="fas fa-external-link-alt flch-footer__link-icon" aria-hidden="true"></i>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>

            <!-- COLUMNA 3: Programas y servicios -->
            <div class="flch-footer__column flch-footer__column--programs">
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                <?php else : ?>
                <h3 class="flch-footer__heading">
                    <i class="fas fa-graduation-cap flch-footer__heading-icon" aria-hidden="true"></i>
                    <span><?php esc_html_e( 'Programas', 'letrasflch' ); ?></span>
                </h3>

                <ul class="flch-footer__list flch-footer__list--compact">
                    <?php
                    $programs = array(
                        array( 'url' => 'https://ceidletras.unmsm.edu.pe/',                                                  'title' => 'Centro de Idiomas', 'icon' => 'fa-solid fa-language' ),
                        array( 'url' => 'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/',          'title' => 'OESI',              'icon' => 'fa-solid fa-certificate' ),
                        array( 'url' => 'https://posgradoletras.unmsm.edu.pe/',                                              'title' => 'Posgrado',          'icon' => 'fa-solid fa-graduation-cap' ),
                        array( 'url' => 'https://letras.unmsm.edu.pe/cerseu/',                                               'title' => 'CERSEU',            'icon' => 'fa-solid fa-hand-holding-heart' ),
                    );
                    foreach ( $programs as $program ) : ?>
                    <li class="flch-footer__list-item">
                        <a href="<?php echo esc_url( $program['url'] ); ?>"
                           class="flch-footer__link flch-footer__link--with-icon">
                            <i class="<?php echo esc_attr( $program['icon'] ); ?> flch-footer__link-icon-left" aria-hidden="true"></i>
                            <span class="flch-footer__link-title"><?php echo esc_html( $program['title'] ); ?></span>
                            <i class="fas fa-chevron-right flch-footer__link-arrow" aria-hidden="true"></i>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <div class="flch-footer__schedule">
                    <div class="flch-footer__schedule-icon" aria-hidden="true">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="flch-footer__schedule-info">
                        <span class="flch-footer__schedule-label"><?php esc_html_e( 'Horario de atención', 'letrasflch' ); ?></span>
                        <span class="flch-footer__schedule-time"><?php esc_html_e( 'Lunes a Viernes · 8:00 – 17:00', 'letrasflch' ); ?></span>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- COLUMNA 4: Contacto y redes -->
            <div class="flch-footer__column flch-footer__column--contact">
                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                <?php else : ?>
                <h3 class="flch-footer__heading">
                    <i class="fas fa-envelope flch-footer__heading-icon" aria-hidden="true"></i>
                    <span><?php esc_html_e( 'Contacto', 'letrasflch' ); ?></span>
                </h3>

                <ul class="flch-footer__contact-list">
                    <li class="flch-footer__contact-item">
                        <div class="flch-footer__contact-icon" aria-hidden="true">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <address class="flch-footer__contact-address">
                            Calle Germán Amézaga N° 375<br>
                            Lima, Perú
                        </address>
                    </li>
                    <li class="flch-footer__contact-item">
                        <div class="flch-footer__contact-icon" aria-hidden="true">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="mailto:informatica.letras@unmsm.edu.pe"
                           class="flch-footer__contact-email">
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </li>
                </ul>

                <div class="flch-footer__social">
                    <h4 class="flch-footer__social-heading"><?php esc_html_e( 'Síguenos en redes', 'letrasflch' ); ?></h4>
                    <div class="flch-footer__social-grid">
                        <a href="https://www.facebook.com/letrassanmarcos"
                           target="_blank" rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--facebook"
                           aria-label="<?php esc_attr_e( 'Facebook Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/letrasunmsm/"
                           target="_blank" rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--instagram"
                           aria-label="<?php esc_attr_e( 'Instagram Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.youtube.com/@LetrasTV-p9j"
                           target="_blank" rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--youtube"
                           aria-label="<?php esc_attr_e( 'YouTube Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="https://pe.linkedin.com/school/letrasunmsm/"
                           target="_blank" rel="noopener noreferrer"
                           class="flch-footer__social-link flch-footer__social-link--linkedin"
                           aria-label="<?php esc_attr_e( 'LinkedIn Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div><!-- /.flch-footer__grid -->

        <!-- Menú de navegación del footer -->
        <?php
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'container'      => 'nav',
            'container_class'=> 'flch-footer__nav',
            'container_id'   => 'footer-nav',
            'menu_class'     => 'menu',
            'fallback_cb'    => false,
            'depth'          => 1,
            'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="' . esc_attr__( 'Menú footer', 'letrasflch' ) . '">%3$s</ul>',
        ) );
        ?>

        <!-- Barra inferior: copyright -->
        <div class="flch-footer__bottom">
            <div class="flch-footer__bottom-container">
                <p class="flch-footer__copyright">
                    &copy; <?php echo esc_html( (int) date( 'Y' ) ); ?>
                    <strong class="flch-footer__copyright-highlight">
                        <?php esc_html_e( 'Facultad de Letras y Ciencias Humanas', 'letrasflch' ); ?>
                    </strong>
                </p>

                <span class="flch-footer__separator" aria-hidden="true"></span>

                <p class="flch-footer__rights">
                    <?php esc_html_e( 'Universidad Nacional Mayor de San Marcos', 'letrasflch' ); ?>
                </p>

                <span class="flch-footer__separator flch-footer__separator--mobile-hidden" aria-hidden="true"></span>

                <p class="flch-footer__unmsm">
                    <?php esc_html_e( 'Decana de América', 'letrasflch' ); ?>
                </p>
            </div>
        </div>

    </div><!-- /.flch-footer__container -->
</footer>

<!-- ─── Botón WhatsApp ─────────────────────────────────────── -->
<a href="https://wa.me/51982086285?text=Hola,%20deseo%20informaci%C3%B3n%20sobre%20la%20facultad"
   class="flch-whatsapp"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="<?php esc_attr_e( 'Contactar por WhatsApp', 'letrasflch' ); ?>">
    <div class="flch-whatsapp__ripple"   aria-hidden="true"></div>
    <div class="flch-whatsapp__ripple-2" aria-hidden="true"></div>
    <div class="flch-whatsapp__button">
        <i class="fab fa-whatsapp flch-whatsapp__icon" aria-hidden="true"></i>
    </div>
    <span class="flch-whatsapp__tooltip" role="tooltip"><?php esc_html_e( '¿Necesitas ayuda?', 'letrasflch' ); ?></span>
</a>

<!-- ─── Botón Volver arriba ───────────────────────────────── -->
<button id="flch-back-to-top"
        class="flch-backtotop"
        type="button"
        aria-label="<?php esc_attr_e( 'Volver al inicio de la página', 'letrasflch' ); ?>">
    <i class="fas fa-arrow-up flch-backtotop__icon" aria-hidden="true"></i>
    <svg class="flch-backtotop__progress" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
        <circle class="flch-backtotop__progress-bg"   cx="24" cy="24" r="22"></circle>
        <circle class="flch-backtotop__progress-fill" cx="24" cy="24" r="22" id="flch-progress-circle"></circle>
    </svg>
</button>

<!-- ─── JavaScript del footer (antes de wp_footer) ────────── -->
<script>
(function () {
    'use strict';

    function initFooter() {
        initBackToTop();
        initReducedMotion();
    }

    function initBackToTop() {
        var btn    = document.getElementById('flch-back-to-top');
        var circle = document.getElementById('flch-progress-circle');
        if (!btn || !circle) return;

        var radius       = 22;
        var circumference = 2 * Math.PI * radius;
        circle.style.strokeDasharray  = circumference;
        circle.style.strokeDashoffset = circumference;

        var ticking = false;

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(function () {
                    var scrollY      = window.pageYOffset;
                    var scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
                    var progress     = scrollHeight > 0 ? scrollY / scrollHeight : 0;

                    btn.classList.toggle('flch-backtotop--visible', scrollY > 300);
                    circle.style.strokeDashoffset = Math.max(0, circumference - progress * circumference);

                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });

        btn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    function initReducedMotion() {
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        var els = document.querySelectorAll(
            '.flch-footer__blob, .flch-whatsapp__ripple, .flch-whatsapp__ripple-2'
        );
        els.forEach(function (el) { el.style.animation = 'none'; });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFooter);
    } else {
        initFooter();
    }
})();
</script>

<?php wp_footer(); ?>
</body>
</html>

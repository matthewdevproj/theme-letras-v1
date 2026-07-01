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
<style>
</style>

<?php /* Nota: cada plantilla ya cierra su propio </main> antes de
   get_footer(). No se cierra aquí para no duplicar el landmark. */ ?>

<!-- ═══════════════════════════════════════════════════════════
     FOOTER INSTITUCIONAL
════════════════════════════════════════════════════════════ -->
<footer class="kg-footer" role="contentinfo">

    <div class="kg-footer__background" aria-hidden="true">
        <div class="kg-footer__blob kg-footer__blob--top-left"></div>
        <div class="kg-footer__blob kg-footer__blob--bottom-right"></div>
        <div class="kg-footer__pattern"></div>
    </div>

    <div class="kg-footer__accent-line" aria-hidden="true"></div>

    <div class="kg-footer__container">

        <!-- Grid principal — 4 columnas en desktop -->
        <div class="kg-footer__grid">

            <!-- COLUMNA 1: Identidad institucional -->
            <div class="kg-footer__column kg-footer__column--identity">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php else : ?>
                <div class="kg-footer__brand">
                    <div class="kg-footer__logo" aria-hidden="true">
                        <i class="fas fa-university kg-footer__logo-icon"></i>
                    </div>
                    <div class="kg-footer__title-group">
                        <span class="kg-footer__pretitle">Facultad de</span>
                        <span class="kg-footer__maintitle">Letras</span>
                    </div>
                </div>

                <p class="kg-footer__description">
                    <?php esc_html_e( 'Formando profesionales en humanidades con excelencia académica y compromiso social desde 1551. Decana de América.', 'letrasflch' ); ?>
                </p>

                <div class="kg-footer__accreditation">
                    <i class="fas fa-check-circle kg-footer__accreditation-icon" aria-hidden="true"></i>
                    <span class="kg-footer__accreditation-text"><?php esc_html_e( 'Acreditación Internacional', 'letrasflch' ); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <!-- COLUMNA 2: Publicaciones académicas -->
            <div class="kg-footer__column kg-footer__column--journals">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php else : ?>
                <h3 class="kg-footer__heading">
                    <i class="fas fa-book-open kg-footer__heading-icon" aria-hidden="true"></i>
                    <span><?php esc_html_e( 'Revistas Académicas', 'letrasflch' ); ?></span>
                </h3>

                <ul class="kg-footer__list">
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
                    <li class="kg-footer__list-item">
                        <a href="<?php echo esc_url( $journal['url'] ); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="kg-footer__link">
                            <span class="kg-footer__link-bullet" aria-hidden="true"></span>
                            <span class="kg-footer__link-content">
                                <span class="kg-footer__link-title"><?php echo esc_html( $journal['title'] ); ?></span>
                                <span class="kg-footer__link-description"><?php echo esc_html( $journal['description'] ); ?></span>
                            </span>
                            <i class="fas fa-external-link-alt kg-footer__link-icon" aria-hidden="true"></i>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>

            <!-- COLUMNA 3: Programas y servicios -->
            <div class="kg-footer__column kg-footer__column--programs">
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                <?php else : ?>
                <h3 class="kg-footer__heading">
                    <i class="fas fa-graduation-cap kg-footer__heading-icon" aria-hidden="true"></i>
                    <span><?php esc_html_e( 'Programas', 'letrasflch' ); ?></span>
                </h3>

                <ul class="kg-footer__list kg-footer__list--compact">
                    <?php
                    $programs = array(
                        array( 'url' => 'https://ceidletras.unmsm.edu.pe/',                                                  'title' => 'Centro de Idiomas', 'icon' => 'fa-solid fa-language' ),
                        array( 'url' => 'https://letras.unmsm.edu.pe/oficina-de-examen-de-suficiencia-en-idiomas/',          'title' => 'OESI',              'icon' => 'fa-solid fa-certificate' ),
                        array( 'url' => 'https://posgradoletras.unmsm.edu.pe/',                                              'title' => 'Posgrado',          'icon' => 'fa-solid fa-graduation-cap' ),
                        array( 'url' => 'https://letras.unmsm.edu.pe/cerseu/',                                               'title' => 'CERSEU',            'icon' => 'fa-solid fa-hand-holding-heart' ),
                    );
                    foreach ( $programs as $program ) : ?>
                    <li class="kg-footer__list-item">
                        <a href="<?php echo esc_url( $program['url'] ); ?>"
                           class="kg-footer__link kg-footer__link--with-icon">
                            <i class="<?php echo esc_attr( $program['icon'] ); ?> kg-footer__link-icon-left" aria-hidden="true"></i>
                            <span class="kg-footer__link-title"><?php echo esc_html( $program['title'] ); ?></span>
                            <i class="fas fa-chevron-right kg-footer__link-arrow" aria-hidden="true"></i>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <div class="kg-footer__schedule">
                    <div class="kg-footer__schedule-icon" aria-hidden="true">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="kg-footer__schedule-info">
                        <span class="kg-footer__schedule-label"><?php esc_html_e( 'Horario de atención', 'letrasflch' ); ?></span>
                        <span class="kg-footer__schedule-time"><?php esc_html_e( 'Lunes a Viernes · 8:00 – 17:00', 'letrasflch' ); ?></span>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- COLUMNA 4: Contacto y redes -->
            <div class="kg-footer__column kg-footer__column--contact">
                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                <?php else : ?>
                <h3 class="kg-footer__heading">
                    <i class="fas fa-envelope kg-footer__heading-icon" aria-hidden="true"></i>
                    <span><?php esc_html_e( 'Contacto', 'letrasflch' ); ?></span>
                </h3>

                <ul class="kg-footer__contact-list">
                    <li class="kg-footer__contact-item">
                        <div class="kg-footer__contact-icon" aria-hidden="true">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <address class="kg-footer__contact-address">
                            Calle Germán Amézaga N° 375<br>
                            Lima, Perú
                        </address>
                    </li>
                    <li class="kg-footer__contact-item">
                        <div class="kg-footer__contact-icon" aria-hidden="true">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="mailto:informatica.letras@unmsm.edu.pe"
                           class="kg-footer__contact-email">
                            informatica.letras@unmsm.edu.pe
                        </a>
                    </li>
                </ul>

                <div class="kg-footer__social">
                    <h4 class="kg-footer__social-heading"><?php esc_html_e( 'Síguenos en redes', 'letrasflch' ); ?></h4>
                    <div class="kg-footer__social-grid">
                        <a href="https://www.facebook.com/letrassanmarcos"
                           target="_blank" rel="noopener noreferrer"
                           class="kg-footer__social-link kg-footer__social-link--facebook"
                           aria-label="<?php esc_attr_e( 'Facebook Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/letrasunmsm/"
                           target="_blank" rel="noopener noreferrer"
                           class="kg-footer__social-link kg-footer__social-link--instagram"
                           aria-label="<?php esc_attr_e( 'Instagram Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.youtube.com/@LetrasTV-p9j"
                           target="_blank" rel="noopener noreferrer"
                           class="kg-footer__social-link kg-footer__social-link--youtube"
                           aria-label="<?php esc_attr_e( 'YouTube Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="https://pe.linkedin.com/school/letrasunmsm/"
                           target="_blank" rel="noopener noreferrer"
                           class="kg-footer__social-link kg-footer__social-link--linkedin"
                           aria-label="<?php esc_attr_e( 'LinkedIn Facultad de Letras', 'letrasflch' ); ?>">
                            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div><!-- /.kg-footer__grid -->

        <!-- Menú de navegación del footer -->
        <?php
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'container'      => 'nav',
            'container_class'=> 'kg-footer__nav',
            'container_id'   => 'footer-nav',
            'menu_class'     => 'menu',
            'fallback_cb'    => false,
            'depth'          => 1,
            'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="' . esc_attr__( 'Menú footer', 'letrasflch' ) . '">%3$s</ul>',
        ) );
        ?>

        <!-- Fila de perfiles -->
        <ul class="kg-footer__profiles" aria-label="<?php esc_attr_e( 'Accesos por perfil', 'letrasflch' ); ?>">
            <?php
            $letras_flch_profiles = array(
                array( 'label' => __( 'Postulantes', 'letrasflch' ), 'href' => 'https://admision.unmsm.edu.pe/' ),
                array( 'label' => __( 'Estudiantes', 'letrasflch' ), 'href' => '#' ),
                array( 'label' => __( 'Egresados', 'letrasflch' ), 'href' => '#' ),
                array( 'label' => __( 'Docentes', 'letrasflch' ), 'href' => '#' ),
                array( 'label' => __( 'Administrativos', 'letrasflch' ), 'href' => '#' ),
                array( 'label' => __( 'Medios y externos', 'letrasflch' ), 'href' => '#' ),
                array( 'label' => __( 'Directorio', 'letrasflch' ), 'href' => 'https://letras.unmsm.edu.pe/directorio/' ),
            );
            foreach ( $letras_flch_profiles as $profile ) :
            ?>
                <li>
                    <a href="<?php echo esc_url( $profile['href'] ); ?>" class="kg-footer__profile-link">
                        <?php echo esc_html( $profile['label'] ); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Barra inferior: copyright -->
        <div class="kg-footer__bottom">
            <div class="kg-footer__bottom-container">
                <p class="kg-footer__copyright">
                    &copy; <?php echo esc_html( (int) date( 'Y' ) ); ?>
                    <strong class="kg-footer__copyright-highlight">
                        <?php esc_html_e( 'Facultad de Letras y Ciencias Humanas', 'letrasflch' ); ?>
                    </strong>
                </p>

                <span class="kg-footer__separator" aria-hidden="true"></span>

                <p class="kg-footer__rights">
                    <?php esc_html_e( 'Universidad Nacional Mayor de San Marcos', 'letrasflch' ); ?>
                </p>

                <span class="kg-footer__separator kg-footer__separator--mobile-hidden" aria-hidden="true"></span>

                <p class="kg-footer__unmsm">
                    <?php esc_html_e( 'Decana de América', 'letrasflch' ); ?>
                </p>
            </div>
        </div>

    </div><!-- /.kg-footer__container -->
</footer>

<!-- ─── Botón WhatsApp ─────────────────────────────────────── -->
<a href="https://wa.me/<?php echo esc_attr( LETRAS_WHATSAPP_NUMBER ); ?>?text=Hola,%20deseo%20informaci%C3%B3n%20sobre%20la%20facultad"
   class="kg-whatsapp"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="<?php esc_attr_e( 'Contactar por WhatsApp', 'letrasflch' ); ?>">
    <div class="kg-whatsapp__ripple"   aria-hidden="true"></div>
    <div class="kg-whatsapp__ripple-2" aria-hidden="true"></div>
    <div class="kg-whatsapp__button">
        <i class="fab fa-whatsapp kg-whatsapp__icon" aria-hidden="true"></i>
    </div>
    <span class="kg-whatsapp__tooltip" role="tooltip"><?php esc_html_e( '¿Necesitas ayuda?', 'letrasflch' ); ?></span>
</a>

<!-- ─── Botón Volver arriba ───────────────────────────────── -->
<button id="kg-btt"
        class="kg-btt"
        type="button"
        aria-label="<?php esc_attr_e( 'Volver al inicio de la página', 'letrasflch' ); ?>">
    <i class="fas fa-arrow-up kg-btt__icon" aria-hidden="true"></i>
    <svg class="kg-btt__progress" viewBox="0 0 48 48" aria-hidden="true" focusable="false">
        <circle class="kg-btt__progress-bg"   cx="24" cy="24" r="22"></circle>
        <circle class="kg-btt__progress-fill" cx="24" cy="24" r="22" id="kg-progress-circle"></circle>
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
        var btn    = document.getElementById('kg-btt');
        var circle = document.getElementById('kg-progress-circle');
        var bar    = document.getElementById('kg-progress-bar');
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

                    btn.classList.toggle('kg-btt--visible', scrollY > 300);
                    circle.style.strokeDashoffset = Math.max(0, circumference - progress * circumference);
                    if (bar) { bar.style.width = Math.min(100, Math.max(0, progress * 100)) + '%'; }

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
            '.kg-footer__blob, .kg-whatsapp__ripple, .kg-whatsapp__ripple-2'
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

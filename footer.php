<?php
/**
 * Footer template por columnas para FLCH - VERSIÓN CORREGIDA
 *
 * @package LetrasFLCH
 */
?>

</main><!-- #main -->

<!-- Footer por columnas - CON GRID CORREGIDO -->
<footer style="background: linear-gradient(135deg, #0A1E3C 0%, #143B63 50%, #1E4A7A 100%); color: white; width: 100%; padding-top: 4rem; padding-bottom: 1.5rem; position: relative; overflow: hidden;">
    
    <!-- Elementos decorativos -->
    <div style="position: absolute; inset: 0; opacity: 0.05; pointer-events: none;">
        <div style="position: absolute; top: 0; left: 0; width: 24rem; height: 24rem; background: #A88F1D; border-radius: 9999px; filter: blur(64px); transform: translate(-50%, -50%);"></div>
        <div style="position: absolute; bottom: 0; right: 0; width: 31.25rem; height: 31.25rem; background: #A88F1D; border-radius: 9999px; filter: blur(64px); transform: translate(33%, 33%);"></div>
    </div>
    
    <!-- Línea decorativa -->
    <div style="position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, #A88F1D, transparent);"></div>
    
    <div style="max-width: 1280px; margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem; position: relative; z-index: 10;">
        
        <!-- GRID DE 4 COLUMNAS - CORREGIDO -->
        <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 3rem;">
            
            <!-- COLUMNA 1: Información institucional -->
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 3rem; height: 3rem; background: linear-gradient(135deg, #A88F1D, #8B7718); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3);">
                        <i class="fas fa-university" style="font-size: 1.25rem; color: white;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 700; color: white; margin: 0;">
                        Facultad de <span style="color: #A88F1D; display: block; font-size: 1.5rem;">Letras</span>
                    </h4>
                </div>
                
                <p style="color: rgba(255,255,255,0.7); font-size: 0.875rem; line-height: 1.6; margin: 0;">
                    Formando profesionales en humanidades con excelencia académica y compromiso social desde 1551.
                </p>
                
                <!-- Badge de acreditación -->
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 9999px; padding: 0.375rem 1rem; border: 1px solid rgba(168,143,29,0.3); width: fit-content;">
                    <i class="fas fa-check-circle" style="color: #A88F1D; font-size: 0.75rem;"></i>
                    <span style="font-size: 0.75rem; color: rgba(255,255,255,0.9);">Acreditación Internacional</span>
                </div>
                
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div style="margin-top: 1rem;">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- COLUMNA 2: Revistas Académicas -->
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <h4 style="font-size: 1.125rem; font-weight: 600; color: white; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 0.5rem; border-bottom: 1px solid rgba(168,143,29,0.3); margin: 0;">
                    <i class="fas fa-book-open" style="color: #A88F1D; font-size: 0.875rem;"></i>
                    Revistas Académicas
                </h4>
                
                <ul style="display: flex; flex-direction: column; gap: 0.5rem; list-style: none; padding: 0; margin: 0;">
                    <li><a href="https://revistaletras.unmsm.edu.pe/index.php/le" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Letras (Lima)</a></li>
                    <li><a href="https://rcllletras.unmsm.edu.pe/index.php/content" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Crítica Literaria Latinoamericana</a></li>
                    <li><a href="https://revistasinvestigacion.unmsm.edu.pe/index.php/lenguaysociedad" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Lengua y Sociedad</a></li>
                    <li><a href="https://revistasinvestigacion.unmsm.edu.pe/index.php/tesis" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Tesis (Lima)</a></li>
                    <li><a href="https://revistasinvestigacion.unmsm.edu.pe/index.php/letras" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Escritura y Pensamiento</a></li>
                    <li><a href="https://revistaazulletras.unmsm.edu.pe/index.php/azul/index" target="_blank" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Azul </a></li>
                </ul>
                
                <!-- Ver todas las revistas -->
                <div style="padding-top: 0.5rem;">
                    <a href="https://letras.unmsm.edu.pe/revistas" style="font-size: 0.75rem; color: rgba(255,255,255,0.5); text-decoration: none; display: flex; align-items: center; gap: 0.25rem;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">
                        <span>Ver todas las revistas</span>
                        <i class="fas fa-arrow-right" style="font-size: 0.625rem;"></i>
                    </a>
                </div>
            </div>
            
            <!-- COLUMNA 3: Programas académicos -->
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <h4 style="font-size: 1.125rem; font-weight: 600; color: white; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 0.5rem; border-bottom: 1px solid rgba(168,143,29,0.3); margin: 0;">
                    <i class="fas fa-graduation-cap" style="color: #A88F1D; font-size: 0.875rem;"></i>
                    Programas
                </h4>
                
                <ul style="display: flex; flex-direction: column; gap: 0.5rem; list-style: none; padding: 0; margin: 0;">
                    <li><a href="<?php echo esc_url(home_url('/pregrado')); ?>" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Pregrado</a></li>
                    <li><a href="<?php echo esc_url(home_url('/posgrado')); ?>" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Posgrado</a></li>
                    <li><a href="<?php echo esc_url(home_url('/idiomas')); ?>" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Centro de Idiomas</a></li>
                    <li><a href="<?php echo esc_url(home_url('/diplomados')); ?>" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Diplomados</a></li>
                    <li><a href="<?php echo esc_url(home_url('/extension-cultural')); ?>" style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'"><span style="width: 0.375rem; height: 0.375rem; background: #A88F1D; border-radius: 9999px; display: inline-block;"></span> Extensión Cultural</a></li>
                </ul>
                
                <!-- Horario de atención -->
                <div style="padding-top: 1rem; margin-top: 1rem; border-top: 1px solid rgba(255,255,255,0.1);">
                    <div style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.875rem; color: rgba(255,255,255,0.7);">
                        <i class="fas fa-clock" style="color: #A88F1D; font-size: 0.875rem;"></i>
                        <div>
                            <span style="display: block; font-size: 0.75rem; color: rgba(255,255,255,0.4);">Atención</span>
                            <span>Lun - Vie: 8:00 - 17:00</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- COLUMNA 4: Contacto -->
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <h4 style="font-size: 1.125rem; font-weight: 600; color: white; display: flex; align-items: center; gap: 0.5rem; padding-bottom: 0.5rem; border-bottom: 1px solid rgba(168,143,29,0.3); margin: 0;">
                    <i class="fas fa-envelope" style="color: #A88F1D; font-size: 0.875rem;"></i>
                    Contacto
                </h4>
                
                <ul style="display: flex; flex-direction: column; gap: 0.75rem; list-style: none; padding: 0; margin: 0;">
                    <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <div style="width: 1.75rem; height: 1.75rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background 0.3s;" onmouseover="this.style.background='#A88F1D'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                            <i class="fas fa-map-marker-alt" style="color: #A88F1D; font-size: 0.75rem;"></i>
                        </div>
                        <span style="color: rgba(255,255,255,0.8); font-size: 0.875rem;">Calle Germán Amézaga N° 375 - Lima</span>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <div style="width: 1.75rem; height: 1.75rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background 0.3s;" onmouseover="this.style.background='#A88F1D'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                            <i class="fas fa-phone" style="color: #A88F1D; font-size: 0.75rem;"></i>
                        </div>
                        <a href="tel:+5101967000" style="color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">(01) 619-7000 anexo 2801</a>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                        <div style="width: 1.75rem; height: 1.75rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: background 0.3s;" onmouseover="this.style.background='#A88F1D'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                            <i class="fas fa-envelope" style="color: #A88F1D; font-size: 0.75rem;"></i>
                        </div>
                        <a href="mailto:informatica.letras@unmsm.edu.pe" style="color: rgba(255,255,255,0.8); font-size: 0.875rem; text-decoration: none; word-break: break-all;" onmouseover="this.style.color='#A88F1D'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">informatica.letras@unmsm.edu.pe</a>
                    </li>
                </ul>
                
                <!-- Redes Sociales -->
                <div style="padding-top: 1rem;">
                    <h5 style="font-size: 0.75rem; font-weight: 500; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem; margin-top: 0;">Síguenos</h5>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="https://www.facebook.com/letrassanmarcos" target="_blank" style="width: 2.25rem; height: 2.25rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.9); text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#1877F2'; this.style.transform='scale(1.1)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='scale(1)'"><i class="fab fa-facebook-f" style="font-size: 0.875rem;"></i></a>
                        <a href="https://www.instagram.com/letrasunmsm/" target="_blank" style="width: 2.25rem; height: 2.25rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.9); text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#E4405F'; this.style.transform='scale(1.1)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='scale(1)'"><i class="fab fa-instagram" style="font-size: 0.875rem;"></i></a>
                        <a href="https://www.youtube.com/@LetrasTV-p9j" target="_blank" style="width: 2.25rem; height: 2.25rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.9); text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#FF0000'; this.style.transform='scale(1.1)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='scale(1)'"><i class="fab fa-youtube" style="font-size: 0.875rem;"></i></a>
                        <a href="https://pe.linkedin.com/school/letrasunmsm/" target="_blank" style="width: 2.25rem; height: 2.25rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.9); text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#0077B5'; this.style.transform='scale(1.1)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='scale(1)'"><i class="fab fa-linkedin-in" style="font-size: 0.875rem;"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Media query para desktop -->
        <style>
            @media (min-width: 768px) {
                footer > div > div:first-child {
                    grid-template-columns: repeat(2, 1fr) !important;
                }
            }
            @media (min-width: 1024px) {
                footer > div > div:first-child {
                    grid-template-columns: repeat(4, 1fr) !important;
                }
            }
        </style>
        

<!-- Botón WhatsApp -->
<a href="https://wa.me/51982086285?text=Hola,%20deseo%20información" 
   style="position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 50; text-decoration: none;"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Contactar por WhatsApp">
    <div style="position: relative;">
        <div style="position: absolute; inset: 0; background: #25D366; border-radius: 9999px; animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite; opacity: 0.5;"></div>
        <div style="position: relative; width: 3rem; height: 3rem; background: #25D366; border-radius: 9999px; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3); transition: all 0.3s;"
             onmouseover="this.style.background='#128C7E'; this.style.transform='scale(1.1)'" onmouseout="this.style.background='#25D366'; this.style.transform='scale(1)'">
            <i class="fab fa-whatsapp" style="font-size: 1.25rem;"></i>
        </div>
    </div>
</a>

<!-- Botón volver arriba -->
<button id="back-to-top" 
        style="position: fixed; bottom: 1.5rem; left: 1.5rem; z-index: 50; width: 2.5rem; height: 2.5rem; background: #143B63; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.3); border: 1px solid rgba(168,143,29,0.3); opacity: 0; visibility: hidden; transition: all 0.3s; cursor: pointer;"
        onmouseover="this.style.background='#A88F1D'" onmouseout="this.style.background='#143B63'"
        aria-label="Volver al inicio">
    <i class="fas fa-arrow-up" style="font-size: 0.875rem;"></i>
</button>

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Menu toggle
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                this.querySelector('i').classList.remove('fa-bars');
                this.querySelector('i').classList.add('fa-times');
            } else {
                mobileMenu.classList.add('hidden');
                this.querySelector('i').classList.remove('fa-times');
                this.querySelector('i').classList.add('fa-bars');
            }
        });
    }

    // Submenús móvil
    window.toggleMobileSubmenu = function(button) {
        event.preventDefault();
        event.stopPropagation();
        
        const li = button.closest('li');
        const submenu = li.querySelector('ul');
        const icon = button.querySelector('i');
        
        if (submenu) {
            submenu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
        
        return false;
    };

    // Cerrar menú
    document.addEventListener('click', function(e) {
        if (menuToggle && mobileMenu && !e.target.closest('#header')) {
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuToggle.querySelector('i').classList.remove('fa-times');
                menuToggle.querySelector('i').classList.add('fa-bars');
            }
        }
    });

    // Back to top
    const backToTop = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTop.style.opacity = '1';
            backToTop.style.visibility = 'visible';
        } else {
            backToTop.style.opacity = '0';
            backToTop.style.visibility = 'hidden';
        }
    });
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
</script>

<style>
.rotate-180 {
    transform: rotate(180deg);
    transition: transform 0.3s ease;
}

#mobile-menu {
    transition: opacity 0.3s ease;
}

@keyframes ping {
    75%, 100% {
        transform: scale(2);
        opacity: 0;
    }
}
</style>

</body>
</html>
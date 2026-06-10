# Auditoria tecnica Codex - 2026-06-10

## Estado del stack

El tema ya incluye una base moderna con Tailwind CSS, Alpine.js, GSAP y componentes propios en PHP/CSS/JS. La arquitectura actual funciona, pero mezcla tres capas:

- Plantillas PHP con CSS y JS inline extensos (`header.php`, `footer.php`, `template-parts/hero.php`).
- Assets globales registrados desde `functions.php` e `inc/letras-performance.php`.
- Scripts de comportamiento en `js/` que dependen de GSAP/ScrollTrigger.

## Mejoras aplicadas

- Alpine.js ahora se carga desde `js/vendor/alpine.min.js`, incluido en el tema, en vez de depender de una ruta absoluta del sitio.
- GSAP y ScrollTrigger ahora se registran desde `js/vendor/`, haciendo el tema mas portable entre ambientes.
- Tailwind compila sin `preflight`, reduciendo conflictos con WordPress, Elementor y estilos legacy del tema.
- El contenido escaneado por Tailwind ahora incluye `js/` e `inc/widgets/`, no solo PHP y `src/js`.
- Se corrigio un bloque de resource hints que imprimia comentarios tipo JavaScript dentro del `<head>`.
- Se quito el filtro global que eliminaba `?ver=` de CSS/JS, porque anulaba el cache busting por `filemtime()`.
- `page-transitions.js` respeta `prefers-reduced-motion`, ignora clicks con modificadores y valida URLs antes de interceptar navegacion.
- El componente Alpine `backToTop` ya no intenta usar `ScrollToPlugin` si ese plugin de GSAP no esta cargado.
- Se agrego `css/modern-ui.css` como capa de UI posterior a los estilos legacy para modernizar headers, tarjetas, archivos, single posts, sidebars, paginacion y estados de foco.
- Se agrego `js/theme-stack.js` como inicializador progresivo para Alpine, GSAP, focus mode, header inteligente y animaciones por atributo `data-flch-animate`.
- Las tarjetas, destacados y articulos single ahora exponen `data-flch-component` y `data-flch-animate` para que el stack moderno pueda operar sin acoplarse a clases legacy.
- El orden de carga queda: `theme-stack.js` antes de Alpine, para registrar componentes durante `alpine:init`.

## Riesgos detectados

- Hay mucho CSS/JS inline en templates grandes. Conviene moverlo gradualmente a archivos versionados para cache, mantenimiento y revision.
- La guia menciona clases Tailwind con prefijo `tw-`, pero el build actual no genera utilidades prefijadas. Antes de exigir `tw-` hay que decidir si se migra todo el tema o si se mantiene sin prefijo para compatibilidad.
- `page-transitions.js` fuerza GSAP globalmente en todo el sitio. Es una experiencia bonita, pero aumenta peso base. Recomendacion: activarlo por filtro o solo en secciones clave.
- Font Awesome depende de `/assets/libs/fontawesome/all.min.css`, una ruta absoluta del sitio. Si el tema se mueve a otro WordPress, puede faltar.
- `header.php`, `footer.php` y `hero.php` concentran demasiada responsabilidad visual y de comportamiento.

## Siguiente fase recomendada

1. Crear una capa `inc/letras-assets.php` para registrar todo el stack en un solo lugar.
2. Mover JS inline del header, footer y hero a archivos dentro de `js/components/`.
3. Definir contrato Tailwind: mantener sin prefijo para tema interno, o migrar a `tw-` con una pasada completa.
4. Crear componentes Alpine formales para `header`, `mobileMenu`, `search`, `backToTop`, `tabs` y `modal`.
5. Cargar GSAP solo cuando haya atributos como `data-gsap`, plantillas especificas o slugs declarados.

## Validacion local

- `php -l functions.php`
- `php -l archive.php`
- `php -l index.php`
- `php -l single.php`
- `php -l template-parts/card-noticia.php`
- `node --check js/theme-stack.js`
- `node --check js/page-transitions.js`
- `npm.cmd run build`

Nota: el build de Tailwind finaliza correctamente. El unico aviso es `caniuse-lite is outdated`, que requiere actualizar dependencias cuando haya acceso de red.

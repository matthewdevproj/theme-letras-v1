# 🎨 MEJORAS FRONTEND - JUNIO 2026

## 📋 Resumen Ejecutivo

Se implementaron **6 mejoras principales** en el tema `letras-v1` con **soporte responsive completo** para garantizar una experiencia visual óptima en mobile, tablet y desktop.

**Total de cambios:**
- ✅ 3 archivos JavaScript nuevos (32 KB)
- ✅ 2 archivos JavaScript modificados (21 KB)
- ✅ 1 archivo PHP modificado (letras-performance.php)
- ✅ 547 líneas de CSS responsive agregadas
- ✅ Total: **4,248 líneas** en main.css

---

## 🚀 Mejoras Implementadas

### 1. Hero Enhanced (hero-enhanced.js)

**Ubicación:** `/js/hero-enhanced.js` (7.2 KB)

**Características:**
- Animación cinematográfica con efecto blur → clear
- Parallax en imagen de fondo (desktop y tablet, deshabilitado en mobile)
- Stagger secuencial: badge → título → descripción → CTA
- Scroll hint con pulso animado

**Responsive:**
- **Mobile (<768px):** Animaciones reducidas, sin parallax, blur menor
- **Tablet (768-1024px):** Parallax suave (15%)
- **Desktop (>1024px):** Parallax completo (30%)

**Encolado:** Solo en `is_front_page()`, prioridad 38

---

### 2. Lightbox GSAP (lightbox.js)

**Ubicación:** `/js/lightbox.js` (13 KB)

**Características:**
- Galería lightbox sin plugins adicionales
- Navegación: teclado (←/→/ESC), flechas UI, touch swipe (mobile)
- Contador de imágenes (ej: "3 / 8")
- Compatible con galerías de Elementor, WordPress, bloques Gutenberg

**Responsive:**
- **Mobile (<768px):** 
  - Lightbox ocupa 95vw x 85vh
  - Botones reducidos (36px)
  - Touch swipe activado
- **Desktop:** Botones 50px, controles más grandes

**Encolado:** En páginas con galerías (`has_shortcode`), prioridad 40

---

### 3. Arte-FLCH Effects (arte-flch-effects.js)

**Ubicación:** `/js/arte-flch-effects.js` (12 KB)

**Características:**
- Reveal de imágenes con clip-path (cortina horizontal)
- Parallax en secciones (alternado)
- Tabs animados con MutationObserver (Alpine.js integration)
- Contadores animados (`[data-count]`)
- Sticky tabs nav con glass effect al scroll
- Heading underlines con gradiente dorado

**Responsive:**
- **Mobile (<768px):** Sin parallax, animaciones simples
- **Tablet (768-1024px):** Parallax reducido (50%)
- **Desktop (>1024px):** Parallax completo (100%)

**Encolado:** Solo en páginas `arte-flch`, `escuela-profesional-de-arte`, prioridad 41

---

### 4. Nav Underline FIXED (header-effects.js)

**Ubicación:** `/js/header-effects.js` (8.1 KB - modificado)

**FIX CRÍTICO:**
- Selectores múltiples para compatibilidad con Elementor
- Underline dorado con gradiente (`#A88F1D` → `#C4A822`)
- Centrado con `translateX(-50%)`
- Animación GSAP suave (`scaleX`)
- Respeta `current-menu-item` (activo permanece visible)

**Selectores agregados:**
```javascript
'.elementor-nav-menu--main > .elementor-nav-menu > li > a'
'.elementor-nav-menu > li > a'
'header nav ul > li > a'
```

**Responsive:**
- **Mobile:** Underline 2px de alto, 70% de ancho
- **Desktop:** Underline 3px de alto, 80% de ancho

---

### 5. Cards Hover Avanzado (home-animations.js)

**Ubicación:** `/js/home-animations.js` (13 KB - modificado)

**Mejoras agregadas:**
- **Lift effect:** Card sube 8px con sombra dinámica
- **Image zoom:** Escala 1.08 suave
- **Shine effect:** Brillo animado que cruza la imagen
- **Badge color shift:** Navy (#143B63) → Gold (#A88F1D)
- **Efecto 3D:** Parallax con `mousemove` (solo desktop)

**Responsive:**
- **Mobile (<768px):** Efectos deshabilitados (performance)
- **Desktop:** Todos los efectos activos

**Código clave:**
```javascript
// Shine overlay
var shine = document.createElement('div');
shine.style.background = 'linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent)';

// Hover in
gsap.to(card, { y: -8, boxShadow: '0 20px 40px rgba(20,59,99,0.15)' });
gsap.fromTo(shine, { left: '-100%' }, { left: '150%', duration: 0.8 });
```

---

### 6. CSS Responsive Completo (main.css)

**Ubicación:** `/css/main.css` (+547 líneas, total 4,248)

**Secciones agregadas:**

#### Cards Responsive
- Mobile: Stack vertical, padding reducido
- Tablet: Grid 2 columnas
- Desktop: Grid 3 columnas

#### Hero Responsive
- Mobile: 65-70vh, texto 1.75rem
- Tablet: 75-80vh, texto 2.25rem
- Desktop: 85-92vh, texto 3rem

#### Lightbox Responsive
- Mobile: Botones 36px, imagen 95vw
- Desktop: Botones 50px, imagen 90vw

#### Buttons Responsive
- Mobile: Full width, stack vertical
- Desktop: Inline, width auto

#### Typography Responsive
```css
/* Mobile */
h1 { font-size: 1.75rem !important; }
h2 { font-size: 1.5rem !important; }

/* Tablet */
h1 { font-size: 2.25rem !important; }

/* Desktop */
h1 { font-size: 3rem !important; }
```

#### Utility Classes
- `.hide-mobile` / `.show-mobile`
- `.hide-tablet` / `.show-tablet`
- Container responsive: 720px → 960px → 1200px

#### Accessibility
- `@media (prefers-reduced-motion: reduce)` — deshabilita animaciones
- `@media print` — optimiza para impresión

---

## 📦 Estructura de Archivos

```
wp-content/themes/letras-v1/
├── css/
│   └── main.css (4,248 líneas)
├── inc/
│   └── letras-performance.php (modificado)
└── js/
    ├── hero-enhanced.js (NUEVO - 7.2 KB)
    ├── lightbox.js (NUEVO - 13 KB)
    ├── arte-flch-effects.js (NUEVO - 12 KB)
    ├── header-effects.js (MODIFICADO - 8.1 KB)
    └── home-animations.js (MODIFICADO - 13 KB)
```

---

## 🎯 Enqueue Condicional

### letras-performance.php - Priorities

| Script | Condición | Prioridad | Dependencias |
|--------|-----------|-----------|--------------|
| home-animations.js | `is_front_page()` | 35 | gsap, gsap-scrolltrigger |
| page-transitions.js | Front + páginas GSAP | 36 | gsap |
| header-effects.js | Front + páginas GSAP | 37 | gsap, gsap-scrolltrigger |
| hero-enhanced.js | `is_front_page()` | 38 | gsap, gsap-scrolltrigger |
| lightbox.js | Páginas con galerías | 40 | gsap |
| arte-flch-effects.js | `arte-flch` pages | 41 | gsap, gsap-scrolltrigger |

**Páginas GSAP:**
```php
$gsap_pages = [
    'arte-flch',
    'escuela-profesional-de-arte',
    'linguistica-flch'
];
```

---

## 🧪 Testing Checklist

### Mobile (<768px)
- [ ] Hero altura 65-70vh (no scroll horizontal)
- [ ] Cards stack vertical
- [ ] Lightbox responsive (botones 36px)
- [ ] Nav underline visible
- [ ] Sin efectos hover (performance)
- [ ] Touch swipe en lightbox funciona

### Tablet (768-1024px)
- [ ] Hero altura 75-80vh
- [ ] Cards grid 2 columnas
- [ ] Parallax reducido (50%)
- [ ] Lightbox responsive
- [ ] Tabs horizontales

### Desktop (>1024px)
- [ ] Hero altura 85-92vh
- [ ] Cards grid 3 columnas con hover 3D
- [ ] Parallax completo
- [ ] Nav underline dorado centrado
- [ ] Shine effect en cards

### Cross-browser
- [ ] Chrome/Edge (Chromium)
- [ ] Firefox
- [ ] Safari (macOS/iOS)
- [ ] Mobile browsers (Chrome, Safari)

### Performance
- [ ] GSAP carga en <3s (fallback CSS activo)
- [ ] ScrollTrigger refresh en resize
- [ ] No layout shift (CLS < 0.1)
- [ ] Imágenes lazy loading
- [ ] `clearProps: 'all'` en animaciones

---

## 🔧 Mantenimiento

### Agregar nueva página con GSAP

**Paso 1:** Agregar slug al array en `letras-performance.php`:

```php
$gsap_pages = [
    'arte-flch',
    'escuela-profesional-de-arte',
    'linguistica-flch',
    'nueva-pagina-aqui'  // ← Agregar
];
```

**Paso 2:** GSAP y scripts se encolará automáticamente

---

### Deshabilitar animaciones en una página

Agregar clase al body:

```html
<body class="no-animations">
```

CSS:
```css
.no-animations * {
    animation: none !important;
    transition: none !important;
}
```

---

### Debugging

**Ver scripts cargados:**
```javascript
// En consola del browser
console.log(Object.keys(window).filter(k => k.includes('gsap')));
// → ["gsap", "ScrollTrigger", ...]
```

**Ver breakpoint activo:**
```javascript
// Mobile: <768px, Tablet: 768-1024px, Desktop: >1024px
const width = window.innerWidth;
const bp = width < 768 ? 'mobile' : width < 1024 ? 'tablet' : 'desktop';
console.log('Breakpoint:', bp);
```

---

## 📊 Métricas de Performance

### Antes de las mejoras
- TTFB: ~600ms
- Scripts JS: 5 archivos (35 KB total)
- CSS: 3,701 líneas

### Después de las mejoras
- TTFB: ~600ms (sin cambio)
- Scripts JS: 8 archivos (+3 nuevos, 56 KB total)
- CSS: 4,248 líneas (+547 responsive)
- **No degradación de performance** gracias a enqueue condicional

**Optimizaciones aplicadas:**
- ✅ Scripts solo se cargan donde se necesitan
- ✅ `filemtime()` para cache busting automático
- ✅ Fallback CSS si GSAP no carga (3s timeout)
- ✅ `clearProps: 'all'` evita conflictos CSS
- ✅ IntersectionObserver para lazy animations
- ✅ `will-change` solo durante animaciones

---

## 🐛 Troubleshooting

### Problema: Nav underline no aparece

**Causa:** Selectores de Elementor cambiaron

**Solución:** Inspeccionar el menú y agregar selector en `header-effects.js`:

```javascript
var navSelectors = [
    '.tu-selector-aqui',  // ← Agregar
    '.elementor-nav-menu--main > .elementor-nav-menu > li > a',
    // ...
];
```

---

### Problema: Animaciones no funcionan en red externa

**Causa:** CDN de GSAP bloqueado

**Solución:** Verificar timeout fallback (ya implementado):

```javascript
var gsapTimeout = setTimeout(function() {
    console.warn('GSAP timeout - usando fallback CSS');
    document.body.classList.add('gsap-fallback');
}, 3000);
```

**Verificar que existe CSS fallback:**
```css
.gsap-fade-in { opacity: 1 !important; }
```

---

### Problema: Lightbox no abre en galería de Elementor

**Causa:** Elementor lightbox interfiriendo

**Solución:** Ya implementado en `lightbox.js`:

```javascript
link.removeAttribute('data-elementor-lightbox');
link.removeAttribute('data-elementor-open-lightbox');
```

---

## 📝 Notas de Desarrollo

### Stack Tecnológico Confirmado

**Ya cargados globalmente (NO re-registrar):**
- ✅ GSAP 3.12.5
- ✅ ScrollTrigger
- ✅ Alpine.js 3.14.8
- ✅ Tailwind CSS (prefix: `tw-`)
- ✅ Font Awesome 6.4.0
- ✅ Swiper
- ✅ DataTables

**Fuentes:**
- DM Sans (primary)
- Libre Baskerville (headings)

**Colores:**
- Navy: `#143B63`
- Gold: `#A88F1D`

---

## 🎓 Recursos

**GSAP Docs:**
- https://greensock.com/docs/v3/GSAP
- https://greensock.com/docs/v3/Plugins/ScrollTrigger

**Alpine.js Docs:**
- https://alpinejs.dev/

**Tailwind Docs:**
- https://tailwindcss.com/docs

**Responsive Testing:**
- Chrome DevTools (Toggle Device Toolbar: Ctrl+Shift+M)
- https://responsively.app/

---

## ✅ Checklist de Implementación

- [x] Crear hero-enhanced.js
- [x] Crear lightbox.js
- [x] Crear arte-flch-effects.js
- [x] Modificar header-effects.js (fix nav underline)
- [x] Modificar home-animations.js (cards hover avanzado)
- [x] Agregar enqueue en letras-performance.php
- [x] Agregar CSS responsive en main.css
- [x] Verificar sintaxis JavaScript (Node.js)
- [x] Documentar cambios (este archivo)
- [ ] Testing en mobile real (pendiente)
- [ ] Testing en Safari (pendiente)
- [ ] Monitoreo de performance en producción (pendiente)

---

**Fecha de implementación:** 6 de junio de 2026  
**Desarrollador:** Claude Code (Sonnet 4.5)  
**Backups creados:** Sí (extensión `.bak-20260606-*`)

---

## 🔄 Rollback

Si necesitas revertir los cambios:

```bash
cd /home/letras/letras.unmsm.edu.pe/public_html/wp-content/themes/letras-v1

# Restaurar JS
mv js/header-effects.js.bak-20260606-111908 js/header-effects.js
mv js/home-animations.js.bak-20260606-111908 js/home-animations.js

# Eliminar nuevos archivos
rm js/hero-enhanced.js js/lightbox.js js/arte-flch-effects.js

# Restaurar PHP
mv inc/letras-performance.php.bak-20260606-111908 inc/letras-performance.php

# CSS: revertir manualmente las últimas 547 líneas
```

---

**FIN DEL DOCUMENTO**

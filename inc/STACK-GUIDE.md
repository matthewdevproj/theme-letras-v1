# Stack Frontend FLCH — Guía de uso
## letras.unmsm.edu.pe — Junio 2026

---

## Stack disponible globalmente en TODAS las páginas

### JavaScript (usar directamente, ya cargado)
| Librería      | Variable global      | Uso                          |
|---------------|----------------------|------------------------------|
| Alpine.js     | (x-data en HTML)     | Interactividad, tabs, estado |
| jQuery        | $, jQuery            | DOM, AJAX, eventos           |
| DataTables    | $.fn.DataTable       | Tablas buscables/paginadas   |
| Swiper        | Swiper               | Sliders, carruseles          |

### JavaScript (cargar con wp_enqueue en página)
| Librería       | Handle WP            | Cuándo usarlo                |
|----------------|----------------------|------------------------------|
| GSAP 3.12.5    | gsap                 | Animaciones de entrada       |
| ScrollTrigger  | gsap-scrolltrigger   | Animaciones al hacer scroll  |

### CSS (disponible globalmente)
| Librería       | Cómo usar            | Notas                        |
|----------------|----------------------|------------------------------|
| Tailwind CSS   | clases tw-           | prefix tw- obligatorio       |
| Font Awesome   | fas fa-* fab fa-*    | Iconos disponibles           |
| Google Fonts   | font-family en CSS   | DM Sans + Libre Baskerville  |

---

## ⚠️ HANDLES QUE NUNCA DEBES RE-REGISTRAR

Estos handles YA EXISTEN y son globales. No intentar registrarlos nuevamente:

```php
// ❌ NUNCA HACER ESTO:
wp_register_script('alpinejs', ...);      // Ya existe
wp_register_script('swiper', ...);        // Ya existe (Elementor)
wp_register_script('backbone', ...);      // Ya existe (WordPress core)
wp_register_script('backbone-marionette', ...); // Ya existe (Elementor) ⚠️ CRÍTICO
wp_register_script('backbone-radio', ...);      // Ya existe (Elementor) ⚠️ CRÍTICO
wp_register_style('letras-tailwind', ...); // Ya existe
wp_register_style('ch-fontawesome', ...);  // Ya existe
```

**ADVERTENCIA CRÍTICA:** `backbone-marionette` y `backbone-radio` son internos de Elementor. Si los eliminas o re-registras, el editor de páginas dejará de funcionar.

---

## Para agregar una nueva página al stack moderno

### Opción A — Widget HTML de Elementor (recomendado)

1. Crear página en WordPress
2. Editar con Elementor
3. Agregar widget "HTML"
4. Pegar el contenido usando el stack:

```html
<div id="mi-seccion" x-data="{ tab: 'inicio' }">
  <!-- Alpine funciona directo -->
  <!-- Tailwind con prefijo tw- -->
  <!-- Font Awesome con fas fa-* -->
</div>
```

**No incluir estas librerías** (ya están cargadas):
- ❌ `<script src="alpine.js"></script>`
- ❌ `<link rel="stylesheet" href="font-awesome.css">`
- ❌ `<link rel="stylesheet" href="tailwind.css">`

---

### Opción B — Activar GSAP en una página específica

En `/inc/letras-performance.php`, agregar el slug:

```php
$gsap_pages = [
    'escuela-profesional-de-arte',
    'escuela-profesional-de-linguistica',    // ← agregar aquí
    'escuela-profesional-de-comunicacion',   // ← agregar aquí
    'escuela-profesional-de-filosofia',      // ← agregar aquí
];
```

Luego usar GSAP en el widget HTML:

```javascript
document.addEventListener('DOMContentLoaded', function() {
  if(typeof gsap !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
    gsap.fromTo('.card',
      { opacity: 0, y: 20 },
      { opacity: 1, y: 0, stagger: 0.1, duration: 0.5 }
    );
  }
});
```

---

### Opción C — Página con stack completo custom

En `functions.php` agregar:

```php
add_action('wp_enqueue_scripts', function() {
    if(is_page('mi-pagina')) {
        wp_enqueue_script('gsap');
        wp_enqueue_script('gsap-scrolltrigger');
    }
});
```

---

## Identidad visual FLCH (usar en todo el sitio)

```css
/* Colores institucionales */
--navy:       #143B63;  /* Azul principal */
--navy-dark:  #0E2A48;  /* Azul oscuro */
--gold:       #A88F1D;  /* Dorado */
--gold-light: #C4A822;  /* Dorado claro */

/* Con Tailwind (prefix tw-) */
.tw-text-navy { color: #143B63; }
.tw-bg-gold { background: #A88F1D; }
.tw-text-gold { color: #A88F1D; }

/* Tipografía */
font-family: 'DM Sans', sans-serif;      /* UI, body text */
font-family: 'Libre Baskerville', serif; /* Headings */
```

---

## Template de widget HTML para nueva escuela

Copiar este template para modernizar cualquier escuela:

```html
<div id="escuela-root"
     x-data="{ 
       tab: 'presentacion',
       tabs: [
         { s: 'presentacion', label: 'Presentación' },
         { s: 'historia', label: 'Historia' },
         { s: 'docentes', label: 'Docentes' },
         { s: 'investigacion', label: 'Investigación' }
       ]
     }"
     class="tw-font-sans tw-bg-slate-50">

  <!-- Hero Navy + Gold -->
  <header style="background:linear-gradient(140deg,#143B63,#0E2A48,#091d34);
                 padding:3rem 2.5rem;border-radius:0 0 1.5rem 1.5rem">
    <p style="color:#A88F1D;font-size:.7rem;font-weight:700;
              letter-spacing:.16em;text-transform:uppercase">
      Facultad de Letras y Ciencias Humanas · UNMSM
    </p>
    <h1 style="font-family:'Libre Baskerville',serif;
               font-size:2.5rem;color:#fff;margin:.5rem 0 1rem">
      ESCUELA PROFESIONAL DE [NOMBRE]
    </h1>
    <p style="color:rgba(255,255,255,0.8);font-size:1rem;line-height:1.6;max-width:680px">
      Descripción breve de la escuela profesional.
    </p>
  </header>

  <!-- Nav pills -->
  <nav style="background:rgba(255,255,255,.95);backdrop-filter:blur(12px);
              border-bottom:1px solid #E2E8F0;position:sticky;top:0;z-index:50">
    <div style="display:flex;gap:3px;padding:.375rem 1.5rem;
                flex-wrap:wrap;justify-content:center">
      <template x-for="t in tabs" :key="t.s">
        <button @click="tab=t.s"
                :style="tab===t.s
                  ? 'background:#143B63;color:#fff'
                  : 'background:transparent;color:#64748b'"
                style="padding:.5rem 1.25rem;border-radius:9999px;
                       border:none;cursor:pointer;font-size:.8rem;
                       transition:all .2s">
          <span x-text="t.label"></span>
        </button>
      </template>
    </div>
  </nav>

  <!-- Secciones -->
  <div style="max-width:980px;margin:0 auto;padding:2rem 1.5rem">
    
    <!-- Presentación -->
    <div x-show="tab==='presentacion'" style="display:none">
      <h2 style="font-family:'Libre Baskerville',serif;font-size:1.8rem;
                 color:#143B63;margin-bottom:1rem">
        Presentación
      </h2>
      <p style="line-height:1.8;color:#334155;margin-bottom:1rem">
        Contenido de presentación aquí.
      </p>
    </div>

    <!-- Historia -->
    <div x-show="tab==='historia'" style="display:none">
      <h2 style="font-family:'Libre Baskerville',serif;font-size:1.8rem;
                 color:#143B63;margin-bottom:1rem">
        Historia
      </h2>
      <p style="line-height:1.8;color:#334155">
        Contenido de historia aquí.
      </p>
    </div>

    <!-- Más secciones... -->

  </div>

  <script>
  // GSAP disponible si la página está en gsap_pages
  document.addEventListener('DOMContentLoaded', function() {
    if(typeof gsap !== 'undefined') {
      gsap.registerPlugin(ScrollTrigger);
      gsap.fromTo('[data-animate]',
        { opacity: 0, y: 20 },
        { opacity: 1, y: 0, stagger: .1, duration: .5,
          scrollTrigger: { 
            trigger: '#escuela-root',
            start: 'top 80%' 
          } 
        }
      );
    }
  });
  </script>
</div>
```

---

## API de Alpine.js (ejemplos)

```html
<!-- Estado local -->
<div x-data="{ open: false }">
  <button @click="open = !open">Toggle</button>
  <div x-show="open">Contenido</div>
</div>

<!-- Iteración -->
<div x-data="{ items: ['A', 'B', 'C'] }">
  <template x-for="item in items" :key="item">
    <div x-text="item"></div>
  </template>
</div>

<!-- Condicionales -->
<div x-data="{ admin: true }">
  <div x-show="admin">Panel de admin</div>
  <div x-show="!admin">Usuario normal</div>
</div>

<!-- Clases dinámicas -->
<button :class="active ? 'tw-bg-navy' : 'tw-bg-gray-300'">
  Botón
</button>
```

---

## API de GSAP 3.x (ejemplos)

```javascript
// Animación simple
gsap.to('.elemento', { 
  opacity: 1, 
  duration: 1 
});

// Desde-hasta
gsap.fromTo('.card', 
  { y: 50, opacity: 0 }, 
  { y: 0, opacity: 1, stagger: 0.2 }
);

// Timeline secuencial
const tl = gsap.timeline();
tl.to('.header', { y: 0, duration: 0.5 })
  .to('.content', { opacity: 1, duration: 0.5 })
  .to('.footer', { y: 0, duration: 0.5 });

// Con ScrollTrigger
gsap.to('.hero', {
  scrollTrigger: {
    trigger: '.hero',
    start: 'top center',
    end: 'bottom top',
    scrub: true,
    markers: false  // true para debug
  },
  opacity: 0,
  y: -100
});
```

**⚠️ IMPORTANTE:** Usar GSAP v3 API (`gsap.to()`, `gsap.fromTo()`). 
NO usar `TweenMax` o `TweenLite` (eso es GSAP v2, legacy).

---

## API de jQuery DataTables (ejemplos)

```javascript
$(document).ready(function() {
  $('#mi-tabla').DataTable({
    language: {
      url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
    },
    pageLength: 25,
    order: [[0, 'asc']],
    responsive: true
  });
});
```

---

## Páginas modernizadas hasta ahora

- [x] **escuela-profesional-de-arte** (ID: 50607)
  - Estado: Widget HTML base creado, pendiente actualizar
  - Stack: Alpine + Tailwind + Font Awesome disponibles
  - GSAP: Agregar slug a `gsap_pages` si se necesita

- [ ] **Lingüística** → pendiente crear página
- [ ] **Comunicación Social** → pendiente crear página
- [ ] **Filosofía** → pendiente crear página
- [ ] **Literatura** → pendiente crear página
- [ ] **Bibliotecología** → pendiente crear página

---

## Checklist para modernizar una página

```
[ ] 1. Crear página en WordPress (o identificar existente)
[ ] 2. Verificar que no tiene conflictos con plugins antiguos
[ ] 3. Editar con Elementor
[ ] 4. Agregar widget HTML
[ ] 5. Copiar template de STACK-GUIDE.md
[ ] 6. Personalizar contenido (hero, tabs, secciones)
[ ] 7. Si usa GSAP: agregar slug a gsap_pages en letras-performance.php
[ ] 8. Verificar en navegador:
    [ ] Alpine funciona (tabs, interactividad)
    [ ] Tailwind funciona (estilos tw-)
    [ ] Font Awesome funciona (iconos fas fa-)
    [ ] GSAP funciona (animaciones, si aplica)
[ ] 9. Verificar métricas:
    curl -o /dev/null -s -w "TTFB: %{time_starttransfer}s\n" URL
[ ] 10. Flush cache: wp cache flush && wp elementor flush-css
```

---

## Comandos útiles

```bash
# Flush cache después de cambios
wp cache flush --path=/home/letras/letras.unmsm.edu.pe/public_html
wp elementor flush-css --path=/home/letras/letras.unmsm.edu.pe/public_html

# Verificar handles registrados
wp eval 'global $wp_scripts; do_action("wp_enqueue_scripts"); 
        print_r(array_keys($wp_scripts->registered));' \
  --path=/home/letras/letras.unmsm.edu.pe/public_html

# Métricas de una página
curl -o /dev/null -s -w "TTFB: %{time_starttransfer}s | HTML: %{size_download}B\n" \
  https://letras.unmsm.edu.pe/escuela-profesional-de-arte/

# Verificar Gzip
curl -s -H "Accept-Encoding: gzip" -I https://letras.unmsm.edu.pe/ | grep -i content-encoding
```

---

## Solución de problemas

### Alpine no funciona

```javascript
// Verificar que Alpine está cargado
console.log(typeof Alpine); // debe ser 'object'

// Si no está, verificar en WP-CLI:
wp eval 'global $wp_scripts; do_action("wp_enqueue_scripts"); 
        echo isset($wp_scripts->registered["alpinejs"]) ? "OK" : "NO";' \
  --path=/home/letras/...
```

### GSAP no funciona

```javascript
// Verificar que GSAP está cargado
console.log(typeof gsap); // debe ser 'function'

// Si no está, agregar slug de la página a gsap_pages en:
// /inc/letras-performance.php
```

### Tailwind no funciona

- Verificar que usas prefix `tw-`: `tw-text-navy`, `tw-bg-gold`
- Sin prefix NO funcionará (conflicto con estilos del tema)

### Font Awesome no funciona

```html
<!-- Verificar que el CDN está cargado -->
<i class="fas fa-check"></i>  <!-- Solid -->
<i class="fab fa-facebook"></i>  <!-- Brands -->
<i class="far fa-circle"></i>  <!-- Regular -->
```

---

## Recursos externos

- **Alpine.js docs:** https://alpinejs.dev/
- **GSAP 3 docs:** https://greensock.com/docs/v3/
- **Tailwind CSS:** https://tailwindcss.com/docs (usar prefix tw-)
- **Font Awesome:** https://fontawesome.com/icons
- **DataTables:** https://datatables.net/

---

**Última actualización:** Junio 2026  
**Responsable:** Modernización letras.unmsm.edu.pe  
**Archivo:** `/wp-content/themes/letras-v1/inc/STACK-GUIDE.md`

# 🏗️ ARQUITECTURA DEL TEMA - Letras FLCH

**Versión**: 2.0  
**Última actualización**: Junio 2026

---

## 📐 Principios de Diseño

### 1. Separación de Responsabilidades

```
CSS inline en PHP = ❌ MAL
CSS en archivos dedicados = ✅ BIEN
```

**Beneficios**:
- ✅ Mejor cache del navegador
- ✅ Más fácil de mantener
- ✅ Debugging más simple
- ✅ Reusabilidad

### 2. CSS Modular

Cada archivo CSS tiene una responsabilidad específica:

| Archivo | Responsabilidad | Tamaño |
|---------|-----------------|--------|
| `variables.css` | Custom properties globales | 4KB |
| `fontawesome-fix.css` | Fix rendering FontAwesome | 2KB |
| `tailwind.css` | Utilities puras | 20KB |
| `main.css` | Estilos legacy | 104KB |
| `header.css` | Header + Topbar | 28KB |
| `style.css` | Tema principal | 96KB |
| `responsive.css` | Media queries | 12KB |
| `modern-ui.css` | Componentes modernos | 12KB |

**Total**: ~280KB (antes: 300KB+)

### 3. Orden de Especificidad

```
Base → Utilities → Components → Layouts → Overrides
```

**Implementación**:
```
variables → FA fix → Tailwind → main → header → style → responsive → modern-ui
```

---

## 🎨 Sistema de Estilos

### Variables CSS

**Archivo**: `css/variables.css`

```css
:root {
  /* Colores institucionales */
  --navy: #143B63;
  --gold: #A8861C;
  
  /* Sistema de colores */
  --navy-dark: #0E2A48;
  --navy-mid: #1e5590;
  --gold-dark: #8B7518;
  --gold-wcag: #7A6600; /* WCAG AA */
  
  /* Espaciado */
  --spacing-unit: 8px;
  --spacing-sm: 12px;
  --spacing-md: 16px;
  --spacing-lg: 24px;
}
```

### Tailwind Configuration

**Archivo**: `tailwind.config.js`

```javascript
module.exports = {
  content: [
    './**/*.php',      // Escanea PHP
    './src/js/**/*.js' // Escanea JS
  ],
  theme: {
    extend: {
      colors: {
        primary: { dark: '#143B63' },
        accent: { gold: '#A8861C' }
      }
    }
  },
  corePlugins: {
    preflight: false // Desactiva reset CSS
  }
}
```

**Compilación**:
```bash
node node_modules/tailwindcss/lib/cli.js \
  -i ./src/input.css \
  -o ./css/tailwind.css \
  --minify
```

### Source Input

**Archivo**: `src/input.css`

```css
@tailwind base;
/* @tailwind components; ← COMENTADO */
@tailwind utilities;

@layer components {
  /* Solo components que NO conflictúan */
  .btn { ... }
  .card { ... }
  /* NO incluir .main-menu */
}
```

**¿Por qué NO usar `@tailwind components`?**

Tailwind genera automáticamente:
```css
/* ❌ NO queremos esto */
.main-menu {
  display: flex;
  border-bottom: 2px solid transparent;
}
.main-menu:hover {
  border-color: rgb(168,143,29);
}
```

Esto conflictúa con nuestro `.main-menu` custom en `header.css`.

---

## 🧩 Componentes

### Header

**Archivos**:
- `header.php` - Template HTML
- `css/header.css` - Estilos (28KB)
- `js/theme-stack.js` - Alpine.js setup

**Estructura**:
```
┌─────────────────────────────────────┐
│ TopBar                              │
│  ├─ Desktop (≥1024px)               │
│  ├─ Tablet (768-1023px)             │
│  └─ Mobile (<768px)                 │
├─────────────────────────────────────┤
│ Main Header                         │
│  ├─ Logo                            │
│  ├─ Navegación (desktop only)       │
│  │   └─ Multi-level dropdowns       │
│  └─ Actions                         │
│      ├─ Search toggle               │
│      └─ Mobile menu toggle          │
├─────────────────────────────────────┤
│ Search Bar (Alpine x-show)          │
├─────────────────────────────────────┤
│ Mobile Menu Panel (Alpine x-show)   │
└─────────────────────────────────────┘
```

**CSS Breakdown**:
```css
/* Variables locales */
:root {
  --color-primary: #143B63;
  --color-accent: #A8861C;
  --tb-bg: #111111;
}

/* TopBar */
.flch-topbar { ... }
.tb-desktop { ... }
.tb-mobile-social { ... }
.tb-mobile-contact { ... }
.tb-tablet { ... }

/* Main Header */
.main-header { ... }
.header-inner { ... }
.header-logo { ... }

/* Navigation */
.main-menu { ... }
.main-menu > li { ... }
.main-menu > li > a { ... }
.main-menu .sub-menu { ... }

/* Mobile */
.mobile-menu-panel { ... }

/* Search Bar */
.search-bar { ... }
.search-input { ... }

/* Admin Bar Compatibility */
.admin-bar .main-header {
  top: 32px;
}
@media (max-width: 782px) {
  .admin-bar .main-header {
    top: 46px;
  }
}
```

### FontAwesome Fix

**Archivo**: `css/fontawesome-fix.css`

**Problema**: Algunos CSS resets eliminan `::before` en icons.

**Solución**:
```css
.fa::before,
.fas::before,
[class^="fa-"]::before {
  font-family: "Font Awesome 6 Free" !important;
  font-weight: 900;
  display: inline-block;
  /* ... más propiedades */
}
```

**Carga**:
```php
wp_enqueue_style(
  'letras-fontawesome-fix',
  $uri . '/css/fontawesome-fix.css',
  array( 'letras-fontawesome' ), // Depende de FA
  $version
);
```

---

## ⚙️ JavaScript

### Stack Tecnológico

| Biblioteca | Versión | Tamaño | Uso |
|------------|---------|--------|-----|
| **Alpine.js** | 3.14.8 | 44KB | Interactividad reactiva |
| **GSAP** | 3.x | 72KB | Animaciones premium |
| **ScrollTrigger** | 3.x | 44KB | Scroll animations |

### Alpine.js Setup

**Archivo**: `js/theme-stack.js`

```javascript
// Inicialización global de Alpine
document.addEventListener('alpine:init', () => {
  // Componentes globales
  Alpine.data('dropdown', () => ({
    open: false,
    toggle() { this.open = !this.open }
  }));
});
```

**En header.php**:
```html
<body x-data="{
  searchOpen: false,
  mobileMenuOpen: false
}">
```

### GSAP - Carga Condicional

**Archivo**: `inc/letras-performance.php`

```php
$gsap_pages = [
  'linguistica-flch', // Solo en Lingüística
];

if (is_front_page() || in_array($slug, $gsap_pages)) {
  wp_enqueue_script('gsap');
  wp_enqueue_script('gsap-scrolltrigger');
}
```

**Beneficio**: GSAP (116KB) solo se carga donde se necesita.

---

## 📦 Optimizaciones de Performance

### 1. Deduplicación de Recursos

**Archivo**: `inc/letras-performance.php`

```php
function letras_dedup_fontawesome() {
  // Eliminar FontAwesome de plugins
  wp_dequeue_style('font-awesome');
  wp_dequeue_style('wpsm_tabs_r-font-awesome-front');
  wp_dequeue_style('font-awesome-5-all');
  wp_dequeue_style('font-awesome-4-shim');
  
  // Solo queda: letras-fontawesome (local)
}
add_action('wp_enqueue_scripts', 'letras_dedup_fontawesome', 999);
```

### 2. Eliminación de Bloat

```php
// Emojis (-15KB)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// jQuery Migrate
wp_deregister_script('jquery');
wp_register_script('jquery', false);
```

### 3. Defer/Async Scripts

```php
wp_enqueue_script(
  'letras-theme-stack',
  $uri . '/js/theme-stack.js',
  array(),
  $version,
  array(
    'strategy' => 'defer',
    'in_footer' => true
  )
);
```

### 4. Lazy Load Imágenes

```php
add_filter('the_content', function($content) {
  return str_replace(
    '<img',
    '<img loading="lazy"',
    $content
  );
});
```

---

## 🔄 Flujo de Trabajo

### Desarrollo Local

```bash
# 1. Modificar source
vim src/input.css

# 2. Compilar Tailwind
npm run dev  # Watch mode

# 3. Modificar otros CSS
vim css/header.css

# 4. Refresh navegador
# Cache bust automático con filemtime()
```

### Deploy a Producción

```bash
# 1. Compilar assets
npm run build

# 2. Verificar tamaños
du -h css/*.css

# 3. Git commit
git add css/ js/
git commit -m "Build production assets"

# 4. Deploy
git push origin main
```

### Cache Busting

**Automático** en `functions.php`:

```php
wp_enqueue_style(
  'letras-header',
  $uri . '/css/header.css',
  array('letras-main'),
  filemtime($dir . '/css/header.css') // ← Timestamp automático
);
```

Resultado:
```html
<link href="/css/header.css?ver=1718740123" ...>
```

---

## 🐛 Debugging

### Verificar Orden de Carga

```bash
# Ver source HTML
curl https://letras.unmsm.edu.pe/ | grep -o '<link.*\.css' | head -20
```

Debe aparecer en orden:
```
1. variables.css
2. fontawesome/all.min.css
3. fontawesome-fix.css
4. tailwind.css
5. main.css
6. header.css
7. style.css
8. responsive.css
9. modern-ui.css
```

### Verificar Conflictos CSS

Chrome DevTools:
```
1. Inspeccionar elemento
2. Ver "Computed" tab
3. Buscar la propiedad conflictiva
4. Ver qué archivo gana
5. Revisar especificidad
```

### Verificar Performance

Lighthouse:
```
1. F12 → Lighthouse
2. Generar reporte
3. Ver "Opportunities"
4. Implementar sugerencias
```

---

## 📚 Convenciones de Código

### CSS

```css
/* ✅ BIEN - BEM naming */
.header-logo { }
.header-logo__img { }
.header-logo--small { }

/* ❌ MAL - Generic names */
.logo { }
.img { }
.small { }
```

### PHP

```php
// ✅ BIEN - Escape output
echo esc_html($title);
echo esc_url($link);

// ❌ MAL - XSS vulnerability
echo $title;
echo $link;
```

### JavaScript

```javascript
// ✅ BIEN - Alpine.js directive
<div x-data="{ open: false }">

// ❌ MAL - Inline onclick
<div onclick="toggle()">
```

---

## 🔐 Seguridad

### Escape de Output

```php
// HTML
esc_html($text)

// Atributos
esc_attr($value)

// URLs
esc_url($link)

// JavaScript
esc_js($code)
```

### Sanitización de Input

```php
// Texto
sanitize_text_field($_POST['name'])

// Email
sanitize_email($_POST['email'])

// URL
esc_url_raw($_POST['website'])
```

### Nonces

```php
// Crear
wp_nonce_field('action_name', 'nonce_field');

// Verificar
wp_verify_nonce($_POST['nonce_field'], 'action_name');
```

---

## 📈 Roadmap

### Fase 3 (Futuro)

- [ ] Reorganizar CSS en subcarpetas:
  ```
  css/
  ├── base/
  ├── components/
  ├── layouts/
  └── utilities/
  ```

- [ ] Implementar PostCSS autoprefixer
- [ ] Minificar CSS en producción
- [ ] Implementar Critical CSS
- [ ] Service Worker para offline

### Fase 4 (Largo Plazo)

- [ ] Migrar a WordPress Block Theme (FSE)
- [ ] Implementar Gutenberg blocks custom
- [ ] TypeScript para JavaScript
- [ ] Unit tests con Jest

---

## 🤝 Contribución

### Proceso

1. **Fork** del repositorio
2. **Branch** feature: `git checkout -b feature/nombre`
3. **Commit** changes: `git commit -am 'Add feature'`
4. **Push** branch: `git push origin feature/nombre`
5. **Pull Request** con descripción detallada

### Code Review Checklist

- [ ] ¿Código sigue convenciones?
- [ ] ¿Output escapado correctamente?
- [ ] ¿Inputs sanitizados?
- [ ] ¿Sin `!important` innecesarios?
- [ ] ¿CSS minificado?
- [ ] ¿JavaScript deferred?
- [ ] ¿Performance impact medido?

---

**Elaborado por**: Equipo Informática FLCH  
**Última revisión**: Junio 2026  
**Versión**: 2.0

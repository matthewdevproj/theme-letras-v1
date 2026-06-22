# 🎓 Tema Letras FLCH UNMSM

**Versión**: 2.0 (Refactorizada - Junio 2026)  
**Autor**: Letras FLCH (@msau)  
**WordPress**: 6.0+  
**PHP**: 7.4+

---

## 📋 Descripción

Tema WordPress moderno y optimizado para la Facultad de Letras y Ciencias Humanas de la Universidad Nacional Mayor de San Marcos.

**Características principales**:
- ✅ Arquitectura moderna - CSS/JS organizado en módulos
- ✅ Performance optimizado - 20KB Tailwind, assets minificados
- ✅ Responsive - Mobile-first approach
- ✅ Accesible - WCAG AA compliance
- ✅ Tailwind CSS - Utilities puras (sin conflictos)
- ✅ Alpine.js - Interactividad reactiva ligera
- ✅ GSAP - Animaciones premium (condicional)

---

## 📁 Estructura Optimizada

```
theme-letras-v1/
├── css/
│   ├── fontawesome-fix.css    # Fix global FontAwesome (2KB)
│   ├── fonts.css              # Google Fonts (4KB)
│   ├── header.css             # Header/Topbar (28KB) ← NUEVO
│   ├── main.css               # Estilos legacy (104KB)
│   ├── modern-ui.css          # Componentes modernos (12KB)
│   ├── responsive.css         # Media queries (12KB)
│   ├── tailwind.css           # Utilities PURAS (20KB) ← OPTIMIZADO
│   └── variables.css          # CSS custom properties (4KB)
│
├── js/
│   ├── vendor/
│   │   ├── alpine.min.js      # Alpine.js 3.14.8 (44KB)
│   │   ├── gsap.min.js        # GSAP (72KB)
│   │   └── ScrollTrigger.min.js (44KB)
│   ├── header-effects.js
│   ├── home-animations.js
│   └── theme-stack.js
│
├── src/
│   └── input.css              # Source Tailwind
│
├── functions.php              # Configuración principal
├── header.php                 # Header (sin CSS inline)
└── tailwind.config.js
```

---

## 🚀 Instalación Rápida

```bash
# 1. Clonar tema
cd wp-content/themes/
git clone [repo] theme-letras-v1

# 2. Activar desde WordPress
# Apariencia → Temas → Activar "Letras FLCH"

# 3. (Opcional) Desarrollo - Instalar dependencias
cd theme-letras-v1
npm install
```

---

## 🛠️ Desarrollo

### Compilar Tailwind

```bash
# Desarrollo (watch)
npm run dev

# Producción (minificado)
npm run build

# Manual
node node_modules/tailwindcss/lib/cli.js -i ./src/input.css -o ./css/tailwind.css --minify
```

### Orden de Carga CSS (Optimizado)

```
1. variables.css       → Custom properties
2. fontawesome-fix.css → Fix FA rendering
3. tailwind.css        → Utilities (NO components)
4. main.css            → Legacy
5. header.css          → Header/Topbar
6. style.css           → Tema principal
7. responsive.css      → Media queries
8. modern-ui.css       → Componentes modernos
```

---

## ⚡ Performance

| Métrica | Antes | Después v2.0 | Mejora |
|---------|-------|--------------|--------|
| **Tailwind CSS** | 24KB | 20KB | **-17%** |
| **CSS inline** | 28KB | 0KB | **-100%** |
| **!important** | 18+ | 0 | **-100%** |
| **Conflictos CSS** | 4 archivos | 0 | **-100%** |

---

## 🐛 Troubleshooting

### Icons FontAwesome no visibles

✅ **Solución**: `fontawesome-fix.css` ya está cargado globalmente.

### Underline persiste en hover

✅ **Corregido**: Tailwind ya NO genera `.main-menu`.

### Conflictos CSS

✅ **Corregido**: Orden de carga optimizado, sin `!important`.

---

## 📝 Changelog v2.0

**✅ Arquitectura**:
- Creado `css/header.css` (28KB extraídos de inline)
- Consolidado `css/fontawesome-fix.css`
- Tailwind reconfigurado (solo utilities)

**✅ Performance**:
- -74 líneas de código duplicado
- -18 `!important` innecesarios
- -4KB en Tailwind

**🐛 Bugs**:
- Header underline persistente
- FontAwesome invisible
- Doble underline topbar
- Espacio blanco superior

---

## 📧 Contacto

- **Email**: informatica.letras@unmsm.edu.pe
- **Web**: https://letras.unmsm.edu.pe

---

**Desarrollado con ❤️ por Informática FLCH UNMSM**

# 🎓 TEMPLATE PARA ESCUELAS PROFESIONALES

Este documento explica cómo replicar la estructura de **Arte-FLCH** en las demás escuelas profesionales de la Facultad de Letras.

---

## 📋 Escuelas que deben usar este template

1. ✅ **Arte** (referencia - ya implementado)
2. ⏳ Lingüística
3. ⏳ Literatura
4. ⏳ Comunicación Social
5. ⏳ Filosofía
6. ⏳ Bibliotecología y Ciencias de la Información

---

## 🎨 Estructura Recomendada

### 1. Hero Section (Primer pantallazo)

**Altura responsive:**
- Mobile: 65-70vh
- Tablet: 75-80vh
- Desktop: 85-92vh

**Elementos:**
- Badge/Eyebrow: "Escuela Profesional de..."
- Título principal: Nombre de la escuela
- Descripción breve: 1-2 líneas sobre la escuela
- CTA principal: "Conoce más" / "Admisión"
- Imagen de fondo: Relacionada con la escuela

**Código Elementor:**
```
Section > Background > Slideshow
  - Image: foto-escuela.jpg
  - Overlay: Navy (#143B63) con 40% opacidad
  
Column > Widgets:
  - Heading (H1): "Arte"
    - Color: White
    - Typography: Libre Baskerville, 3rem
  - Text: Descripción
    - Color: White 90%
    - Typography: DM Sans, 1.125rem
  - Button: "Conoce más"
    - Style: Fill
    - Color: Gold (#A88F1D)
```

---

### 2. Tabs de Navegación

**Tabs principales:**
1. **Inicio** - Overview de la escuela
2. **Plan de Estudios** - Cursos y malla curricular
3. **Docentes** - Plana docente
4. **Investigación** - Proyectos y publicaciones
5. **Admisión** - Requisitos y proceso

**Implementación Alpine.js:**
```html
<nav class="nv" role="tablist" x-data="{ activeTab: 'inicio' }">
    <button role="tab" 
            :class="{ 'active': activeTab === 'inicio' }"
            @click="activeTab = 'inicio'">
        Inicio
    </button>
    <!-- Repetir para cada tab -->
</nav>

<div id="ar">
    <div x-show="activeTab === 'inicio'" x-cloak>
        <!-- Contenido del tab -->
    </div>
    <!-- Repetir para cada tab -->
</div>
```

**Estilos de tabs (ya en main.css):**
```css
.nv {
    position: sticky;
    top: 80px;
    z-index: 100;
    background: rgba(255,255,255,0.98);
    backdrop-filter: blur(12px);
}

[role="tab"] {
    padding: 0.875rem 1.5rem;
    border-bottom: 3px solid transparent;
    transition: all 0.3s;
}

[role="tab"].active {
    border-bottom-color: #A88F1D;
    color: #143B63;
}
```

---

### 3. Sección Inicio (Tab por defecto)

**Subsecciones:**

#### 3.1 Bienvenida
- Título H2: "Bienvenido a la Escuela de [Nombre]"
- Párrafo introductorio (2-3 párrafos)
- Imagen destacada

#### 3.2 Misión y Visión
- Grid 2 columnas (1 columna en mobile)
- Ícono + Título + Descripción

#### 3.3 Estadísticas
```html
<div class="stats-grid">
    <div class="stat-card">
        <span class="stat-number" data-count="150">0</span>
        <span class="stat-label">Estudiantes</span>
    </div>
    <!-- Repetir -->
</div>
```

#### 3.4 Destacados
- Cards de noticias/eventos recientes
- Grid responsive (1-2-3 columnas)

---

### 4. Sección Plan de Estudios

**Estructura:**

#### 4.1 Título y descripción
- H2: "Plan de Estudios"
- Párrafo explicativo

#### 4.2 Tabla de cursos
```html
<table class="tbl tablepress">
    <thead>
        <tr>
            <th>Código</th>
            <th>Curso</th>
            <th>Créditos</th>
            <th>Ciclo</th>
        </tr>
    </thead>
    <tbody>
        <!-- Cursos por ciclo -->
    </tbody>
</table>
```

**Nota:** DataTables se inicializará automáticamente con búsqueda y paginación.

#### 4.3 Documentos descargables
- Malla curricular PDF
- Sílabos
- Reglamentos

---

### 5. Sección Docentes

**Estructura:**

#### 5.1 Grid de docentes
```html
<div class="docentes-grid">
    <div class="docente-card">
        <img src="foto-docente.jpg" alt="Nombre">
        <h3>Dr. Nombre Apellido</h3>
        <p class="cargo">Profesor Principal</p>
        <p class="especialidad">Especialidad</p>
        <div class="contact">
            <a href="mailto:email@unmsm.edu.pe">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>
</div>
```

**CSS (agregar a main.css si no existe):**
```css
.docentes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 2rem;
}

.docente-card {
    text-align: center;
    padding: 1.5rem;
    border-radius: 12px;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: transform 0.3s, box-shadow 0.3s;
}

.docente-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(20,59,99,0.15);
}

.docente-card img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 1rem;
}
```

---

### 6. Sección Investigación

**Estructura:**

#### 6.1 Proyectos activos
- Cards con título, descripción, investigadores
- Filtro por año (opcional)

#### 6.2 Publicaciones
- Lista o tabla con:
  - Título
  - Autores
  - Año
  - Link al PDF/DOI

#### 6.3 Grupos de investigación
- Cards con nombre y líneas de investigación

---

### 7. Sección Admisión

**Estructura:**

#### 7.1 Requisitos
- Lista con íconos de requisitos
- Proceso paso a paso

#### 7.2 Fechas importantes
- Timeline con fechas clave

#### 7.3 Documentos
- Links a formularios
- Prospecto de admisión

#### 7.4 Contacto
- Formulario de consultas
- Horarios de atención
- Ubicación

---

## 🎨 Guía de Colores por Escuela

### Sistema de colores FLCH

**Base (todas las escuelas):**
- Navy: `#143B63` (color principal FLCH)
- Gold: `#A88F1D` (acento estratégico)

**Colores secundarios por escuela:**

| Escuela | Color Secundario | Hex |
|---------|------------------|-----|
| Arte | Lavanda | `#B3B0CC` |
| Lingüística | Azul cielo | `#69BCE2` |
| Literatura | Verde bosque | `#4A7C59` |
| Comunicación | Naranja | `#E67E22` |
| Filosofía | Púrpura | `#8E44AD` |
| Bibliotecología | Turquesa | `#16A085` |

**Uso:**
- Badges específicos de la escuela
- Highlights en tabs activos
- Bordes de cards destacadas

---

## 📦 Activar Efectos GSAP en Nueva Escuela

### Paso 1: Agregar slug al array

Editar `/inc/letras-performance.php`:

```php
$gsap_pages = [
    'arte-flch',
    'escuela-profesional-de-arte',
    'linguistica-flch',
    'escuela-profesional-de-linguistica',  // ← Agregar aquí
    'literatura-flch',
    'escuela-profesional-de-literatura',
    // ... etc
];
```

### Paso 2: Verificar que la página existe

```bash
wp post list --post_type=page --s="literatura" --fields=ID,post_title,post_name --allow-root
```

### Paso 3: Listo

Los siguientes scripts se cargarán automáticamente:
- ✅ GSAP + ScrollTrigger
- ✅ Arte Effects (reveal, parallax, tabs, etc.)
- ✅ Page Transitions
- ✅ Header Effects

---

## 🧪 Checklist de Implementación

Para cada nueva escuela, verificar:

### Contenido
- [ ] Hero con imagen representativa
- [ ] Tabs navegables (Alpine.js)
- [ ] Sección Inicio completa
- [ ] Plan de Estudios (tabla DataTables)
- [ ] Docentes con fotos y contacto
- [ ] Investigación (opcional si aplica)
- [ ] Admisión con requisitos

### Técnico
- [ ] Slug agregado a `$gsap_pages` en letras-performance.php
- [ ] Imágenes optimizadas (WebP, <200KB)
- [ ] Alt text en todas las imágenes
- [ ] Enlaces funcionando
- [ ] Formularios conectados

### Visual
- [ ] Hero responsive (65-70-85vh según device)
- [ ] Tabs sticky funciona
- [ ] Cards con hover effects
- [ ] No hay espacio blanco superior
- [ ] Colores de la escuela aplicados

### Performance
- [ ] GSAP carga correctamente
- [ ] Animaciones suaves
- [ ] Page transitions activas
- [ ] DataTables inicializa en tabs ocultos
- [ ] Sin errores en consola

---

## 🔧 Debugging Común

### Problema: Espacio blanco superior

**Solución:** Ya corregido en `arte-flch-effects.js`:
```javascript
// Skip primera sección para evitar espacio blanco
if (idx === 0) return;
```

Y en `main.css`:
```css
body > main > section:first-of-type {
    margin-top: 0 !important;
    transform: none !important;
}
```

---

### Problema: Tabs no animan al aparecer

**Causa:** Alpine no detecta cambio de visibilidad

**Solución:** Ya implementado con MutationObserver en `arte-flch-effects.js`.

---

### Problema: DataTables no aparece en tabs ocultos

**Solución:** Ya corregido en `letras-datatables-helper` (letras-performance.php).

---

## 📝 Template HTML Base

```html
<!-- HERO SECTION -->
<section class="flch-hero" style="min-height: 85vh; background: url('hero.jpg') center/cover;">
    <div class="container">
        <span class="flch-hero__badge">Escuela Profesional de</span>
        <h1 class="flch-hero__title">Arte</h1>
        <p class="flch-hero__description">
            Formamos artistas integrales...
        </p>
        <div class="flch-hero__buttons">
            <a href="#admision" class="flch-btn flch-btn--primary">Admisión</a>
            <a href="#plan" class="flch-btn flch-btn--outline">Plan de Estudios</a>
        </div>
    </div>
</section>

<!-- TABS NAVIGATION -->
<nav class="nv" role="tablist" x-data="{ activeTab: 'inicio' }">
    <button role="tab" 
            :class="{ 'active': activeTab === 'inicio' }"
            @click="activeTab = 'inicio'">
        Inicio
    </button>
    <button role="tab" 
            :class="{ 'active': activeTab === 'plan' }"
            @click="activeTab = 'plan'">
        Plan de Estudios
    </button>
    <!-- ... más tabs -->
</nav>

<!-- TABS CONTENT -->
<div id="ar" class="container">
    
    <!-- TAB: INICIO -->
    <div x-show="activeTab === 'inicio'" x-cloak>
        <h2>Bienvenido a Arte</h2>
        <p>Contenido del tab inicio...</p>
    </div>
    
    <!-- TAB: PLAN DE ESTUDIOS -->
    <div x-show="activeTab === 'plan'" x-cloak>
        <h2>Plan de Estudios</h2>
        <table class="tbl tablepress">
            <!-- Tabla de cursos -->
        </table>
    </div>
    
    <!-- ... más tabs -->
    
</div>
```

---

## 🎯 Próximos Pasos

1. **Replicar en Lingüística** (ya parcialmente hecho)
2. Implementar en Literatura
3. Implementar en Comunicación Social
4. Implementar en Filosofía
5. Implementar en Bibliotecología

**Tiempo estimado por escuela:** 2-3 horas (con contenido ya preparado)

---

## 📚 Recursos

**Documentación:**
- Alpine.js: https://alpinejs.dev/
- DataTables: https://datatables.net/
- GSAP: https://greensock.com/docs/

**Assets:**
- Imágenes hero: Solicitar a comunicaciones
- Fotos docentes: Base de datos UNMSM
- Documentos PDF: Cada escuela proporciona

**Contacto técnico:**
- Desarrollador: Claude Code
- Documentación: `/MEJORAS-JUNIO-2026.md`

---

**Última actualización:** 6 de junio de 2026  
**Versión template:** 1.0  
**Basado en:** Arte-FLCH (referencia)

\# 🧠 DESIGN-OS — CÓDICE (FINAL v2)



\## 1. IDENTIDAD DEL SISTEMA



Este sistema define las reglas de diseño y desarrollo frontend del proyecto Códice para la Facultad de Letras de la UNMSM.



Su propósito no es generar interfaces decorativas, sino construir una plataforma institucional:



\- clara

\- accesible (WCAG AA)

\- rápida

\- mantenible

\- consistente



Todo diseño está subordinado al contenido académico.



\---



\## 2. PRINCIPIO FUNDAMENTAL



El contenido es el centro del sistema.



La interfaz solo existe para hacerlo comprensible.



Si la interfaz compite con el contenido, es incorrecta.



\---



\## 3. SKILL REGISTRY (DEPENDENCIAS)



El sistema se apoya en skills modulares ubicados en:



\- `/inc/skills-design/taste-skill.md`

\- `/inc/skills-design/minimal-design.md`

\- `/inc/skills-design/brand-guidelines.md`

\- `/inc/skills-design/frontend-architecture.md`

\- `/inc/skills-design/shadcn-composition.md`



Estos archivos contienen conocimiento, no reglas de decisión.



\---



\## 4. DESIGN DECISION PIPELINE (OBLIGATORIO)



Toda decisión de diseño debe pasar por:



1\. Taste Evaluation

2\. Minimal Evaluation

3\. Brand Consistency Evaluation

4\. Frontend Architecture Check

5\. Component Pattern Validation

6\. Gutenberg Compatibility Check

7\. Performance Cost Check

8\. Accessibility Check (WCAG AA)



Si una etapa falla → la propuesta se rechaza.



\---



\## 5. DESIGN DECISION GATE (REGLA CENTRAL)



Ningún componente es válido si no responde:



\- ¿Mejora la comprensión del contenido?

\- ¿Es estrictamente necesario?

\- ¿Puede resolverse con Gutenberg o bloques nativos?

\- ¿Cuál es su costo en performance?

\- ¿Compromete accesibilidad?



Sin justificación funcional → se elimina.



\---



\## 6. DESIGN RULE ENGINE (RESTRICCIONES DURAS)



Está prohibido:



\- Glassmorphism decorativo

\- Animaciones sin función

\- Parallax o scroll hijacking

\- Fondos complejos sin propósito

\- Cursor personalizados

\- Efectos visuales sin impacto funcional



Toda complejidad debe tener justificación explícita.



\---



\## 7. COMPONENT PATTERN SYSTEM (OBLIGATORIO)



Todo frontend debe seguir esta jerarquía:



\### 7.1 Jerarquía



\- Atoms → botones, inputs, labels

\- Molecules → cards, forms, nav items

\- Organisms → hero, grids, sections

\- Templates → páginas completas



\---



\### 7.2 Component Contract



Todo componente debe definir:



\- purpose (qué resuelve)

\- props (entradas claras)

\- variants (variaciones reales)

\- states (loading, empty, error, active)

\- composition (cómo se integra)



Si no puede describirse así → no es válido.



\---



\## 8. GUTENBERG-FIRST RULE



Todo diseño debe ser implementable con:



\- bloques Gutenberg

\- patrones de bloques

\- template parts

\- theme.json



Si no es compatible → debe rediseñarse.



\---



\## 9. PERFORMANCE BUDGET



Cada decisión debe optimizar:



\- JS mínimo necesario

\- CSS sin redundancia

\- evitar recalculo excesivo

\- animaciones solo funcionales



La solución más simple funcional es la correcta.



\---



\## 10. ACCESSIBILITY STANDARD



Obligatorio WCAG AA:



\- contraste correcto

\- navegación por teclado

\- estructura semántica

\- soporte screen readers



La accesibilidad no es opcional.



\---



\## 11. FRONTEND ACCEPTANCE CRITERIA



Una implementación solo es válida si:



\- reutiliza componentes existentes

\- no duplica templates o bloques

\- usa tokens del design system

\- mantiene coherencia visual

\- no introduce estilos one-off



\---



\## 12. DESIGN METRICS SYSTEM



Toda UI debe poder evaluarse con métricas:



\### 12.1 Taste Score (0–100)

\- jerarquía visual

\- tipografía

\- ritmo

\- consistencia



\---



\### 12.2 Complexity Score (0–100)

\- número de componentes

\- profundidad de estructura

\- acoplamiento



👉 objetivo: mantener bajo



\---



\### 12.3 Performance Impact



\- 🟢 Bajo (ideal)

\- 🟡 Medio (justificado)

\- 🔴 Alto (evitar)



\---



\### 12.4 Accessibility Score



\- WCAG AA obligatorio

\- navegación completa por teclado

\- semántica correcta



\---



\## 13. DESIGN COMPILER RULE



El sistema funciona como un compilador:



Una propuesta de UI solo es válida si pasa todas las capas del pipeline.



Si falla una regla → es inválida.



No existen excepciones estéticas.



\---



\## 14. OUTPUT CONTRACT (OBLIGATORIO)



Toda propuesta debe incluir:



\- objetivo funcional

\- justificación basada en contenido

\- relación con el dominio institucional

\- componentes necesarios

\- bloques Gutenberg requeridos

\- tokens del sistema involucrados

\- impacto en performance

\- impacto en accesibilidad



\---



\## 15. PRIORIDAD DEL SISTEMA



En caso de conflicto:



1\. Accesibilidad

2\. Performance

3\. Contenido

4\. Arquitectura

5\. Estética



La estética nunca domina la decisión.



\---



\## 16. DECLARACIÓN FINAL



Este sistema no optimiza diseño visual.



Optimiza claridad, estructura, accesibilidad y sostenibilidad institucional.



Toda decisión debe ser explicable sin recurrir a argumentos estéticos.

```


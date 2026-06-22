<?php
/**
 * Diagnóstico de Recursos Cargados
 * Muestra todos los CSS y JS encolados en una página
 *
 * USO: Agregar ?diagnostico=1 a cualquier URL
 * Ejemplo: https://letras.unmsm.edu.pe/escuelas/arte-flch/?diagnostico=1
 */

if (!isset($_GET['diagnostico'])) {
    return; // Solo ejecutar si se pasa el parámetro
}

add_action('wp_footer', function() {
    global $wp_scripts, $wp_styles;

    // Verificar que el usuario esté logueado (seguridad)
    if (!is_user_logged_in()) {
        echo '<div style="display:none">Diagnóstico disponible solo para usuarios logueados</div>';
        return;
    }
    ?>

    <div id="diagnostico-recursos" style="
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        max-height: 50vh;
        overflow-y: auto;
        background: #1e1e1e;
        color: #d4d4d4;
        font-family: 'Courier New', monospace;
        font-size: 12px;
        padding: 20px;
        box-shadow: 0 -4px 20px rgba(0,0,0,0.5);
        z-index: 999999;
        border-top: 3px solid #007acc;
    ">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <h3 style="margin: 0; color: #007acc; font-size: 16px;">
                🔍 Diagnóstico de Recursos Cargados
            </h3>
            <button onclick="document.getElementById('diagnostico-recursos').remove()" style="
                background: #dc3545;
                color: white;
                border: none;
                padding: 5px 15px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 12px;
            ">Cerrar</button>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

            <!-- CSS -->
            <div>
                <h4 style="color: #4ec9b0; margin: 10px 0; border-bottom: 2px solid #4ec9b0; padding-bottom: 5px;">
                    📄 Hojas de Estilo (CSS) - <?php echo count($wp_styles->queue); ?> archivos
                </h4>
                <table style="width: 100%; border-collapse: collapse; font-size: 11px;">
                    <thead>
                        <tr style="background: #2d2d2d;">
                            <th style="padding: 5px; text-align: left; color: #ce9178;">#</th>
                            <th style="padding: 5px; text-align: left; color: #ce9178;">Handle</th>
                            <th style="padding: 5px; text-align: left; color: #ce9178;">Versión</th>
                            <th style="padding: 5px; text-align: left; color: #ce9178;">Conflicto?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $conflicts = ['font-awesome', 'fontawesome', 'swiper', 'bootstrap'];
                        $conflict_groups = [];

                        foreach ($wp_styles->queue as $handle) {
                            $style = $wp_styles->registered[$handle];
                            $is_conflict = false;

                            foreach ($conflicts as $conflict) {
                                if (stripos($handle, $conflict) !== false) {
                                    $is_conflict = true;
                                    if (!isset($conflict_groups[$conflict])) {
                                        $conflict_groups[$conflict] = [];
                                    }
                                    $conflict_groups[$conflict][] = $handle;
                                }
                            }

                            $bg_color = $i % 2 ? '#252526' : '#1e1e1e';
                            $conflict_badge = $is_conflict ? '<span style="background:#ffc107;color:#000;padding:2px 6px;border-radius:3px;font-size:10px;">⚠️ REVISAR</span>' : '';

                            echo "<tr style='background: $bg_color;'>";
                            echo "<td style='padding: 5px; color: #858585;'>$i</td>";
                            echo "<td style='padding: 5px; color: #9cdcfe;'>$handle</td>";
                            echo "<td style='padding: 5px; color: #ce9178;'>{$style->ver}</td>";
                            echo "<td style='padding: 5px;'>$conflict_badge</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>

                <?php if (!empty($conflict_groups)): ?>
                <div style="margin-top: 10px; padding: 10px; background: #4a1f1f; border-left: 4px solid #f44336; border-radius: 4px;">
                    <strong style="color: #f44336;">⚠️ Posibles Duplicados Detectados:</strong>
                    <?php foreach ($conflict_groups as $type => $handles): ?>
                        <?php if (count($handles) > 1): ?>
                        <div style="margin-top: 5px;">
                            <span style="color: #ffc107;"><?php echo strtoupper($type); ?>:</span>
                            <span style="color: #d4d4d4;"><?php echo implode(', ', $handles); ?></span>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- JavaScript -->
            <div>
                <h4 style="color: #dcdcaa; margin: 10px 0; border-bottom: 2px solid #dcdcaa; padding-bottom: 5px;">
                    ⚡ Scripts (JavaScript) - <?php echo count($wp_scripts->queue); ?> archivos
                </h4>
                <table style="width: 100%; border-collapse: collapse; font-size: 11px;">
                    <thead>
                        <tr style="background: #2d2d2d;">
                            <th style="padding: 5px; text-align: left; color: #ce9178;">#</th>
                            <th style="padding: 5px; text-align: left; color: #ce9178;">Handle</th>
                            <th style="padding: 5px; text-align: left; color: #ce9178;">Versión</th>
                            <th style="padding: 5px; text-align: left; color: #ce9178;">Ubicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $js_conflicts = ['jquery', 'swiper', 'gsap', 'alpine', 'bootstrap', 'tinymce'];
                        $js_conflict_groups = [];

                        foreach ($wp_scripts->queue as $handle) {
                            $script = $wp_scripts->registered[$handle];
                            $location = isset($script->extra['group']) && $script->extra['group'] === 1 ? 'Footer' : 'Header';
                            $is_conflict = false;

                            foreach ($js_conflicts as $conflict) {
                                if (stripos($handle, $conflict) !== false) {
                                    $is_conflict = true;
                                    if (!isset($js_conflict_groups[$conflict])) {
                                        $js_conflict_groups[$conflict] = [];
                                    }
                                    $js_conflict_groups[$conflict][] = $handle;
                                }
                            }

                            $bg_color = $i % 2 ? '#252526' : '#1e1e1e';
                            $color = $is_conflict ? '#ffc107' : '#9cdcfe';

                            echo "<tr style='background: $bg_color;'>";
                            echo "<td style='padding: 5px; color: #858585;'>$i</td>";
                            echo "<td style='padding: 5px; color: $color;'>$handle</td>";
                            echo "<td style='padding: 5px; color: #ce9178;'>{$script->ver}</td>";
                            echo "<td style='padding: 5px; color: #858585;'>$location</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>

                <?php if (!empty($js_conflict_groups)): ?>
                <div style="margin-top: 10px; padding: 10px; background: #4a1f1f; border-left: 4px solid #f44336; border-radius: 4px;">
                    <strong style="color: #f44336;">⚠️ Posibles Duplicados JS:</strong>
                    <?php foreach ($js_conflict_groups as $type => $handles): ?>
                        <?php if (count($handles) > 1): ?>
                        <div style="margin-top: 5px;">
                            <span style="color: #ffc107;"><?php echo strtoupper($type); ?>:</span>
                            <span style="color: #d4d4d4;"><?php echo implode(', ', $handles); ?></span>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

        </div>

        <div style="margin-top: 15px; padding: 10px; background: #1a472a; border-left: 4px solid #4caf50; border-radius: 4px;">
            <strong style="color: #4caf50;">💡 Consejos:</strong>
            <ul style="margin: 5px 0; padding-left: 20px; color: #d4d4d4;">
                <li>Scripts duplicados (ej: 2+ FontAwesome) causan conflictos</li>
                <li>TinyMCE en frontend es ~400KB innecesario</li>
                <li>jQuery Migrate solo es necesario para código legacy</li>
                <li>Scripts en Header bloquean renderizado (mover a Footer)</li>
            </ul>
        </div>

        <div style="margin-top: 10px; text-align: center; color: #858585; font-size: 10px;">
            Página actual: <?php echo esc_url($_SERVER['REQUEST_URI']); ?>
        </div>
    </div>

    <?php
}, 9999);

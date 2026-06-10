/**
 * LETRAS FLCH - Page Transitions v2
 * CORRECCION CRITICA: El overlay ya NO bloquea la pagina al cargar.
 * Solo aparece durante la transicion de SALIDA (al navegar a otra pagina).
 */
(function() {
    "use strict";

    var DOMAIN = window.location.hostname;
    var transitioning = false;

    // Crear overlay OCULTO desde el inicio (opacity:0)
    var overlay = document.createElement("div");
    overlay.id = "flch-transition-overlay";
    overlay.style.cssText = [
        "position: fixed",
        "inset: 0",
        "background: linear-gradient(135deg, #143B63 0%, #0E2A48 100%)",
        "z-index: 99999",
        "pointer-events: none",
        "opacity: 0",
        "display: flex",
        "align-items: center",
        "justify-content: center"
    ].join("; ");

    var spinner = document.createElement("div");
    spinner.style.cssText = [
        "width: 60px",
        "height: 60px",
        "border: 4px solid rgba(168,143,29,0.2)",
        "border-top-color: #A88F1D",
        "border-right-color: #A88F1D",
        "border-radius: 50%",
        "animation: flch-spin 0.8s linear infinite"
    ].join("; ");

    overlay.appendChild(spinner);
    document.body.appendChild(overlay);

    var st = document.createElement("style");
    st.textContent = "@keyframes flch-spin { to { transform: rotate(360deg); } }";
    document.head.appendChild(st);

    function waitForGSAP(cb, n) {
        n = n || 0;
        if (typeof gsap !== "undefined") {
            cb();
        } else if (n < 40) {
            setTimeout(function() { waitForGSAP(cb, n + 1); }, 50);
        } else {
            console.warn("Page transitions: GSAP no disponible");
        }
    }

    waitForGSAP(function() {

        // Body: fade-in muy suave (NO desde opacity:0 - siempre visible)
        gsap.fromTo("body",
            { y: 8 },
            { y: 0, duration: 0.4, ease: "power2.out", clearProps: "all" }
        );

        // Interceptar clicks en links internos para transicion de SALIDA
        document.addEventListener("click", function(e) {
            if (transitioning) return;
            var link = e.target.closest("a[href]");
            if (!link) return;
            var href = link.getAttribute("href");
            if (!href) return;

            if (
                link.getAttribute("target") === "_blank" ||
                link.hasAttribute("download") ||
                href.charAt(0) === "#" ||
                href.indexOf("mailto:") === 0 ||
                href.indexOf("tel:") === 0 ||
                href.indexOf("/wp-admin") !== -1 ||
                href.indexOf("/wp-login") !== -1 ||
                href.indexOf("/wp-json") !== -1 ||
                link.classList.contains("no-transition") ||
                (href.indexOf("http") === 0 && href.indexOf(DOMAIN) === -1)
            ) {
                return;
            }

            e.preventDefault();
            transitioning = true;
            overlay.style.pointerEvents = "all";

            gsap.to(overlay, {
                opacity: 1,
                duration: 0.35,
                ease: "power3.in",
                onComplete: function() {
                    window.location.href = href;
                }
            });
            gsap.to("body", { opacity: 0, y: -15, duration: 0.35, ease: "power2.in" });
        });

        window.addEventListener("pageshow", function(e) {
            if (e.persisted) {
                transitioning = false;
                overlay.style.pointerEvents = "none";
                gsap.to(overlay, { opacity: 0, duration: 0.3 });
                gsap.to("body", { opacity: 1, y: 0, duration: 0.3, clearProps: "all" });
            }
        });

        console.log("LETRAS Page Transitions v2: activas (overlay solo en exit)");
    });
})();

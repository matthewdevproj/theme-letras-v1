(function() {
    "use strict";

    var DOMAIN = window.location.hostname;
    var transitioning = false;
    var overlay = null;

    function createOverlay() {
        if (overlay) return;

        overlay = document.createElement("div");
        overlay.id = "flch-page-overlay";
        overlay.style.cssText = [
            "position: fixed",
            "inset: 0",
            "z-index: 99999",
            "background: linear-gradient(135deg, #0A1E3C 0%, #143B63 50%, #0C1521 100%)",
            "display: flex",
            "flex-direction: column",
            "align-items: center",
            "justify-content: center",
            "gap: 2rem",
            "opacity: 0",
            "pointer-events: none",
            "transition: opacity 0.2s ease"
        ].join("; ");

        var img = document.createElement("img");
        img.src = (window.flchTransition && flchTransition.logoUrl) || "";
        img.alt = "FLCH";
        img.style.cssText = "width: 260px; height: auto; opacity: 0.95;";

        var barWrap = document.createElement("div");
        barWrap.style.cssText = "width: 120px; height: 2px; background: rgba(255,255,255,0.15); border-radius: 2px; overflow: hidden;";

        var bar = document.createElement("div");
        bar.style.cssText = "width: 0%; height: 100%; background: #A8861C; border-radius: 2px; transition: width 0.3s ease;";
        barWrap.appendChild(bar);

        overlay.appendChild(img);
        overlay.appendChild(barWrap);
        document.body.appendChild(overlay);
    }

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
        createOverlay();

        // Body fade-in on page load
        gsap.fromTo("body",
            { y: 10, opacity: 0.97 },
            { y: 0, opacity: 1, duration: 0.35, ease: "power2.out", clearProps: "all" }
        );

        // Intercept internal links for exit transition
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

            var bar = overlay.querySelector("div:last-child div");
            if (bar) bar.style.width = "70%";

            gsap.to(overlay, {
                opacity: 1,
                duration: 0.2,
                ease: "power2.in",
                onComplete: function() {
                    if (bar) bar.style.width = "100%";
                    setTimeout(function() {
                        window.location.href = href;
                    }, 120);
                }
            });
        });

        window.addEventListener("pageshow", function(e) {
            if (e.persisted) {
                transitioning = false;
                if (overlay) {
                    overlay.style.pointerEvents = "none";
                    gsap.to(overlay, { opacity: 0, duration: 0.25, ease: "power2.out" });
                }
                gsap.fromTo("body",
                    { y: 10, opacity: 0.97 },
                    { y: 0, opacity: 1, duration: 0.3, ease: "power2.out", clearProps: "all" }
                );
            }
        });

        console.log("LETRAS Page Transitions v4: overlay con logo FLCH");
    });
})();

document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");
    const speed = 200; // smaller = faster

    const formatNumber = (num, suffix) => {
        if (suffix) return num + suffix;
        return num.toLocaleString();
    };

    const startCounting = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute("data-target");
            const suffix = counter.getAttribute("data-suffix") || "";
            let current = 0;

            const update = () => {
                const increment = Math.ceil(target / speed);
                current += increment;

                if (current < target) {
                    counter.innerText = current;
                    requestAnimationFrame(update);
                } else {
                    // Apply final formatted value
                    if (suffix === "K+") {
                        counter.innerText = Math.round(target / 1000) + "K+";
                    } else if (suffix === "M+") {
                        counter.innerText = Math.round(target / 1000000) + "M+";
                    } else if (suffix === "B+") {
                        counter.innerText = Math.round(target / 1000000000) + "B+";
                    } else {
                        counter.innerText = target.toLocaleString() + suffix;
                    }
                }
            };

            update();
        });
    };

    // Run when visible
    const counterElement = document.querySelector(".counter");
    if (counterElement) {
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                startCounting();
                observer.disconnect();
            }
        });

        observer.observe(counterElement);
    }
});




// Flow map SVG - only initialize if element exists
const svg = document.getElementById("flow-map");
if (svg) {
    const width = svg.clientWidth;
    const height = svg.clientHeight;

    const centerX = width / 2;
    const centerY = height - 80; // Qwaiting position

    const items = ["Zm", "Tm", "Go", "Ou", "Sl", "Sf", "Jr"];
    const topY = 100;

    // spread curve end points (the trick!)
    const endSpread = 6; // how wide the bottom fan spreads

    svg.innerHTML = "";

    items.forEach((label, i) => {

        const x = ((i + 1) / (items.length + 1)) * width;

        // Slight offset so lines don't merge
        const targetX = centerX + (i - Math.floor(items.length / 2)) * endSpread;

        const d = `
                            M ${x},${topY}
                            C ${x},${centerY - 200}
                            ${targetX},${centerY - 120}
                            ${targetX},${centerY}
                        `;

        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("d", d);
        path.setAttribute("fill", "none");
        path.setAttribute("stroke", "#3C3CFF");
        path.setAttribute("stroke-width", "2");
        path.setAttribute("stroke-linecap", "round");
        svg.appendChild(path);
    });
}



// Simple Mobile Menu Toggle
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        if (menu) {
            menu.classList.toggle('hidden');
        }
    });
}


function toggleFaq(id) {
    const element = document.getElementById(id);
    element.classList.toggle('hidden');
}

function toggleCart() {
    const sidebar = document.getElementById('cartSidebar');
    sidebar.classList.toggle('translate-x-full');
}

// Initialize all FAQs as visible
document.addEventListener('DOMContentLoaded', () => {
    // FAQs are visible by default, no need to hide them
});



// ==========================================
// LEGACY / GENERIC TAB SWITCHING (e.g. Digital Signage)
// Checks for .tab-btn and .tab-content
// ==========================================
function legacySwitchTab(tabId) {
    const tabContent = document.getElementById(tabId);
    const tabBtn = document.getElementById('btn-' + tabId);

    if (!tabContent || !tabBtn) return; // Guard clause

    // Hide all tab content
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });

    // Remove active class from all buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
        // Legacy style cleanup (if any specific colors were used in old versions)
        btn.classList.remove('bg-primary', 'text-white', 'shadow-lg');
        if (btn.classList.contains('bg-gray-100')) {
            // restore default look logic if needed, but 'active' class usually handles it
        }
    });

    // Show selected tab
    tabContent.classList.remove('hidden');

    // Activate correct button
    tabBtn.classList.add('active');

    // Optional: Add specific styles for some older implementations
    tabBtn.classList.add('bg-primary', 'text-white', 'shadow-lg');
    tabBtn.classList.remove('bg-gray-100', 'text-gray-600');
}

// Initialize legacy tabs if they exist
window.addEventListener('load', () => {
    if (document.querySelector('.tab-content') && document.querySelector('.tab-btn')) {
        // Default to tab1 only if no hash is present or handle generic init
        if (document.getElementById('tab1')) {
            legacySwitchTab('tab1');
        }
    }
});


// ==========================================
// FAQ / ACCORDION TOGGLES
// ==========================================
function toggleFAQ(id) {
    const content = document.getElementById(id + '-content');
    if (!content) return;

    const header = content.previousElementSibling;
    const icon = header.querySelector('.faq-icon');
    const isExpanded = header.getAttribute('aria-expanded') === 'true';

    if (isExpanded) {
        // Close this FAQ
        content.classList.add('hidden');
        header.setAttribute('aria-expanded', 'false');
        if (icon) icon.style.transform = 'rotate(0deg)';
    } else {
        // Close all FAQs
        document.querySelectorAll('.faq-content').forEach(item => item.classList.add('hidden'));
        document.querySelectorAll('.faq-header').forEach(item => item.setAttribute('aria-expanded', 'false'));
        document.querySelectorAll('.faq-icon').forEach(item => item.style.transform = 'rotate(0deg)');

        // Open clicked FAQ
        content.classList.remove('hidden');
        header.setAttribute('aria-expanded', 'true');
        if (icon) icon.style.transform = 'rotate(45deg)';
    }
}

function toggleAccordion(id) {
    const content = document.getElementById(id + '-content');
    if (!content) return;

    const header = content.previousElementSibling;
    const icon = header.querySelector('.accordion-icon');
    const isExpanded = header.getAttribute('aria-expanded') === 'true';

    // Close all accordions
    document.querySelectorAll('.accordion-content').forEach(item => item.classList.add('hidden'));
    document.querySelectorAll('.accordion-header').forEach(item => item.setAttribute('aria-expanded', 'false'));
    document.querySelectorAll('.accordion-icon').forEach(item => item.style.transform = 'rotate(0deg)');

    // Open clicked accordion if it was closed
    if (!isExpanded) {
        content.classList.remove('hidden');
        header.setAttribute('aria-expanded', 'true');
        if (icon) icon.style.transform = 'rotate(180deg)';
    }
}


// ==========================================
// SWIPER INITIALIZATION
// ==========================================
if (document.querySelector(".myLogoSwiper")) {
    var swiper = new Swiper(".myLogoSwiper", {
        slidesPerView: 5,
        spaceBetween: 40,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: { slidesPerView: 2, spaceBetween: 20 },
            640: { slidesPerView: 3, spaceBetween: 30 },
            1024: { slidesPerView: 5, spaceBetween: 40 }
        }
    });
}


// ==========================================
// MODERN TAB SWITCHING (People Counting & New Pages)
// Uses .tab-button and .tab-panel
// ==========================================
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = Array.from(document.querySelectorAll('.tab-button'));
    const panels = Array.from(document.querySelectorAll('.tab-panel'));

    if (tabButtons.length === 0) return; // Exit if no tabs on this page

    function activateTab(name) {
        // Toggle Buttons
        tabButtons.forEach(btn => {
            if (btn.dataset.target === name) {
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
            } else {
                btn.classList.remove('active');
                btn.setAttribute('aria-selected', 'false');
            }
        });

        // Toggle Panels
        panels.forEach(p => {
            if (p.id === name) {
                p.classList.remove('hidden');
            } else {
                p.classList.add('hidden');
            }
        });

        // Update URL hash without scroll jump
        if (history.replaceState) {
            history.replaceState(null, '', '#' + name);
        } else {
            location.hash = name;
        }
    }

    // Event Listeners
    tabButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            activateTab(btn.dataset.target);

            // Smooth scroll to top of content
            const panel = document.getElementById(btn.dataset.target);
            if (panel) {
                // Offset for sticky header
                const offset = 100;
                const bodyRect = document.body.getBoundingClientRect().top;
                const elementRect = panel.getBoundingClientRect().top;
                const elementPosition = elementRect - bodyRect;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });
            }
        });

        // Keyboard Navigation
        btn.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
                e.preventDefault();
                let idx = tabButtons.indexOf(btn);
                if (e.key === 'ArrowRight') idx = (idx + 1) % tabButtons.length;
                else idx = (idx - 1 + tabButtons.length) % tabButtons.length;
                tabButtons[idx].focus();
                tabButtons[idx].click(); // Optional: auto-activate on focus
            }
        });
    });

    // Initialization
    const hash = (location.hash || '').replace('#', '');
    const validTarget = tabButtons.some(b => b.dataset.target === hash);
    // Default to the first tab if no hash or invalid hash
    const defaultTab = tabButtons[0].dataset.target;
    activateTab(validTarget ? hash : defaultTab);
});


// Mobile nav toggle
(function () {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (!btn || !menu) return;
    btn.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('is-open');
        btn.textContent = isOpen ? 'close' : 'menu';
    });
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            menu.classList.remove('is-open');
            btn.textContent = 'menu';
        });
    });
})();

// FAQ accordions: any [data-faq-toggle] button toggles its next sibling panel
document.querySelectorAll('[data-faq-toggle]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const panel = btn.nextElementSibling;
        const arrow = btn.querySelector('.faq-arrow');
        panel.classList.toggle('is-open');
        if (arrow) arrow.classList.toggle('is-open');
    });
});

// Scroll reveal animations (progressive enhancement: elements are visible by
// default and only get the hidden "armed" state once JS confirms it can run)
const revealTargets = document.querySelectorAll('.reveal');
if (revealTargets.length) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    revealTargets.forEach((el) => {
        el.classList.add('reveal-armed');
        observer.observe(el);
    });
}

// Horizontal carousel row scroll buttons: [data-scroll-target="rowId"]
document.querySelectorAll('[data-scroll-target]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const row = document.getElementById(btn.dataset.scrollTarget);
        if (!row) return;
        const amount = row.clientWidth * 0.8;
        row.scrollBy({ left: btn.dataset.dir === 'left' ? -amount : amount, behavior: 'smooth' });
    });
});

// Contact form (no backend wired up yet - shows a local confirmation only)
const contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const status = document.getElementById('contact-form-status');
        if (status) {
            status.textContent = 'Thanks! This demo form does not send messages yet - please email us directly for now.';
            status.classList.remove('hidden');
        }
        contactForm.reset();
    });
}

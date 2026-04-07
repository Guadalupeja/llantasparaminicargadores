import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', () => {
            const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', String(!expanded));
            menu.classList.toggle('hidden');
        });
    }

    const submenuToggles = document.querySelectorAll('[data-submenu-toggle]');

    submenuToggles.forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const submenu = toggle.nextElementSibling;
            const icon = toggle.querySelector('span:last-child');
            const expanded = toggle.getAttribute('aria-expanded') === 'true';

            toggle.setAttribute('aria-expanded', String(!expanded));
            submenu.classList.toggle('hidden');
            icon.textContent = expanded ? '+' : '−';
        });
    });
});



 
document.addEventListener('DOMContentLoaded', () => {
    const words = ['Vida', 'Desempeño', 'ciclos'];
    const el = document.getElementById('rotating-word');

    if (!el) return;

    let current = 0;

    setInterval(() => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(-12px) rotateX(70deg)';

        setTimeout(() => {
            current = (current + 1) % words.length;
            el.textContent = words[current];
            el.style.opacity = '1';
            el.style.transform = 'translateY(0) rotateX(0deg)';
        }, 300);
    }, 2200);
});


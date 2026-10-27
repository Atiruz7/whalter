
// Menú de navegación móvil (header)
const menuToggle = document.getElementById('menu-toggle');
const mobileMenu = document.getElementById('menu-movil');
const iconOpen = document.getElementById('icon-open');
const iconClose = document.getElementById('icon-close');

if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');

        mobileMenu.classList.toggle('hidden');
        iconOpen?.classList.toggle('hidden', !isOpen);
        iconClose?.classList.toggle('hidden', isOpen);
        menuToggle.setAttribute('aria-expanded', String(!isOpen));
    });
}

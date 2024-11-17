document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('nav-menu');

    menuToggle.addEventListener('click', function () {
        menu.classList.toggle('active'); // Adiciona ou remove a classe 'active'
    });
});
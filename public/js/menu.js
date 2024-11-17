document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.navbar-toggle');
    const links = document.querySelector('.navbar-links');
  
    toggle.addEventListener('click', () => {
      links.classList.toggle('active');
    });
  });
  
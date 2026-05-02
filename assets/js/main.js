/* Sprint 2 : Gestion du Dark Mode */

const themeToggle = document.querySelector('#theme-toggle');
const body = document.body;

const currentTheme = localStorage.getItem('theme');
if (currentTheme === 'dark') {
    body.setAttribute('data-theme', 'dark');
    themeToggle.textContent = 'Light Mode'; 
}

themeToggle.addEventListener('click', () => {
    if (body.getAttribute('data-theme') === 'dark') {
        body.removeAttribute('data-theme');
        themeToggle.textContent = 'Dark Mode';
        localStorage.setItem('theme', 'light');
    } else {
        body.setAttribute('data-theme', 'dark');
        themeToggle.textContent = 'Light Mode';
        localStorage.setItem('theme', 'dark');
    }
});


/* Sprint 4 : Formulaire & Validation */
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggle-form-btn');
    const registrationArea = document.getElementById('registration-area');
    const enrollForm = document.getElementById('enroll-form');

    // Bouton toggle
    if (toggleBtn && registrationArea) {
        toggleBtn.addEventListener('click', () => {
            if (registrationArea.style.display === 'none') {
                registrationArea.style.display = 'block';
                toggleBtn.textContent = 'Annuler l\'inscription';
                toggleBtn.style.backgroundColor = '#636e72';
            } else {
                registrationArea.style.display = 'none';
                toggleBtn.textContent = 'S\'inscrire au tournoi';
                toggleBtn.style.backgroundColor = '';
            }
        });
    }

    // Validation
    if (enrollForm) {
        enrollForm.addEventListener('submit', (e) => {
            let isValid = true;
            
            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const nameError = document.getElementById('name-error');
            const emailError = document.getElementById('email-error');

            nameError.textContent = '';
            emailError.textContent = '';

            if (username.value.trim() === '') {
                nameError.textContent = 'Veuillez entrer votre nom.';
                isValid = false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                emailError.textContent = 'Veuillez entrer un email validé.';
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        const email = form.querySelector('input[name="email"]').value;
        const password = form.querySelector('input[name="mot_de_passe"]').value;

        if (!validateEmail(email)) {
            alert('Veuillez entrer un email valide.');
            e.preventDefault();
        }

        if (password.length < 6) {
            alert('Le mot de passe doit contenir au moins 6 caractères.');
            e.preventDefault();
        }
    });

    function validateEmail(email) {
        const re = /^(([^<>()\[\]\.,;:\s@"]+(.[^<>()\[\]\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,})$/i;
        return re.test(String(email).toLowerCase());
    }
});

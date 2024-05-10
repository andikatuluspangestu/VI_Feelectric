// Definisi fungsi togglePasswordVisibility
function togglePasswordVisibility(inputId) {
    var input = document.getElementById(inputId);
    var icon = input.nextElementSibling.querySelector('i'); // Pastikan selector ini tepat menemukan ikon
    if (icon && icon.classList.contains('form-control-icon')) {
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    } else {
        console.error('Icon element not found or invalid');
    }
}

// Menambahkan event listener setelah fungsi togglePasswordVisibility didefinisikan
document.addEventListener('DOMContentLoaded', function() {
    // Menambahkan event listener untuk tombol "Login with Google"
    var googleLoginBtn = document.getElementById('google-login-btn');
    if (googleLoginBtn) {
        googleLoginBtn.addEventListener('click', function() {
            console.log('Login with Google button clicked!');
        });
    }

    // Menambahkan event listener untuk tombol "Register"
    var registerBtn = document.querySelector('.btn-dark.register'); // Tambahkan class .register pada button di HTML
    if (registerBtn) {
        registerBtn.addEventListener('click', function() {
            console.log('Register button clicked!');
        });
    }

    // Menambahkan event listener untuk tombol "Login"
    var loginBtn = document.querySelector('.btn-dark.login'); // Tambahkan class .login pada button di HTML
    if (loginBtn) {
        loginBtn.addEventListener('click', function() {
            console.log('Login button clicked!');
        });
    }

    // Menambahkan event listener untuk link "Login here"
    var loginLink = document.querySelector('.fw-semibold');
    if (loginLink) {
        loginLink.addEventListener('click', function(event) {
            event.preventDefault();
            console.log('Login here link clicked!');
        });
    }

    // Menambahkan event listener untuk ikon mata pada input password
    var passwordIcons = document.querySelectorAll('.form-control-icon');
    passwordIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            var inputId = this.parentElement.querySelector('input').id;
            togglePasswordVisibility(inputId);
        });
    });
});

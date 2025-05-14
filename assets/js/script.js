    const loginForm = document.querySelector('.form-box.login');
    const registerForm = document.querySelector('.form-box.register');
    const loginLink = document.querySelector('.login-link');
    const registerLink = document.querySelector('.register-link');

    registerLink?.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.classList.remove('active');
    registerForm.classList.add('active');
    });

    loginLink?.addEventListener('click', (e) => {
    e.preventDefault();
    registerForm.classList.remove('active');
    loginForm.classList.add('active');
    });

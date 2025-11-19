const container = document.getElementById('container');
const registraBtn = document.getElementById('registra');
const loginBtn = document.getElementById('login');

registraBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
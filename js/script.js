
// função registrar 
function registrar() {
    const nome = document.querySelector('.criar-cont input[name="nome"]').value;
    const email = document.querySelector('.criar-cont input[name="email"]').value;
    const senha = document.querySelector('.criar-cont input[name="senha"]').value;

    if (!nome || !email || !senha) {
        alert("Preencha todos os campos!");
        return;
    }

    window.location.href = "principal.html"; 
}


function entrar() {
    const email = document.querySelector('.entrar input[name="email"]').value;
    const senha = document.querySelector('.entrar input[name="senha"]').value;

    if (!email || !senha) {
        alert("Preencha todos os campos!");
        return;
    }

    window.location.href = "principal.html";
}

// animação container 
const container = document.getElementById('container');
const registraBtn = document.getElementById('registra');
const loginBtn = document.getElementById('login');

registraBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
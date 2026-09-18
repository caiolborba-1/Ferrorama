const botao = document.getElementById("inicio_adm");

botao.addEventListener("click", function() {
    window.location.href = "public/login_adm.php";
});

const botao_usuario = document.getElementById("inicio_usuario");

botao_usuario.addEventListener("click", function() {
    window.location.href = "public/cadastro_usuario.html";
});

const botao_velocidade = document.getElementById("botao_velocidade");

botao_velocidade.addEventListener("click", function() {
    window.location.href = "public/sensores_velocidade.php";
});
const botao = document.getElementById("inicio_adm");

botao.addEventListener("click", function() {
    window.location.href = "public/login_adm.php";
});

const botao_usuario = document.getElementById("inicio_usuario");

botao_usuario.addEventListener("click", function() {
    window.location.href = "public/cadastro_usuario.html";
});

function pagina_velocidade(event) {
    event.preventDefault();
    window.location.href = "sensores_velocidade.php";
}

function pagina_temperatura(event) {
    event.preventDefault();
    window.location.href = "sensores_temperatura.php";
}

function pagina_combustivel(event) {
    event.preventDefault();
    window.location.href = "sensores_combustivel.php";
}

function pagina_pressao(event) {
    event.preventDefault();
    window.location.href = "sensores_pressao_oleo.php";
}

function pagina_falhas(event) {
    event.preventDefault();
    window.location.href = "sensores_falhas.php";
}

function pagina_frenagem(event) {
    event.preventDefault();
    window.location.href = "sensores_frenagem.php";
}

function pagina_usuarios(event) {
    event.preventDefault();
    window.location.href = "visualizar_cadastro.php";
}

function pagina_sensores(event) {
    event.preventDefault();
    window.location.href = "visualizar_sensores_cadastrados.php";
}

function pagina_cadastrar_sensor(event) {
    event.preventDefault();
    window.location.href = "cadastrar_sensor.php";
}
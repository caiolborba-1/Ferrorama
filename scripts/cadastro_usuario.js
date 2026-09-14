document.addEventListener("DOMContentLoaded", () => {

    let cadastro = false;

    document.getElementById("toggle").onclick = () => {
        cadastro = !cadastro;

        document.getElementById("titulo").innerText = cadastro ? "Cadastro" : "Login";
        document.getElementById("button").innerText = cadastro ? "Cadastrar" : "Entrar";
        document.getElementById("toggle").innerText = cadastro
            ? "Já tem conta? Faça Login!"
            : "Não tem conta? Cadastre-se!";

        document.getElementById("mensagem").innerHTML = "";
    };

    document.getElementById("form-login").onsubmit = (e) => {
        e.preventDefault();

        let email = document.getElementById("email").value.trim();
        let senha = document.getElementById("senha").value.trim();
        let mensagem = document.getElementById("mensagem");

        mensagem.innerHTML = "";

        if (!email.includes("@") || !email.includes(".")) {
            mensagem.innerHTML = "<div class='erro'>Email inválido!</div>";
            return;
        }

        if (senha.length < 4) {
            mensagem.innerHTML = "<div class='erro'>Senha muito curta!</div>";
            return;
        }

        if (cadastro) {
            if (localStorage.getItem(email)) {
                mensagem.innerHTML = "<div class='erro'>Usuário já existe!</div>";
                return;
            }

            localStorage.setItem(email, senha);
            mensagem.innerHTML = "<div class='sucesso'>Cadastrado com sucesso!</div>";
        } else {
            let salva = localStorage.getItem(email);

            if (salva === senha) {
                mensagem.innerHTML = "<div class='sucesso'>Logado com sucesso!</div>";
                 setTimeout(() => {
        window.location.href = "../public/tela_inicial.php";
    }, 1000);
            } else {
                mensagem.innerHTML = "<div class='erro'>Dados incorretos!</div>";
            }
        }

        document.getElementById("form-login").reset();
    };

});
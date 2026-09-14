document.getElementById("form-login").onsubmit = (e) => {
    e.preventDefault();
    

    const usuarioCorreto = "Caio";
    const senhaCorreta = "trem";


    const usuarioDigitado = document.getElementById('nome_usuario').value;
    const senhaDigitada = document.getElementById('senha').value;
    const mensagem = document.getElementById('mensagem');


    if (usuarioDigitado === usuarioCorreto && senhaDigitada === senhaCorreta) {
        mensagem.innerHTML = "<div class='sucesso'><p>Login correto!</p></div>";
            setTimeout(() => {
                window.location.href = "tela_inicial_adm.php";
            }, 1000);
        

    } else {
        mensagem.innerHTML = "<div class='erro'><p>Nome de usuario ou senha incorreta!</p></div>";
        return;
    }
}
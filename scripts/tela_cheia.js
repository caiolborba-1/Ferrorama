function carregarPagina(url) {

    var elemento = document.documentElement;
    if (elemento.requestFullscreen) elemento.requestFullscreen();

    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('conteudo-do-sistema').innerHTML = html;
        })
        .catch(err => console.log('Erro ao carregar:', err));
}
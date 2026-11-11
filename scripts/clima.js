
document.addEventListener('DOMContentLoaded', function () {

    const conteudo = document.getElementById('conteudo-clima');

    if (!conteudo) {
        return;
    }

    let carregando = false;
    let primeiraCarga = true;

    function montarEstrutura() {

        conteudo.innerHTML = `
            <h4 class="mb-2"></h4>

            <div class="clima-icone">
                <img alt="Condição do tempo" width="100" height="100">
            </div>

            <div class="clima-temperatura"></div>

            <h5 class="clima-condicao"></h5>

            <div class="clima-detalhes">

                <div class="clima-item">
                    <strong>🌡️ Sensação térmica</strong>
                    <p class="mb-0"></p>
                </div>

                <div class="clima-item">
                    <strong>💧 Umidade do ar</strong>
                    <p class="mb-0"></p>
                </div>

            </div>

            <p class="clima-atualizacao text-muted mt-3 mb-0"></p>

            <p class="clima-status text-muted mb-0">
                Informações fornecidas pela WeatherAPI.
            </p>
        `;

        primeiraCarga = false;
    }

    async function carregarClima() {

        if (carregando) {
            return;
        }

        carregando = true;

        try {

            if (primeiraCarga) {
                conteudo.textContent = 'Buscando informações do clima...';
            }

            const resposta = await fetch('clima.php', {
                method: 'GET',
                cache: 'no-store',
                headers: {
                    'Accept': 'application/json'
                }
            });

            const texto = await resposta.text();

            let dados;

            try {
                dados = JSON.parse(texto);
            } catch (erro) {
                console.error('Resposta do servidor:', texto);
                throw new Error('O servidor retornou uma resposta inválida.');
            }

            if (!resposta.ok) {
                throw new Error(
                    dados.erro || 'Não foi possível consultar o clima.'
                );
            }

            if (
                !dados.cidade ||
                !dados.estado ||
                dados.temperatura === undefined ||
                dados.sensacao === undefined ||
                dados.umidade === undefined ||
                !dados.condicao ||
                !dados.icone ||
                !dados.atualizacao
            ) {
                throw new Error('A API não retornou todos os dados necessários.');
            }

            if (primeiraCarga) {
                montarEstrutura();
            }

            // Cidade e estado
            conteudo.querySelector('h4').textContent =
                `${dados.cidade} - ${dados.estado}`;

            // Ícone meteorológico
            const imagem = conteudo.querySelector('.clima-icone img');

            const caminhoIcone = dados.icone.startsWith('//')
                ? 'https:' + dados.icone
                : dados.icone;

            imagem.src = caminhoIcone;
            imagem.alt = dados.condicao;

            // Temperatura atual
            conteudo.querySelector('.clima-temperatura').textContent =
                `${Number(dados.temperatura).toFixed(1)}°C`;

            // Condição do tempo
            conteudo.querySelector('.clima-condicao').textContent =
                dados.condicao;

            // Sensação térmica e umidade
            const detalhes = conteudo.querySelectorAll('.clima-item p');

            detalhes[0].textContent =
                `${Number(dados.sensacao).toFixed(1)}°C`;

            detalhes[1].textContent =
                `${dados.umidade}%`;

            conteudo.querySelector('.clima-atualizacao').textContent =
                `Dados meteorológicos atualizados em: ${dados.atualizacao}`;

            // Horário da consulta ao servidor
            conteudo.querySelector('.clima-status').textContent =
                `Última consulta: ${new Date().toLocaleTimeString('pt-BR')} | Consulta automática a cada 30 segundos.`;

        } catch (erro) {

            console.error('Erro ao carregar o clima:', erro);

            if (primeiraCarga) {

                conteudo.textContent = erro.message;

            } else {

                const status = conteudo.querySelector('.clima-status');

                if (status) {
                    status.textContent =
                        `Falha na atualização: ${erro.message}. Tentaremos novamente.`;
                }

            }

        } finally {

            carregando = false;

        }
    }

   
    carregarClima();

    
    setInterval(carregarClima, 30000);

});

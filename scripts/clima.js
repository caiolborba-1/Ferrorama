
document.addEventListener('DOMContentLoaded', function () {

    const conteudo = document.getElementById('conteudo-clima');

    if (!conteudo) {
        return;
    }

    async function carregarClima() {

        try {

            conteudo.textContent = 'Buscando informações do clima...';

            const resposta = await fetch('clima.php', {
                method: 'GET',
                cache: 'no-store'
            });

            const dados = await resposta.json();

            if (!resposta.ok) {
                throw new Error(
                    dados.erro || 'Não foi possível carregar o clima.'
                );
            }

            if (!dados.cidade || dados.temperatura === undefined) {
                throw new Error('A API não retornou os dados esperados.');
            }

            conteudo.innerHTML = `
                <h4></h4>

                <div class="clima-icone">
                    <img
                        alt=""
                        width="100"
                        height="100"
                    >
                </div>

                <div class="clima-temperatura"></div>

                <h5></h5>

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

                <p class="text-muted mt-3 mb-0"></p>

                <p class="text-muted mb-0">
                    Informações fornecidas pela WeatherAPI.
                </p>
            `;

            const elementos = conteudo.children;

            elementos[0].textContent = `${dados.cidade} - ${dados.estado}`;

            const imagem = conteudo.querySelector('.clima-icone img');
            imagem.src = 'https:' + dados.icone;
            imagem.alt = dados.condicao;

            conteudo.querySelector('.clima-temperatura').textContent =
                `${Math.round(dados.temperatura)}°C`;

            elementos[2].textContent = dados.condicao;

            const detalhes = conteudo.querySelectorAll('.clima-item p');

            detalhes[0].textContent = `${Math.round(dados.sensacao)}°C`;
            detalhes[1].textContent = `${dados.umidade}%`;

            elementos[4].textContent =
                `Última atualização: ${dados.atualizacao}`;

        } catch (erro) {

            console.error('Erro ao carregar clima:', erro);

            conteudo.textContent = erro.message;

        }
    }

    carregarClima();

});

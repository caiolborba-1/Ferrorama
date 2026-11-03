
document.addEventListener('DOMContentLoaded', async () => {
    const conteudo = document.getElementById('conteudo-clima');

    if (!conteudo) {
        return;
    }

    function escaparHTML(valor) {
        return String(valor ?? '').replace(/[&<>"']/g, caractere => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        })[caractere]);
    }

    function converterDataHora(valor) {
        const [data, horario] = valor.split(' ');
        const [ano, mes, dia] = data.split('-').map(Number);
        const [hora, minuto] = horario.split(':').map(Number);

        return new Date(ano, mes - 1, dia, hora, minuto);
    }

    try {
        conteudo.textContent = 'Consultando previsão do tempo...';

        const resposta = await fetch('buscar_clima.php');
        const dados = await resposta.json();

        if (!resposta.ok) {
            throw new Error(dados.erro || 'Não foi possível consultar o clima.');
        }

        const atual = dados.current;
        const local = dados.location;

        conteudo.innerHTML = `
            <div class="mb-4">

                <h3>
                    ${escaparHTML(local.name)}, ${escaparHTML(local.region)}
                </h3>

                <img
                    src="https:${escaparHTML(atual.condition.icon)}"
                    alt="${escaparHTML(atual.condition.text)}"
                    width="90"
                >

                <h1 class="display-3 fw-bold">
                    ${Number(atual.temp_c).toFixed(1)}°C
                </h1>

                <h5>
                    ${escaparHTML(atual.condition.text)}
                </h5>

            </div>

            <div class="row g-3 mb-4">

                <div class="col-6 col-md-4">
                    <div class="bg-light rounded p-3 h-100">
                        <strong>Sensação térmica</strong>
                        <p class="mb-0">
                            ${Number(atual.feelslike_c).toFixed(1)}°C
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="bg-light rounded p-3 h-100">
                        <strong>Umidade</strong>
                        <p class="mb-0">
                            ${atual.humidity}%
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="bg-light rounded p-3 h-100">
                        <strong>Velocidade do vento</strong>
                        <p class="mb-0">
                            ${atual.wind_kph} km/h
                        </p>
                    </div>
                </div>

                <div class="col-6 col-md-4">
                    <div class="bg-light rounded p-3 h-100">
                        <strong>Precipitação</strong>
                        <p class="mb-0">
                            ${atual.precip_mm} mm
                        </p>
                    </div>
                </div>

            </div>

            <h4 class="mb-3">
                Previsão das próximas 24 horas
            </h4>

            <div style="position: relative; height: 300px; width: 100%;">
                <canvas id="graficoClima"></canvas>
            </div>

            <p class="text-muted small mt-3">
                Última atualização: ${escaparHTML(local.localtime)}
            </p>
        `;

        const agora = converterDataHora(local.localtime);

        const limite = new Date(
            agora.getTime() + (24 * 60 * 60 * 1000)
        );

        const horas = dados.forecast.forecastday
            .flatMap(dia => dia.hour)
            .filter(hora => {
                const dataHora = converterDataHora(hora.time);

                return dataHora >= agora && dataHora <= limite;
            });

        if (horas.length === 0) {
            throw new Error('Não foi possível carregar a previsão por hora.');
        }

        const labels = horas.map(hora => {
            const data = hora.time.split(' ');
            return data[1];
        });

        const temperaturas = horas.map(hora => {
            return Number(hora.temp_c);
        });

        const canvas = document.getElementById('graficoClima');

        new Chart(canvas, {
            type: 'line',

            data: {
                labels: labels,

                datasets: [{
                    label: 'Temperatura (°C)',
                    data: temperaturas,
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 3,
                    pointHoverRadius: 6
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                interaction: {
                    intersect: false,
                    mode: 'index'
                },

                plugins: {
                    legend: {
                        display: true
                    },

                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + '°C';
                            }
                        }
                    }
                },

                scales: {
                    y: {
                        title: {
                            display: true,
                            text: 'Temperatura (°C)'
                        }
                    },

                    x: {
                        title: {
                            display: true,
                            text: 'Horário'
                        }
                    }
                }
            }
        });

    } catch (erro) {
        conteudo.innerHTML = `
            <p class="text-danger mb-0">
                ${escaparHTML(erro.message)}
            </p>
        `;

        console.error('Erro ao carregar o clima:', erro);
    }
});

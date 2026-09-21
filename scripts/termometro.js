const TEMP_MIN = 0;
        const TEMP_MAX = 120;
        const LIMITE_ALERTA = 75; 
        const LIMITE_PERIGO = 95;  
        
        const COR_NORMAL = "#00E676";   
        const COR_ALERTA = "#FFAA00";  
        const COR_PERIGO = "#FF3333";  

        const barraElement = document.getElementById('barra');
        const displayElement = document.getElementById('display');

        function obterCorStatus(temperatura) {
            if (temperatura >= LIMITE_PERIGO) return COR_PERIGO;
            if (temperatura >= LIMITE_ALERTA) return COR_ALERTA;
            return COR_NORMAL;
        }

        function atualizarTelaTermometro(temperatura) {
            const tempLimitada = Math.max(TEMP_MIN, Math.min(TEMP_MAX, temperatura));

            const porcentagem = ((tempLimitada - TEMP_MIN) / (TEMP_MAX - TEMP_MIN)) * 100;

            const corAtual = obterCorStatus(tempLimitada);

            barraElement.style.width = `${porcentagem}%`;
            barraElement.style.backgroundColor = corAtual;
            
            displayElement.innerText = `${temperatura.toFixed(1)} °C`;
            displayElement.style.color = corAtual;
        }

        
        let temperaturaSimulada = 25.0;

        setInterval(() => {
            temperaturaSimulada += (Math.random() * 8) - 3.8; 
            temperaturaSimulada = Math.max(TEMP_MIN, Math.min(TEMP_MAX, temperaturaSimulada));
            
            atualizarTelaTermometro(temperaturaSimulada);
        }, 500);
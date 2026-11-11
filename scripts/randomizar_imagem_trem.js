// 1. Sua lista de imagens salvas na pasta do projeto
        const bancoImagens = [
            "Trem 1.png",
            "Trem 2.jpg",
            "Trem 3.jpeg",
            "Trem 4.jpg",
            "Trem 5.jpg"
        ];

        // Função simulando seu sistema adicionando um trem
        function cadastrarNovoTrem() {
            const container = document.getElementById("lista-trens");
            
            // Descobre quantos trens já existem para definir o número do novo
            const numeroDoTrem = container.children.length; 

            // 2. O TRUQUE: O resto da divisão (%) garante que o índice gerado
            // sempre esteja dentro do tamanho da sua lista de imagens,
            // criando um padrão pseudo-aleatório fixo para cada novo botão.
            const indiceImagem = numeroDoTrem % bancoImagens.length;
            const imagemFixa = bancoImagens[indiceImagem];

            // 3. Cria a estrutura do novo trem que aparece na tela
            const cardTrem = document.createElement("div");
            cardTrem.className = "card-trem";
            cardTrem.innerHTML = `
                <img src="${imagemFixa}" alt="Trem ${numeroDoTrem + 1}" width="200">
                <button>Trem ${numeroDoTrem + 1}</button>
            `;

            container.appendChild(cardTrem);
        }
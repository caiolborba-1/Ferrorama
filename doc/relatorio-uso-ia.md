		Relatório de Utilização da Inteligência Artificial – Ferrorama

1. Ferramenta utilizada

Durante o desenvolvimento do projeto Ferrorama, utilizamos o **ChatGPT**, da OpenAI, como ferramenta de inteligência artificial para auxiliar na programação, organização dos códigos, integração de APIs e resolução de problemas.

2. Objetivo da utilização

A inteligência artificial foi utilizada para ajudar a equipe a desenvolver e melhorar as funcionalidades do sistema, principalmente nas seguintes atividades:

- Desenvolvimento de códigos PHP, HTML, CSS e JavaScript.
- Correção de erros encontrados durante a programação.
- Integração da API ViaCEP.
- Integração da WeatherAPI para mostrar o clima atual.
- Organização e melhoria das páginas.
- Implementação de controle de acesso para administradores e usuários.
- Auxílio na proteção das páginas e no funcionamento das sessões.

3. Principais instruções e prompts utilizados

Durante as conversas com a IA, foram utilizadas instruções como:

- "Analise este código e corrija os erros sem modificar o restante."
- "Faça a integração da API ViaCEP para preencher automaticamente os dados do endereço."
- "Adicione a API de clima na tela inicial do administrador, igual à tela do usuário."
- "Corrija o JavaScript para atualizar as informações do clima automaticamente."
- "Verifique a proteção das páginas para impedir que usuários comuns acessem funções de administrador."
- "Organize o código e mantenha o visual atual do projeto."

Essas instruções ajudaram a obter respostas mais próximas do que precisávamos desenvolver.

4. Arquivos e funcionalidades produzidos com auxílio da IA

A IA auxiliou no desenvolvimento e nas alterações de diferentes partes do projeto.

Arquivos e funcionalidades trabalhados:**

- `auth.php`: controle de acesso dos usuários.
- `proteger_adm.php`: proteção das páginas administrativas.
- `login.php`: funcionamento do sistema de login.
- `adicionar_usuario.php`: cadastro de usuários e consulta de CEP.
- `editar_usuario.php`: edição dos dados dos usuários e preenchimento de endereço.
- `clima.php`: consulta das informações meteorológicas.
- `config_clima.php`: configuração da chave da WeatherAPI.
- `clima.js`: consulta e atualização automática das informações do clima.
- `tela_usuario.php`: apresentação do clima e dos horários dos trens.
- `tela_inicial_adm.php`: apresentação do clima e das funções administrativas.

Também recebemos auxílio na criação e organização da Landing Page do projeto.

5. Alterações realizadas pela equipe

Os códigos sugeridos pela IA foram analisados e adaptados conforme a estrutura do Ferrorama.

A equipe realizou alterações para:

- Ajustar os caminhos dos arquivos PHP.
- Adaptar os códigos às tabelas existentes no MySQL.
- Utilizar os nomes corretos das colunas do banco de dados.
- Manter o padrão visual das páginas.
- Ajustar os acessos de administradores e usuários.
- Adaptar as integrações às necessidades do sistema.

Também foram feitas alterações manuais para manter as funcionalidades que já estavam funcionando.

6. Testes realizados

Durante o desenvolvimento, realizamos testes para verificar o funcionamento das funcionalidades implementadas.

Entre eles:

- Teste de login com administrador e usuário comum.
- Verificação dos acessos às páginas de cada tipo de usuário.
- Teste de cadastro e edição de usuários.
- Consulta de CEP para verificar o preenchimento automático do endereço.
- Verificação das informações meteorológicas nas telas iniciais.
- Teste da atualização automática do clima.
- Verificação da navegação entre as páginas.
- Conferência das funcionalidades de cadastro, visualização, edição e exclusão.

Os resultados foram utilizados para identificar o que precisava de ajustes.

7. Problemas identificados e correções

Durante o desenvolvimento, encontramos alguns problemas que precisaram ser corrigidos com auxílio da IA.

- Integração com o ViaCEP:** foram realizados ajustes para que os dados do endereço fossem preenchidos corretamente nos formulários.

- Integração com a WeatherAPI:** identificamos problemas na configuração da chave da API, na montagem da URL e no tratamento da resposta recebida pelo PHP.

- Atualização do clima:** ajustamos o JavaScript para realizar novas consultas automaticamente e atualizar as informações exibidas.

- Controle de acesso:** corrigimos verificações de sessão e permissões para separar o acesso de administradores e usuários comuns.

- Organização visual:** realizamos ajustes no CSS para manter o mesmo padrão de apresentação nas telas do administrador e do usuário.

8. Reflexão sobre o uso da inteligência artificial

A utilização da inteligência artificial ajudou bastante durante o desenvolvimento do Ferrorama, principalmente porque ainda estamos aprendendo programação.

Com o auxílio do ChatGPT, conseguimos entender melhor algumas funcionalidades, corrigir erros e desenvolver integrações que seriam mais difíceis de fazer sem orientação.

Porém, percebemos que nem sempre os códigos gerados funcionam diretamente no projeto. Algumas respostas precisam ser analisadas, adaptadas e testadas antes de serem utilizadas.

Também entendemos que é importante conhecer o funcionamento dos códigos, pois não basta apenas copiar e colar o que a inteligência artificial fornece.

Concluímos que a IA foi uma ferramenta importante de apoio, mas as decisões, adaptações e testes realizados pela equipe foram fundamentais para o desenvolvimento do Ferrorama.

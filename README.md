![Logo do Ferrorama](assets/img/Logo%20fundo%20branco.png)

# Ferrorama SA

Este projeto está sendo desenvolvido como parte de uma Situação de Aprendizagem do curso Técnico em Desenvolvimento de Sistemas Integrado ao Ensino Médio, no SESI SENAI.

## Problema identificado

O transporte ferroviário necessita de acompanhamento constante para garantir a segurança e o funcionamento adequado das locomotivas e dos trilhos.

A falta de monitoramento centralizado pode dificultar a identificação de falhas, atrasar manutenções e aumentar os riscos de acidentes e problemas operacionais.

O Ferrorama SA busca solucionar esse problema por meio de uma plataforma que centraliza informações coletadas por sensores IoT, facilitando o acompanhamento das condições ferroviárias e a identificação de possíveis irregularidades.

## Função do sistema

O Ferrorama SA tem como objetivo monitorar, em tempo real, os dados coletados pelos sensores IoT instalados nas locomotivas e nos trilhos ferroviários, ajudando a melhorar o controle operacional, a segurança e a eficiência do transporte ferroviário.

Atualmente, o projeto também tem como foco o desenvolvimento visual das telas, a organização das funcionalidades e a implementação das operações do sistema.

A plataforma foi planejada para receber, processar e exibir informações dos sensores, como:

- Temperatura do motor;
- Pressão do óleo;
- Velocidade da locomotiva;
- Frenagem;
- Nível de combustível;
- Rotação;
- Vibração dos trilhos;
- Integridade da via;
- Carga por eixo;
- Temperatura dos trilhos;
- Localização geográfica dos trens e sensores.

O sistema também deverá identificar possíveis falhas, riscos e comportamentos anormais nos componentes das locomotivas e na estrutura ferroviária, emitindo alertas para auxiliar na prevenção de acidentes e problemas operacionais.

Além do monitoramento, a plataforma contará com recursos de cadastro e gerenciamento de usuários, sensores e locomotivas, armazenamento de dados e geração de relatórios para auxiliar na análise de desempenho e no planejamento da manutenção preventiva.

A interface será organizada e responsiva, facilitando a visualização das informações por administradores, operadores ferroviários e equipes técnicas.

## Objetivos e principais funcionalidades

Os principais objetivos do Ferrorama SA são:

- Centralizar as informações coletadas pelos sensores IoT;
- Facilitar o acompanhamento das condições das locomotivas;
- Monitorar a integridade e as condições dos trilhos;
- Identificar possíveis falhas e situações de risco;
- Organizar o gerenciamento de usuários, trens e sensores;
- Apresentar informações de maneira visual e organizada;
- Auxiliar na prevenção de problemas operacionais e na manutenção preventiva.

## Identidade visual

A identidade visual do Ferrorama foi desenvolvida para representar o sistema de forma simples e fácil de reconhecer.

O principal elemento da logo é a letra "T", que representa tanto o tema dos trens quanto a inicial do sobrenome Tomczak, associado a um dos integrantes da equipe.

A continuação do nome a partir dessa letra foi uma escolha estética, com o objetivo de unir o nome do projeto à identidade de um dos integrantes.

Também foi incluído um trilho ferroviário ondulado abaixo do nome, reforçando a relação da marca com o transporte ferroviário.

## Requisitos funcionais

Os requisitos funcionais descrevem as funcionalidades que o sistema deverá oferecer.

| Código | Requisito funcional |
|---|---|
| RF01 | O sistema deve receber dados dos sensores IoT, incluindo temperatura do motor, pressão do óleo, velocidade, frenagem, nível de combustível e rotação. |
| RF02 | O sistema deve receber dados dos sensores de vibração, integridade da via, carga por eixo e temperatura dos trilhos. |
| RF03 | O sistema deve processar os dados recebidos com precisão e latência inferior a 1 segundo. |
| RF04 | O sistema deve registrar a localização geográfica dos dados recebidos. |
| RF05 | O sistema deve exibir em um mapa a localização dos trens e seus respectivos estados de desempenho. |
| RF06 | O sistema deve exibir um mapa dos trilhos e suas condições atuais, destacando possíveis anomalias. |
| RF07 | O sistema deve permitir que o usuário realize login utilizando nome e senha. |
| RF08 | O sistema deve permitir o cadastro de sensores com nome, localização, tipo de dado monitorado e trem associado. |

## Regras de negócio

As regras de negócio definem as condições e restrições que devem ser respeitadas durante o funcionamento do sistema.

| Código | Regra de negócio |
|---|---|
| RN01 | O sistema deve permitir acesso somente a usuários cadastrados. |
| RN02 | Caso o nome de usuário ou a senha estejam incorretos, o acesso deve ser negado. |
| RN03 | Somente usuários autenticados e com as permissões necessárias podem acessar as telas administrativas. |
| RN04 | Não podem existir sensores duplicados com o mesmo nome e a mesma localização. |
| RN05 | Todo sensor cadastrado deve estar associado a um trem. |
| RN06 | Cada sensor deve possuir um identificador único, nome, localização e vínculo com um trem. |
| RN07 | Após um login válido de um administrador, o sistema deve direcioná-lo para a tela inicial administrativa. |
| RN08 | As locomotivas em operação devem permanecer sob monitoramento contínuo enquanto estiverem ativas. |

## Desenvolvimento

O projeto conta com um vídeo de apresentação que explica as funções de cada integrante da equipe e apresenta possíveis mudanças e funcionalidades em desenvolvimento.

- [Assistir ao vídeo de apresentação do projeto](https://youtu.be/J_wqYzwryt4)

## Tecnologias e recursos

O projeto utiliza tecnologias de desenvolvimento web para construir a interface e implementar as funcionalidades do sistema.

- HTML e CSS para a estrutura e a aparência das páginas;
- JavaScript para funcionalidades interativas;
- PHP para a lógica do sistema no servidor;
- MySQL/MariaDB para o armazenamento e gerenciamento dos dados;
- Bootstrap 5.3.3 para auxiliar na criação de uma interface responsiva;
- Chart.js para exibição de gráficos;
- Sensores IoT como fonte dos dados previstos para o monitoramento ferroviário.

## Requisitos para execução

Para executar o projeto em ambiente local, são necessários:

- Computador com Windows ou Linux;
- XAMPP ou ambiente equivalente;
- Servidor Apache;
- PHP;
- MySQL ou MariaDB;
- Navegador atualizado;
- Visual Studio Code ou outro editor de código;
- Git para clonar o repositório.

## Instalação e configuração

Siga os passos abaixo para configurar o ambiente de desenvolvimento:

1. Instale o XAMPP.
2. Inicie os serviços Apache e MySQL pelo painel do XAMPP.
3. Acesse a pasta `htdocs`, localizada no diretório de instalação do XAMPP.
4. Abra o terminal nessa pasta.
5. Clone o repositório do projeto:
   ```bash
   git clone https://github.com/caiolborba-1/Ferrorama.git
   ```
6. Abra a pasta do projeto no Visual Studio Code.
7. Verifique as configurações de conexão com o banco de dados no arquivo `infra/conexao.php`.

### Configuração do banco de dados

O projeto utiliza MySQL/MariaDB para armazenar as informações de usuários, administradores, trens e demais dados do sistema.

Para configurar o banco de dados:

1. Inicie o MySQL pelo XAMPP.
2. Acesse o phpMyAdmin pelo navegador: `http://localhost/phpmyadmin`
3. Crie ou selecione o banco de dados utilizado pelo projeto.
4. Importe o arquivo SQL disponibilizado no repositório, caso esteja disponível.
5. Confira as configurações de conexão no arquivo `infra/conexao.php`.
6. Verifique se as credenciais e o nome do banco de dados estão configurados corretamente.

## Executando o sistema

Após realizar a instalação e a configuração:

1. Inicie os serviços Apache e MySQL pelo XAMPP.
2. Certifique-se de que o projeto está dentro da pasta `htdocs`.
3. Abra o navegador.
4. Acesse o endereço local:
   ```
   http://localhost:8080/nome_da_sua_pasta/Ferrorama/
   ```

O endereço pode variar conforme a configuração da porta do Apache e a localização da pasta do projeto.

## Perfis de acesso

O sistema prevê diferentes perfis de acesso, com permissões específicas para cada tipo de usuário.

### Administrador

Responsável pelo gerenciamento das funcionalidades administrativas do sistema, incluindo:

- Gerenciamento de usuários;
- Gerenciamento de trens;
- Gerenciamento de sensores;
- Acesso às telas administrativas.

### Usuário

Possui acesso às funcionalidades disponibilizadas para usuários cadastrados, respeitando as permissões definidas pelo sistema.

O acesso às páginas administrativas é restrito a usuários autenticados com as permissões necessárias.

## Estrutura do projeto

O projeto está organizado em diretórios para facilitar a separação dos arquivos e a manutenção do código:

```text
Ferrorama/
│
├── assets/
│   ├── img/
│   └── styles/
│
├── infra/
│   └── conexao.php
│
├── public/
│   ├── adicionar_usuario.php
│   ├── atualizar_rotas.php
│   └── ...
│
├── scripts/
│   └── ...
│
├── README.md
└── ...
```

A estrutura apresentada representa os principais diretórios conhecidos do projeto. Outros arquivos e páginas PHP estão organizados conforme as funcionalidades desenvolvidas.

## Integrantes

Equipe responsável pelo desenvolvimento do Ferrorama SA:

- Caio Luiz Borba;
- Matheus Tomczak;
- Felipe Zuquetti Pereira;
- Henrique Lombardi.

## Próximas etapas

As próximas etapas do desenvolvimento incluem:

- Integrar o cadastro e o login ao banco de dados do Ferrorama;
- Revisar as páginas PHP e integrar as funcionalidades ao sistema;
- Utilizar consultas preparadas (*prepared statements*) para executar operações no banco de dados com mais segurança;
- Revisar e melhorar o visual das páginas;
- Implementar o cadastro e o gerenciamento de sensores;
- Desenvolver as telas de monitoramento dos trens e dos trilhos;
- Preparar a exibição de alertas e relatórios de desempenho;
- Avançar na integração dos dados dos sensores IoT.

## Limitações conhecidas

Atualmente, o projeto ainda está em desenvolvimento. Algumas funcionalidades descritas representam objetivos futuros e não estão completamente implementadas.

Entre as principais limitações estão:

- A integração completa com os sensores IoT ainda está pendente;
- O monitoramento em tempo real depende da integração com os dispositivos e do recebimento dos dados;
- As funcionalidades de identificação automática de anomalias e emissão de alertas ainda precisam ser desenvolvidas;
- A geração de relatórios de desempenho está prevista para etapas futuras.

A disponibilidade das funcionalidades depende do andamento da implementação do projeto.


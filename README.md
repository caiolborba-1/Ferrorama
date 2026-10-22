
![Logo do Ferrorama](assets/img/Logo%20fundo%20branco.png)

# Ferrorama SA

Este projeto está sendo desenvolvido como parte de uma Situação de Aprendizagem do curso Técnico em Desenvolvimento de Sistemas Integrado ao Ensino Médio.

## Função do sistema

O Ferrorama SA tem como objetivo monitorar, em tempo real, os dados coletados pelos sensores IoT instalados nas locomotivas e nos trilhos ferroviários, ajudando a melhorar o controle operacional, a segurança e a eficiência do transporte ferroviário.

Atualmente, o projeto também tem como foco o desenvolvimento visual das telas e a organização das funcionalidades do sistema.

A plataforma foi planejada para receber, processar e exibir informações dos sensores, como:

- Temperatura do motor;
- Pressão do óleo;
- Velocidade da locomotiva;
- Frenagem;
- Rotação do motor;
- Nível de combustível;
- Vibração dos trilhos;
- Integridade da via férrea;
- Temperatura dos trilhos;
- Carga por eixo;
- Localização geográfica dos trens e sensores.

O sistema também deverá identificar possíveis falhas, riscos e comportamentos anormais nos componentes das locomotivas e na estrutura ferroviária, emitindo alertas para auxiliar na prevenção de acidentes e problemas operacionais.

Além do monitoramento, a plataforma contará com recursos de cadastro e gerenciamento de usuários, sensores e locomotivas, armazenamento de dados e geração de relatórios para auxiliar na análise de desempenho e no planejamento da manutenção preventiva.

A interface será organizada e responsiva, facilitando a visualização das informações por administradores, operadores ferroviários e equipes técnicas.

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
- MySQL/MariaDB para o armazenamento dos dados;
- Bootstrap para auxiliar na criação de uma interface responsiva;
- Sensores IoT como fonte dos dados previstos para o monitoramento ferroviário.

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

As funcionalidades descritas representam os objetivos e as etapas previstas para o projeto. Sua disponibilidade depende do andamento da implementação.

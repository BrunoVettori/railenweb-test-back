# PASSO A PASSO INSTALAÇÃO:

1 - Instale php na sua máquina

2 - Recomendo o uso do VSCode e das extenções php inteliphense e php server para facilitar no uso do projeto

3 - Para rodar o server PHP clique com o botão direito no projeto e depois em php serve project

## DOCKER

1 - Instale docker e docker compose na sua máquina

2 - Rode o comando ``docker compose up`` aonde se localiza o arquivo docker-compose.yaml (pasta docker no projeto)

## BANCO DE DADOS

1 - Assim que o docker estiver rodando pegue os scripts sql que estão na pasta database e roda a criação das tabelas

2 - Assim que as tabelas forem criadas você poderá rodar o script ``create-ususario.sql`` alterando ele com suas informações

## API

1 - Para o controle de API foi selecionado o aplicativo Bruno

2 - No aplicativo basta abrir um arquivo existente e apontar para a pasta ``railen-api-doc`` que voçê poderá realizar as consultas sem o browser
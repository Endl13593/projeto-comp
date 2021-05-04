###Projeto Laravel-Comp.
###Siga as etapas abaixo para rodar o projeto.
Após o download do projeto, entre na pasta do projeto e realize os seguintes comandos:

Subir os containers do Docker:

`docker-compose up -d`

Listar os containers:

`docker ps`

Aparecerão os seguintes containers 'nginx-comp', 'php-comp', 'phpmyadmin-comp', 'mysql-comp'.

Acesse http://localhost no navegador e o projeto já estará funcionando.

O container mysql-comp cria o banco de dados automaticamente.

Para acessar o banco de dados, acesse http://localhost:8080

Informe os dados de acesso abaixo, eles estarão também no arquivo .env na raíz do projeto.

`Servidor: mysql-comp`

`Usuário: root`

`Senha: root`

Na raíz do projeto tem uma pasta chamada dump com db_comp.sql, para importar de forma manual se preferir,
para isso remova todas as tabelas do banco de dados já criadas e faça a importação do arquivo db_comp.sql.

/*Criar a base de dados*/

create database crud_php;

/*Criação da tabela filme*/

create table filme(
    id int(5) not null primary key AUTO_INCREMENT,
    tituloOr varchar(50) not null,
    tituloBr varchar(50),
    ano varchar(4),
    diretor varchar(50),
    genero varchar(50)
);

/*Apagar todos os dados da tabela*/

truncate filme;

/* Excluir registro*/

DELETE FROM filme WHERE filme.id = 2;


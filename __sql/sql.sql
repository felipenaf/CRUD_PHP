/*Criar a base de dados*/
create database crud;

/*Criação da tabela filme*/
create table filme(
    id int(5) not null primary key AUTO_INCREMENT,
    tituloOr varchar(50) not null,
    tituloBr varchar(50),
    ano varchar(4),
    diretor varchar(50),
    genero varchar(50)
);
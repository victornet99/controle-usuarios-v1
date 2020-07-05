create database `controle-usuarios`;
use `controle-usuarios`;

create table `usuario` (
	idusuario int not null auto_increment primary key,
    nomeusuario varchar(60) not null,
    sobrenome varchar(60) not null,
    contatousuario varchar(60) not null,
    login varchar(30) not null,
    senha varchar(30) not null
);

alter table `usuario` change column `contatousuario` `contato`
int not null;

alter table `usuario` add column idadeusuario int not null
after `sobrenome`;
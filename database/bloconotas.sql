create database BlocoNotas;

use BlocoNotas;

create table usuario(
	id_usuario int not null primary key auto_increment,
    nome varchar(100),
    email varchar(100)
);

create table notas(
	id_notas int not null primary key auto_increment,
    fk_usuario int not null,
    titulo varchar(121),
    foreign key(fk_usuario) references usuario(id_usuario),
    conteudo text,
    data_criacao date,
    categoria varchar(100)
);

insert into usuario
values(1, 'isa', 'eu@gmail.com');

insert into notas
values(1, 1, 'uau', 'muito legal essa aula', '2023-12-11', 'coisas joias');
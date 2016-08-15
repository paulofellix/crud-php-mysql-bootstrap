create database album_store;

use album_store;

create table album(
    id int auto_increment,
    ds_album varchar(100),
    dt_album date,
    primary key(id)
);

insert into album values (null,'album 1', '2016-01-10'), (null,'album 2', '1991-09-11'),(null,'album 3', '1998-10-30');
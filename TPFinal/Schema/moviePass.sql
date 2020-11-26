create database moviePass;
use moviePass;
#drop database moviepass;

create table cinemas (
id_cine int not null auto_increment,
cinemaName varchar(255) not null,
cinemaAddress varchar (255) not null,
capacity int not null, #Cantidad maxima de salas
aperHour varchar(255) not null,
closeHour varchar(255) not null,
constraint pk_cines primary key (id_cine),
constraint unq_cinemas unique (cinemaName, cinemaAddress))engine=InnoDB;


create table rooms (
id_room int not null auto_increment,
roomName varchar (255) not null,
seatsCapacity int not null,
ticketValue float not null,
id_cine int not null, 
constraint pk_rooms primary key (id_room),
constraint fk_cinemaRoom foreign key (id_cine) references cinemas(id_cine) on update cascade on delete cascade)engine=InnoDB;

create table movies (
id_movie int auto_increment,
id int, #del json
title varchar (255), 
original_title varchar (255),
overview varchar (999),
original_language varchar (255),
vote_average float,
vote_count float,
video boolean,
release_date date, 
popularity float,
poster_path varchar(255),
backdrop_path varchar(255) ,
adult varchar(255),
genre_ids varchar(255),
constraint pk_movies primary key (id_movie),
constraint unq_title unique (title))engine=InnoDB;


create table functions (
id_function int not null auto_increment,
id_room int not null,
id_movie int not null, 
occupiedSeats int not null default 0,
functionDate datetime not null,
functionsHour varchar (255) not null,
constraint pk_function primary key (id_function),
constraint fk_functionsRooms foreign key (id_room) references rooms (id_room) on update cascade on delete cascade,
constraint fk_movieId foreign key (id_movie) references movies (id_movie) on update cascade on delete cascade,
constraint unq_movieRoom unique (id_room, functionDate, functionsHour))engine=InnoDB; #Para que en una sala, en un dia determinado, no se puedan reproducir dos peliculas

create table genres (
id_genre int not null,
genreName varchar (255),
constraint pk_genres primary key (id_genre))engine=InnoDB;


create table genresXmovies(
id_genre int not null,
id_movie int not null,
constraint pk_gxm primary key (id_genre,id_movie),
constraint fk_genre foreign key (id_genre) references genres(id_genre),
constraint fk_movie foreign key (id_movie) references movies(id_movie))engine=InnoDB;

create table userTypes (
id_userType int not null auto_increment,
nameType varchar (255),
constraint pk_userTye primary key (id_userType))engine=InnoDB;

insert into userTypes (nameType) values ("Administrador"),("Usuario");

create table users (
id_user int not null auto_increment,
firstName varchar (255) not null, 
lastName varchar (255) not null,
userName varchar (255) not null,
pass varchar (999) not null,
mail varchar (255) not null,
dni varchar (255) not null,
birthDate date not null,
id_userType int not null,
constraint pk_users primary key (id_user),
constraint fk_usersType foreign key (id_userType) references userTypes(id_userType) on update cascade on delete cascade)engine=InnoDB;

create table companies(
id_company int AUTO_INCREMENT not null, 
companyName varchar(255) not null,
constraint pk_company primary key (id_company))engine=InnoDB;

insert into companies (companyName) values ("MasterCard"), ("Visa");



create table creditCards (
id_creditCard int AUTO_INCREMENT,
cardHolder varchar(255) not null, 
expiration date not null, 
numberCC blob , 
id_company int not null, 
id_user int not null,
constraint pk_creditCard primary key (id_creditCard),
constraint fk_user foreign key (id_user) references users(id_user),
constraint fk_company foreign key (id_company) references companies(id_company) on delete cascade on update cascade)engine=InnoDB;


create table purchases(
id_purchase int AUTO_INCREMENT not null,
total float not null, 
id_creditCard int,
purchaseDate date not null,
constraint pk_purchase primary key (id_purchase),
constraint fk_creditCard foreign key (id_creditCard) references creditCards (id_creditCard) on delete set null)engine=InnoDB;

create table tickets(
id_ticket int auto_increment not null,
id_function int not null,
id_purchase int not null,
constraint pk_ticket primary key (id_ticket),
constraint fk_purchase foreign key (id_purchase) references purchases(id_purchase),
constraint fk_function foreign key (id_function) references functions(id_function)on update cascade on delete cascade)engine=InnoDB;
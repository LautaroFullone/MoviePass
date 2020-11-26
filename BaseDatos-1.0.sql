create database moviePass;
use moviePass;

create table cines (
id_cine int not null auto_increment,
nombreCine varchar(50) not null,
direccionCine varchar (50) not null,
capacidad int not null,
valorEntrada float not null,
constraint pk_cines primary key (id_cine),
constraint unq_nombre unique (nombreCine,direccionCine));

    create table Users( name_user varchar(30)not null,
						last_name varchar(30)not null,
                        id_user int  auto_increment not null,
                        dni varchar(8) not null,
                        user_name varchar(50) not null,
                        birth date not null,
                        pass varchar(100)not null,
                        mail varchar(50) not null,
				# idAdmin boolean default false,
                        constraint pk_user primary key (id_user),
                        constraint unq_user unique (dni,user_name,mail)                     
    )engine ="InnoDB" default char set = latin1;
    
    insert into  users (name_user,last_name,dni,user_name,birth,pass,mail) values("pepa","Pig","42587456","username1","2020-12-12",aes_encrypt("contra","llave"),"mail1@pepe.com"),("pepa","Pig","42587456","username2","2020-12-12",aes_encrypt("contra","llave"),"mail2@pepe.com");
    select cast(aes_decrypt(pass,"llave") as char(50)) as PAss from Users;
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
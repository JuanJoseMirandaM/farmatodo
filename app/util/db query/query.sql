create database db_ventas;
use db_ventas ;

-- creacion de tablas
create table productos(
	id int auto_increment,
    nombre varchar(100) not null,
    precio double not null,
    primary key(id)
);

create table ventas(
	id int auto_increment,
    cliente varchar(100) not null,
    fecha date not null,
    primary key(id)
);

create table ventadetalle(
	id int auto_increment,
    producto_id int references producto(id),
    ventas_id int references ventas(id),
    cantidad int not null,
    descuento double not null,
    primary key(id)
);

create table users(
	id int auto_increment,
    email varchar(100),
    usuario varchar(50) not null,
	pass varchar(256) not null,
    estado int default 0,
    privilegio varchar(50) not null,
    primary key(id)
);

-- procedimientos almacenados
	-- Usuarios (users)
    create procedure registrar(
		_email varchar(100),
		_usuario varchar(50),
		_pass varchar(256),
		_privilegio varchar(50)
    )
    insert into users (email,usuario,pass,privilegio)
    values(_email,_usuario,_pass,_privilegio)
    ;
    
    call registrar('jjsmm97@gmail','pepe','123','admin');
    
    -- select * from users
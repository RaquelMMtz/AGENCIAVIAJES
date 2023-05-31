USE master;
GO
IF DB_ID (N'AgenciasViajes') IS NOT NULL
DROP DATABASE AgenciasViajes;
CREATE DATABASE AgenciasViajes
ON
( NAME = AgenciasViajes_dat,
    FILENAME = 'C:\samples\AgenciasViajes.mdf',
    SIZE = 10,
    MAXSIZE = 50,
    FILEGROWTH = 5 )
LOG ON
( NAME = AgenciasViajes_log,
    FILENAME = 'C:\samples\AgenciasViajes.ldf',
    SIZE = 5MB,
    MAXSIZE = 25MB,
    FILEGROWTH = 5MB ) ;
GO
USE AgenciasViajes;
GO
CREATE TABLE Cliente
(
idCliente INT NOT NULL,
calle VARCHAR (20) NOT NULL,
colonia varchar (20) NOT NULL,
cp INT NOT NULL,
pais varchar (15),
estatus BIT DEFAULT 1 NOT NULL
)
GO
CREATE TABLE Destino
(
idDestino INT NOT NULL,
destino varchar (15) not null,
descripcion varchar (50) not null,
duracion int not null,
precio int not null,
estatus BIT DEFAULT 1 NOT NULL
)
GO
------------------------------------
CREATE TABLE Usuario
(
idUsuario INT NOT NULL,
username varchar (40) not null,
passUsuario varchar(120) not null,
nombre varchar (20) not null,
aPaterno varchar (20) not null,
aMaterno varchar (20) not null,
idCliente INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL
)
GO
CREATE TABLE Viaje
(
idViaje INT NOT NULL,
origen varchar (15) not null,
precio int not null,
duracion int not null,
idCliente int not null,
idDestino int not null,
estatus BIT DEFAULT 1 NOT NULL
)
GO
CREATE TABLE Reserva
(
idReserva INT NOT NULL,
llegada datetime not null,
salida datetime not null,
idCliente int not null,
idViaje int not null,
estatus BIT DEFAULT 1 NOT NULL
)
GO
CREATE TABLE Transporte
(
idTransporte int not null,
modelo varchar (30) not null,
matricula varchar (30) not null,
operador varchar (50) not null,
tipo varchar (15) not null,
idViaje int not null,
estatus BIT DEFAULT 1 NOT NULL
)
GO
CREATE TABLE Hotel
(
idHotel int not null,
nombre varchar (10) not null,
telefono int not null,
calle varchar (15) not null,
colonia varchar (15) not null,
cp int not null,
pais varchar (15) not null,
idReserva int not null,
estatus BIT DEFAULT 1 NOT NULL
)
GO
CREATE TABLE Servicio
(
idServicio int not null,
nombre varchar (20) not null,
descripcion varchar (30) not null,
idHotel int not null,
estatus BIT DEFAULT 1 NOT NULL
)
GO



ALTER TABLE Cliente ADD CONSTRAINT PK_Cliente PRIMARY KEY(idCliente)
ALTER TABLE Destino ADD CONSTRAINT PK_Destino PRIMARY KEY (idDestino)
ALTER TABLE Hotel ADD CONSTRAINT PK_Hotel PRIMARY KEY(idHotel)
ALTER TABLE Reserva ADD CONSTRAINT PK_Reserva PRIMARY KEY(idReserva)
ALTER TABLE Servicio ADD CONSTRAINT PK_Servicio PRIMARY KEY(idServicio)
ALTER TABLE Transporte ADD CONSTRAINT PK_Transporte PRIMARY KEY(idTransporte)
ALTER TABLE Usuario ADD CONSTRAINT PK_Usuario PRIMARY KEY(idUsuario)
ALTER TABLE Viaje ADD CONSTRAINT PK_Viaje PRIMARY KEY(idViaje)


ALTER TABLE Hotel ADD CONSTRAINT FK_HotelReserva FOREIGN KEY(idReserva) REFERENCES Reserva(idReserva)

ALTER TABLE Reserva ADD CONSTRAINT FK_ReservaCliente FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente)
ALTER TABLE Reserva ADD CONSTRAINT FK_ReservaViaje FOREIGN KEY(idViaje) REFERENCES Viaje(idViaje)

ALTER TABLE Servicio ADD CONSTRAINT FK_ServicioHotel FOREIGN KEY (idHotel) REFERENCES Hotel(idHotel)

ALTER TABLE Transporte ADD CONSTRAINT FK_TransporteViaje FOREIGN KEY (idViaje) REFERENCES Viaje(idViaje)

ALTER TABLE Usuario ADD CONSTRAINT FK_UsuarioCliente FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente)

ALTER TABLE Viaje ADD CONSTRAINT FK_ViajeCliente FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente)
ALTER TABLE Viaje ADD CONSTRAINT FK_ViajeDestino FOREIGN KEY (idDestino) REFERENCES Destino (idDestino)



CREATE INDEX TX_Cliente ON Cliente(idCliente)
CREATE INDEX TX_Destino ON Destino(idDestino)
CREATE INDEX TX_Hotel ON Hotel(idHotel)
CREATE INDEX TX_Viaje ON Viaje(idViaje)
CREATE INDEX TX_Reserva ON Reserva(idReserva)
CREATE INDEX TX_Servicio ON Servicio(idServicio)
CREATE INDEX TX_Transporte ON Transporte (idTransporte)
CREATE INDEX TX_Usuario ON Usuario (idUsuario)



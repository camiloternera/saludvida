CREATE DATABASE SaludVida; 
USE SaludVida;

CREATE TABLE roles(
	id_rol INT PRIMARY KEY,
    nom_rol varchar(40) NOT NULL
);

CREATE TABLE Usuarios(
	id_usuario INT PRIMARY KEY,
	cedula_usuario INT NOT NULL UNIQUE,
	password_user VARCHAR(70),
    id_rol INT,FOREIGN KEY(id_rol) REFERENCES roles(id_rol)
);

CREATE TABLE Pacientes(
	cedula_paciente INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    identificacion INT NOT NULL UNIQUE,
    direccion VARCHAR(100) NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    sexo VARCHAR(2) NOT NULL
);

CREATE TABLE Medicos(
	cedula_medico INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    telefono INT NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE, 
    sexo VARCHAR(2) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    n_colegiado INT NOT NULL
);

CREATE TABLE Citas(
	codigo_cita INT PRIMARY KEY,
    cedula_paciente INT, FOREIGN KEY(cedula_paciente) REFERENCES Pacientes(cedula_paciente),
    fecha DATE NOT NULL,
    hora TIMESTAMP NOT NULL,
    cedula_medico INT NOT NULL, FOREIGN KEY(cedula_medico) REFERENCES Medicos(cedula_medico),
    tipo_cita VARCHAR(100) NOT NULL    
);


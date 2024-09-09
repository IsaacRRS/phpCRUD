-- insira no seu banco 
CREATE TABLE pessoas --nome do banco (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR (80) NOT NULL,
    email VARCHAR (80) NOT NULL UNIQUE,
    celular VARCHAR(30) NULL,
);
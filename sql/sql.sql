CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(80) NOT NULL,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY(id)
) COLLATE=utf8_general_ci;


INSERT INTO users(name, email, password) VALUES
('Junior Cintra', 'apspvcintraj@gmail.com', '2d29b962490320f821db80cddf6ed4b6e4ac7498');
/*hash SHA-1 de um hash MD5 da string “123mudar”*/


CREATE TABLE candidatos(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(80) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    dtNascimento DATE,
    faculdade TINYINT(11),
    pretSelario VARCHAR(30),
    resumoHab TEXT,
    ativo TINYINT(11) DEFAULT 1,
    lixeira TINYINT(11) DEFAULT 0,
    destaque TINYINT(11) DEFAULT 0,
    PRIMARY KEY(id)
) COLLATE=utf8_general_ci;
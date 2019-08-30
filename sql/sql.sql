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
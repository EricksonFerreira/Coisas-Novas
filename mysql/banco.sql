CREATE TABLE Users (
    id int auto_increment,
    name varchar(255) NOT NULL,
    user varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    constraint pkusers primary key (id)
);

CREATE TABLE pontos_turisticos(
    id INT NOT NULL AUTO_INCREMENT,
    nome_ponto VARCHAR(200) NOT NULL,
    logradouro VARCHAR(200) NOT NULL,
    bairro VARCHAR(200) NOT NULL,
    numero_ponto VARCHAR(50),
    imagem VARCHAR(200)NOT NULL,
    CONSTRAINT pkpontos PRIMARY KEY(id)
);
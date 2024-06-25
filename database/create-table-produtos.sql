CREATE TABLE produtos (
  id BigInt(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  codigo char(255) NOT NULL,
  nome char(255) NOT NULL,
  descricao char(255),
  imagem char(255),
  valor float
);
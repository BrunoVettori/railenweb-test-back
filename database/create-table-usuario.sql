CREATE TABLE usuarios (
  id BigInt(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  roles ENUM('usuario', 'admin', 'root'),
  nome char(255),
  senha char(255)
);
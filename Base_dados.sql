CREATE DATABASE IF NOT EXISTS loja;
USE loja;

CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(100),
    quantidade INT,
    preco_unitario DECIMAL(10,2)
);

INSERT INTO carrinho (item, quantidade, preco_unitario) VALUES
('Camiseta', 2, 49.90),
('Calça Jeans', 1, 129.90),
('Meia', 5, 9.99),
('Tênis', 1, 299.90);
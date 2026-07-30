#!/bin/bash

echo "=========================================="
echo "Preparando banco Serenatto"
echo "=========================================="

echo "Iniciando MySQL..."
sudo service mysql start

echo "Criando banco, tabela e inserindo dados..."

mysql -u root -p <<'SQL'
CREATE DATABASE IF NOT EXISTS serenatto
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE serenatto;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100) NOT NULL,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);

INSERT IGNORE INTO produtos (id,tipo,nome,descricao,imagem,preco) VALUES
(1,'Café','Café Cremoso','Café cremoso irresistivelmente suave e que envolve seu paladar','cafe-cremoso.jpg',5.00),
(2,'Café','Café com Leite','A harmonia perfeita do café e do leite, uma experiência reconfortante','cafe-com-leite.jpg',2.00),
(3,'Café','Cappuccino','Café suave, leite cremoso e uma pitada de sabor adocicado','cappuccino.jpg',7.00),
(4,'Café','Café Gelado','Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.','cafe-gelado.jpg',3.00),
(5,'Almoço','Bife','Bife, arroz com feijão e uma deliciosa batata frita','bife.jpg',27.90),
(6,'Almoço','Filé de peixe','Filé de peixe salmão assado, arroz, feijão verde e tomate.','prato-peixe.jpg',24.99),
(7,'Almoço','Frango','Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante','prato-frango.jpg',23.00),
(8,'Almoço','Fettuccine','Prato italiano autêntico da massa do fettuccine com peito de frango grelhado','fettuccine.jpg',22.50);

SELECT id,tipo,nome,preco FROM produtos;
SQL

echo ""
echo "Banco preparado com sucesso!"
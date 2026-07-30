CREATE DATABASE IF NOT EXISTS serenatto
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE serenatto;

CREATE TABLE IF NOT EXISTS produtos (
    id INT NOT NULL AUTO_INCREMENT,
    tipo VARCHAR(100) NOT NULL,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Café', 'Café Cremoso',
       'Café cremoso irresistivelmente suave e que envolve seu paladar',
       'cafe-cremoso.jpg', 5.00
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Café' AND nome = 'Café Cremoso'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Café', 'Café com Leite',
       'A harmonia perfeita do café e do leite, uma experiência reconfortante',
       'cafe-com-leite.jpg', 2.00
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Café' AND nome = 'Café com Leite'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Café', 'Cappuccino',
       'Café suave, leite cremoso e uma pitada de sabor adocicado',
       'cappuccino.jpg', 7.00
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Café' AND nome = 'Cappuccino'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Café', 'Café Gelado',
       'Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.',
       'cafe-gelado.jpg', 3.00
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Café' AND nome = 'Café Gelado'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Almoço', 'Bife',
       'Bife, arroz com feijão e uma deliciosa batata frita',
       'bife.jpg', 27.90
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Almoço' AND nome = 'Bife'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Almoço', 'Filé de peixe',
       'Filé de peixe salmão assado, arroz, feijão verde e tomate.',
       'prato-peixe.jpg', 24.99
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Almoço' AND nome = 'Filé de peixe'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Almoço', 'Frango',
       'Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante',
       'prato-frango.jpg', 23.00
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Almoço' AND nome = 'Frango'
);

INSERT INTO produtos (tipo, nome, descricao, imagem, preco)
SELECT 'Almoço', 'Fettuccine',
       'Prato italiano autêntico da massa do fettuccine com peito de frango grelhado',
       'fettuccine.jpg', 22.50
WHERE NOT EXISTS (
    SELECT 1 FROM produtos
    WHERE tipo = 'Almoço' AND nome = 'Fettuccine'
);

SELECT id, tipo, nome, preco FROM produtos ORDER BY tipo, id;
-- Criação da tabela de produtos
CREATE TABLE IF NOT EXISTS produtos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    estoque INTEGER NOT NULL DEFAULT 0,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    atualizado_em DATETIME DEFAULT NULL
);

-- Inserindo alguns produtos de exemplo
INSERT INTO produtos (nome, descricao, preco, estoque) VALUES
('Notebook Dell Inspiron 15', 'Notebook com processador Intel Core i5, 8GB RAM, SSD 256GB, tela 15.6 polegadas Full HD', 3499.90, 15),
('Mouse Logitech MX Master 3', 'Mouse ergonômico sem fio com sensor de alta precisão, bateria recarregável e design confortável', 549.90, 32),
('Teclado Mecânico Keychron K2', 'Teclado mecânico sem fio com switches Gateron, iluminação RGB e compatível com Mac e Windows', 799.90, 8),
('Monitor LG UltraWide 29"', 'Monitor ultrawide 29 polegadas, resolução 2560x1080, IPS, 75Hz, ideal para produtividade', 1899.90, 5),
('Webcam Logitech C920', 'Webcam Full HD 1080p com microfone estéreo, ideal para videoconferências e streaming', 449.90, 22),
('Headset HyperX Cloud II', 'Headset gamer com som surround 7.1, microfone com cancelamento de ruído e almofadas confortáveis', 599.90, 18),
('SSD Samsung 970 EVO 1TB', 'SSD NVMe M.2 com velocidades de leitura até 3500MB/s, ideal para upgrade de performance', 899.90, 12),
('Cadeira Gamer DT3 Sports', 'Cadeira ergonômica para gamers com ajuste de altura, apoio lombar e braços 3D', 1299.90, 3);


-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price VARCHAR(20) NOT NULL,
    images TEXT NOT NULL
);

-- Inserta algunos datos iniciales (opcional)
INSERT INTO products (id, name, description, price, images) VALUES
(1, 'Dru Jacket in Wool and Silk', 'Single breasted tailored luxury jacket in structured wool and silk with peak lapels and jetted front pockets.', '1625', '["product1.jpeg"]'),
(2, 'Pants in Wool and Silk', 'A pair of pants in structured wool and silk with peak lapels and jetted front pockets.', '1250', '["product2.jpeg"]'),
(3, 'T-Shirt in Wool and Silk', 'A t-shirt in structured wool and silk with peak lapels and jetted front pockets.', '1250', '["product3.jpeg"]'),
(4, 'Shorts in Wool and Silk', 'A pair of shorts in structured wool and silk with peak lapels and jetted front pockets.', '1250', '["product4.jpeg"]'),
(5, 'Sweater in Wool and Silk', 'A sweater in structured wool and silk with peak lapels and jetted front pockets.', '1250', '["product5.jpeg"]');

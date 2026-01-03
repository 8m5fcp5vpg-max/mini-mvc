INSERT INTO categorie (nom, description) VALUES 
('Audio', 'Écouteurs, casques et enceintes haute fidélité'),
('Téléphonie', 'iPhone et accessoires connectés'),
('Informatique', 'MacBook, iMac et stations de travail'); 


INSERT INTO produit (nom, description, prix, stock, categorie_id) VALUES 
('AirPods Pro (2e génération)', 'Écouteurs sans fil avec réduction active du bruit et audio spatial.', 279.00, 50, 1),
('iPhone 15 Pro', 'Titane aérospatial, puce A17 Pro et système photo pro.', 1229.00, 25, 2),
('MacBook Air M2', 'Design ultra-fin, écran Liquid Retina et autonomie de 18h.', 1299.00, 10, 3);
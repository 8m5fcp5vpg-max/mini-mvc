SET session_replication_role = 'replica';

DO $$
BEGIN
    EXECUTE 'SET app.password_hash = ''$2a$10$wE9qjTfJ4Y2xX9L2y3iIe.u7K2N7v6d8c4h0Z4s8X6O4s0L3K9j6'''; 
EXCEPTION 
    WHEN OTHERS THEN
        NULL;
END
$$ LANGUAGE plpgsql;

TRUNCATE administrateur, categorie, produit, client, commande, ligne_commande RESTART IDENTITY CASCADE;

INSERT INTO administrateur (nom_utilisateur, email, mot_de_passe, role) VALUES
('superadmin', 'super.admin@mvc.com', current_setting('app.password_hash'), 'super_admin'),
('admin_produit', 'admin.prod@mvc.com', current_setting('app.password_hash'), 'admin');

INSERT INTO categorie (id, nom, description) VALUES
(1, 'Électronique', 'Gadgets et appareils high-tech.'),
(2, 'Vêtements Homme', 'Mode et accessoires pour hommes.'),
(3, 'Livres & Culture', 'Romans, essais et bandes dessinées.'),
(4, 'Maison & Jardin', 'Articles de décoration et outils de jardinage.'),
(5, 'Jouets & Jeux', 'Jeux de société et jouets pour enfants.');

INSERT INTO client (id, nom, email, mot_de_passe, adresse, ville, code_postal) VALUES
(1, 'Alice Dubois', 'alice.dubois@test.com', current_setting('app.password_hash'), '12 Rue des Roses', 'Paris', '75001'),
(2, 'Bob Martin', 'bob.martin@test.com', current_setting('app.password_hash'), '34 Avenue de la Liberté', 'Lyon', '69002'),
(3, 'Charles Petit', 'charles.petit@test.com', current_setting('app.password_hash'), '56 Place du Commerce', 'Marseille', '13008'),
(4, 'Diane Leroy', 'diane.leroy@test.com', current_setting('app.password_hash'), '78 Boulevard Saint-Michel', 'Toulouse', '31000'),
(5, 'Eve Fournier', 'eve.fournier@test.com', current_setting('app.password_hash'), '90 Rue des Peupliers', 'Nantes', '44000');

INSERT INTO produit (id, categorie_id, nom, description, prix, stock, statut) VALUES
(1, 1, 'Smartphone X10', 'Le dernier cri de la technologie mobile.', 799.99, 50, 'actif'),
(2, 1, 'Casque Bluetooth Pro', 'Son haute fidélité sans fil.', 129.50, 120, 'actif'),
(3, 1, 'Webcam HD 4K', 'Pour des vidéoconférences ultra claires.', 45.00, 80, 'actif'),
(4, 1, 'Chargeur Portable 20000mAh', 'Batterie externe longue durée.', 29.90, 200, 'actif'),
(5, 1, 'Souris Ergonomique', 'Confort maximal pour le travail.', 19.99, 150, 'actif'),
(6, 2, 'T-Shirt Coton Bio', 'Classique et écologique.', 25.00, 300, 'actif'),
(7, 2, 'Jeans Slim Fit', 'Coupe ajustée, délavage bleu brut.', 65.90, 100, 'actif'),
(8, 2, 'Pull en Laine Mérinos', 'Chaleur et douceur garanties.', 89.00, 75, 'actif'),
(9, 2, 'Chaussettes de Sport (Lot de 3)', 'Respirantes et confortables.', 12.00, 400, 'actif'),
(10, 2, 'Veste Imperméable', 'Idéale pour toutes les saisons.', 119.99, 50, 'actif'),
(11, 2, 'Cravate Soie Noire', 'Accessoire élégant.', 35.00, 90, 'actif'),
(12, 3, 'Roman Fantastique', 'Un monde magique à explorer.', 19.99, 60, 'actif'),
(13, 3, 'Livre de Recettes Végétales', '100 recettes saines et gourmandes.', 29.50, 40, 'actif'),
(14, 3, 'Bande Dessinée', 'Un chef-d’œuvre graphique.', 14.95, 110, 'actif'),
(15, 3, 'Essai : Philosophie', 'Analyse de l’ère numérique.', 22.00, 55, 'actif'),
(16, 4, 'Kit Outils Jardinage', 'Tout pour prendre soin de votre jardin.', 49.90, 70, 'actif'),
(17, 4, 'Lampe de Table Design', 'Éclairage d’ambiance moderne.', 75.00, 65, 'actif'),
(18, 4, 'Bougie Parfumée Lavande', 'Détente assurée.', 15.50, 180, 'actif'),
(19, 4, 'Tapis Salon 2x3m', 'Doux et résistant.', 150.00, 30, 'actif'),
(20, 4, 'Étagère Murale Flottante', 'Optimisez votre espace.', 39.99, 100, 'actif'),
(21, 5, 'Jeu de Société Stratégique', 'Pour 2 à 4 joueurs.', 39.90, 95, 'actif'),
(22, 5, 'Puzzle 1000 Pièces', 'Un défi pour les amateurs.', 17.50, 130, 'actif'),
(23, 5, 'Voiture Télécommandée', 'Haute vitesse, tout-terrain.', 55.00, 85, 'actif'),
(24, 5, 'Figurine Collection A', 'Édition limitée.', 28.00, 45, 'actif'),
(25, 5, 'Blocs de Construction', 'Pour les petits architectes.', 79.99, 60, 'actif'),
(26, 5, 'Produit Inactif', 'Ancien article retiré de la vente.', 1.00, 0, 'inactif');

INSERT INTO commande (id, client_id, numero, statut, montant_total, adresse_de_livraison) VALUES
(1, 1, 'COMM-2025-0001', 'livree', 799.99, '12 Rue des Roses, 75001 Paris'),
(2, 2, 'COMM-2025-0002', 'payee', 284.00, '34 Avenue de la Liberté, 69002 Lyon'),
(3, 3, 'COMM-2025-0003', 'expediee', 99.95, '56 Place du Commerce, 13008 Marseille'),
(4, 4, 'COMM-2025-0004', 'en_attente', 150.00, '78 Boulevard Saint-Michel, 31000 Toulouse'),
(5, 5, 'COMM-2025-0005', 'annulee', 39.90, '90 Rue des Peupliers, 44000 Nantes'),
(6, 1, 'COMM-2025-0006', 'livree', 43.00, '12 Rue des Roses, 75001 Paris'),
(7, 2, 'COMM-2025-0007', 'payee', 45.00, '34 Avenue de la Liberté, 69002 Lyon'),
(8, 3, 'COMM-2025-0008', 'expediee', 29.50, '56 Place du Commerce, 13008 Marseille'),
(9, 4, 'COMM-2025-0009', 'livree', 119.99, '78 Boulevard Saint-Michel, 31000 Toulouse'),
(10, 5, 'COMM-2025-0010', 'en_attente', 55.00, '90 Rue des Peupliers, 44000 Nantes');

INSERT INTO ligne_commande (commande_id, produit_id, quantite, prix_unitaire_commande, sous_total_ligne) VALUES
(1, 1, 1, 799.99, 799.99),
(2, 2, 2, 129.50, 259.00),
(2, 6, 1, 25.00, 25.00),
(3, 12, 5, 19.99, 99.95),
(4, 19, 1, 150.00, 150.00),
(5, 21, 1, 39.90, 39.90),
(6, 18, 2, 15.50, 31.00),
(6, 9, 1, 12.00, 12.00),
(7, 3, 1, 45.00, 45.00),
(8, 13, 1, 29.50, 29.50),
(9, 10, 1, 119.99, 119.99),
(10, 23, 1, 55.00, 55.00);

SET session_replication_role = 'origin';
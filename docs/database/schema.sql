SET session_replication_role = 'replica'; 

DROP TABLE IF EXISTS ligne_commande;
DROP TABLE IF EXISTS commande;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS administrateur;

CREATE TABLE administrateur (
    id SERIAL PRIMARY KEY,
    nom_utilisateur VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL, 
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW(),

    CONSTRAINT chk_admin_role CHECK (role IN ('admin', 'super_admin'))
);

CREATE TABLE categorie (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    image VARCHAR(512),
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE client (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE produit (
    id SERIAL PRIMARY KEY,
    categorie_id INT NOT NULL, 
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    prix NUMERIC(10, 2) NOT NULL,
    image VARCHAR(512),
    stock INT NOT NULL DEFAULT 0,
    statut VARCHAR(50) NOT NULL DEFAULT 'actif',
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW(),

    CONSTRAINT chk_produit_prix CHECK (prix > 0.00),
    CONSTRAINT chk_produit_stock CHECK (stock >= 0),
    CONSTRAINT chk_produit_statut CHECK (statut IN ('actif', 'inactif')),

    FOREIGN KEY (categorie_id) REFERENCES categorie(id)
        ON DELETE RESTRICT 
        ON UPDATE CASCADE
);

CREATE TABLE commande (
    id SERIAL PRIMARY KEY,
    client_id INT NOT NULL, 
    numero VARCHAR(50) NOT NULL UNIQUE,
    statut VARCHAR(50) NOT NULL DEFAULT 'en_attente', 
    montant_total NUMERIC(10, 2) NOT NULL,
    adresse_de_livraison TEXT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT NOW(),
    updated_at TIMESTAMP NOT NULL DEFAULT NOW(),

    CONSTRAINT chk_commande_montant CHECK (montant_total >= 0.00),
    CONSTRAINT chk_commande_statut CHECK (statut IN ('en_attente', 'payee', 'expediee', 'livree', 'annulee')),

    FOREIGN KEY (client_id) REFERENCES client(id)
        ON DELETE RESTRICT 
        ON UPDATE CASCADE
);

CREATE TABLE ligne_commande (
    id SERIAL PRIMARY KEY,
    commande_id INT NOT NULL, 
    produit_id INT NOT NULL,   
    quantite INT NOT NULL,
    prix_unitaire_commande NUMERIC(10, 2) NOT NULL, 
    sous_total_ligne NUMERIC(10, 2) NOT NULL,
    
    CONSTRAINT chk_lc_quantite CHECK (quantite > 0),
    CONSTRAINT chk_lc_prix CHECK (prix_unitaire_commande > 0.00),

    UNIQUE (commande_id, produit_id), 

    FOREIGN KEY (commande_id) REFERENCES commande(id)
        ON DELETE CASCADE 
        ON UPDATE CASCADE,
    FOREIGN KEY (produit_id) REFERENCES produit(id)
        ON DELETE RESTRICT 
        ON UPDATE CASCADE
);

SET session_replication_role = 'origin';

CREATE INDEX idx_produit_nom ON produit (nom);
CREATE INDEX idx_commande_numero ON commande (numero);
CREATE INDEX idx_lc_commande ON ligne_commande (commande_id);
CREATE INDEX idx_lc_produit ON ligne_commande (produit_id);
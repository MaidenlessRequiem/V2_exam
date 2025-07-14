
CREATE TABLE V1_EXAM_membre (
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    genre ENUM('Homme', 'Femme') NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    ville VARCHAR(100),
    mdp VARCHAR(255) NOT NULL,
    image_profil VARCHAR(255)
);

CREATE TABLE V1_EXAM_categorie_objet (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(100) NOT NULL
);

CREATE TABLE V1_EXAM_objet (
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(100) NOT NULL,
    id_categorie INT NOT NULL,
    id_membre INT NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES V1_EXAM_categorie_objet(id_categorie) ON DELETE CASCADE,
    FOREIGN KEY (id_membre) REFERENCES V1_EXAM_membre(id_membre) ON DELETE CASCADE
);

CREATE TABLE V1_EXAM_images_objet (
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT NOT NULL,
    nom_image VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_objet) REFERENCES V1_EXAM_objet(id_objet) ON DELETE CASCADE
);

CREATE TABLE V1_EXAM_emprunt (
    id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT NOT NULL,
    id_membre INT NOT NULL,
    date_emprunt DATE NOT NULL,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES V1_EXAM_objet(id_objet) ON DELETE CASCADE,
    FOREIGN KEY (id_membre) REFERENCES V1_EXAM_membre(id_membre) ON DELETE CASCADE
);



INSERT INTO V1_EXAM_membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice', '1995-06-15', 'Femme', 'alice@example.com', 'Antananarivo', 'mdp1', 'alice.jpg'),
('Bob', '1990-08-22', 'Homme', 'bob@example.com', 'Toamasina', 'mdp2', 'bob.jpg'),
('Charlie', '1988-01-10', 'Homme', 'charlie@example.com', 'Fianarantsoa', 'mdp3', 'charlie.jpg'),
('Dina', '2000-12-01', 'Femme', 'dina@example.com', 'Mahajanga', 'mdp4', 'dina.jpg');



INSERT INTO V1_EXAM_categorie_objet (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');



INSERT INTO V1_EXAM_objet (nom_objet, id_categorie, id_membre) VALUES
('Peigne', 1, 1), ('Rasoir', 1, 1), ('Marteau', 2, 1), ('Tournevis', 2, 1),
('Clé à molette', 3, 1), ('Pompe', 3, 1), ('Poêle', 4, 1), ('Mixeur', 4, 1),
('Crème', 1, 1), ('Fard à paupière', 1, 1);


INSERT INTO V1_EXAM_objet (nom_objet, id_categorie, id_membre) VALUES
('Scie', 2, 2), ('Pince', 2, 2), ('Compresseur', 3, 2), ('Crics', 3, 2),
('Four', 4, 2), ('Marmite', 4, 2), ('Gel cheveux', 1, 2), ('Parfum', 1, 2),
('Casserole', 4, 2), ('Batteur', 4, 2);


INSERT INTO V1_EXAM_objet (nom_objet, id_categorie, id_membre) VALUES
('Tournevis électrique', 2, 3), ('Perceuse', 2, 3), ('Chalumeau', 3, 3),
('Cric hydraulique', 3, 3), ('Blender', 4, 3), ('Couteau', 4, 3),
('Fond de teint', 1, 3), ('Lisseur', 1, 3), ('Rouleau peinture', 2, 3),
('Moulin à café', 4, 3);


INSERT INTO V1_EXAM_objet (nom_objet, id_categorie, id_membre) VALUES
('Trousse maquillage', 1, 4), ('Épilateur', 1, 4), ('Tournevis plat', 2, 4),
('Clé Allen', 2, 4), ('Filtre huile', 3, 4), ('Bouchon radiateur', 3, 4),
('Micro-ondes', 4, 4), ('Grille-pain', 4, 4), ('Spatule', 4, 4),
('Rouge à lèvres', 1, 4);



INSERT INTO V1_EXAM_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),
(5, 3, '2025-07-02', NULL),
(8, 4, '2025-07-03', '2025-07-12'),
(12, 1, '2025-07-04', NULL),
(15, 3, '2025-07-05', '2025-07-15'),
(20, 1, '2025-07-06', '2025-07-16'),
(25, 2, '2025-07-07', NULL),
(30, 4, '2025-07-08', NULL),
(35, 1, '2025-07-09', NULL),
(40, 2, '2025-07-10', '2025-07-18');

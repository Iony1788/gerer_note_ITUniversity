



insert into semestre(semestre)values('S1');
insert into semestre(semestre)values('S2');
insert into semestre(semestre)values('S3');
insert into semestre(semestre)values('S4');
insert into semestre(semestre)values('S5');
insert into semestre(semestre)values('S6');







INSERT INTO matiere (code_matiere,nom_matiere,credit) VALUES
('INF101', 'Programmation procedurale', 7),
('INF104', 'HTML et Introduction au Web', 5),
('INF107', 'Informatique de Base', 4),
('MTH101', 'Arithmetique et nombres', 4),
('MTH102', 'Analyse mathematique', 6),
('ORG101', 'Techniques de communication', 4),
('INF102', 'Bases de donnees relationnelles', 5),
('INF103', 'Bases de ladministration systeme', 5),
('INF105', 'Maintenance materiel et logiciel', 4),
('INF106', 'Complements de programmation', 6),
('MTH103', 'Calcul Vectoriel et Matriciel', 6),
('MTH105', 'Probabilite et Statistique', 4),
('INF201', 'Programmation orientee objet', 6),
('INF202', 'Bases de donnees objets', 6),
('INF203', 'Programmation systeme', 4),
('INF208', 'Reseaux informatiques', 6),
('MTH201', 'Methodes numeriques', 4),
('ORG201', 'Bases de gestion', 4),
('INF204', 'Systeme dinformation geographique', 6),
('INF205', 'Systeme dinformation', 6),
('INF206', 'Interface HommeMachine', 6),
('INF207', 'Elements dalgorithmique', 6),
('INF210', 'Mini-projet de developpement', 10),
('MTH204', 'Geometrie', 4),
('MTH205', 'Equations differentielles', 4),
('MTH206', 'Optimisation', 4),
('MTH203', 'MAO', 4),
('INF301', 'Architecture logicielle', 6),
('INF304', 'Developpement pour mobiles', 6),
('INF307', 'Conception en modele oriente objet', 6),
('ORG301', 'Gestion dentreprise', 5),
('ORG302', 'Gestion de projets', 4),
('ORG303', 'Anglais pour les affaires', 3),
('INF310', 'Codage', 4),
('INF313', 'Programmation avancee, frameworks', 6),
('INF302', 'Technologies dacces aux reseaux', 6),
('INF303', 'Multimedia', 6),
('INF316', 'Projet de developpement', 10),
('ORG304', 'Communication dentreprise', 4);

INSERT INTO matiereoption (id_semestre,id_matiere, groupe) VALUES
(1, 1, -1), -- INF101: Programmation procedurale
(1, 2, -1), -- INF104: HTML et Introduction au Web
(1, 3, -1), -- INF107: Informatique de Base
(1, 4, -1), -- MTH101: Arithmetique et nombres
(1, 5, -1), -- MTH102: Analyse mathematique
(1, 6, -1), -- ORG101: Techniques de communication
(2, 7, -1), -- INF102: Bases de donnees relationnelles
(2, 8, -1), -- INF103: Bases de ladministration systeme
(2, 9, -1), -- INF105: Maintenance materiel et logiciel
(2, 10, -1), -- INF106: Complements de programmation
(2, 11, -1), -- MTH103: Calcul Vectoriel et Matriciel
(2, 12, -1), -- MTH105: Probabilite et Statistique
(3, 13, -1), -- INF201: Programmation orientee objet
(3, 14, -1), -- INF202: Bases de donnees objets
(3, 15, -1), -- INF203: Programmation systeme
(3, 16, -1), -- INF208: Reseaux informatiques
(3, 17, -1), -- MTH201: Methodes numeriques
(3, 18, -1), -- ORG201: Bases de gestion
(4, 19, 1), -- INF204: Systeme dinformation geographique
(4, 20, 1), -- INF205: Systeme dinformation
(4, 21, 1), -- INF206: Interface HommeMachine
(4, 22, -1), -- INF207: Elements dalgorithmique
(4, 23, -1), -- INF210: Mini-projet de developpement
(4, 24, 2), -- MTH204: Geometrie
(4, 25, 2), -- MTH205: Equations differentielles
(4, 26, 2), -- MTH206: Optimisation
(4, 27, -1), -- MTH203: MAO
(5, 28, -1), -- INF301: Architecture logicielle
(5, 29, -1), -- INF304: Developpement pour mobiles
(5, 30, -1), -- INF307: Conception en modele oriente objet
(5, 31, -1), -- ORG301: Gestion dentreprise
(5, 32, -1), -- ORG302: Gestion de projets
(5, 33, -1), -- ORG303: Anglais pour les affaires
(6, 34, -1), -- INF310: Codage
(6, 35, -1), -- INF313: Programmation avancee, frameworks
(6, 36, 3), -- INF302: Technologies dacces aux reseaux
(6, 37, 3), -- INF303: Multimedia
(6, 38, -1), -- INF316: Projet de developpement
(6, 39, -1); -- ORG304: Communication dentreprise






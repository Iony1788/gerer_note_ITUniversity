create database note;

\c note;

CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(100)
);

INSERT INTO admin(email,password)
    VALUES('admin@gmail.com',1234);

CREATE TABLE promotion (
    id SERIAL PRIMARY KEY,
    nom_promotion VARCHAR(100)
);

CREATE TABLE semestre (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100)
);

CREATE TABLE etudiant (
    id SERIAL PRIMARY KEY,
    num_etu VARCHAR(100),
    nom VARCHAR(100),
    prenom VARCHAR(100),
    genre VARCHAR(100),
    date_naissance date,
    id_promotiom INT REFERENCES promotion(id)
);


CREATE TABLE matiere (
    id SERIAL PRIMARY KEY,
    code_matiere VARCHAR(100),
    nom_matiere VARCHAR(250),
    credit INTEGER
);

CREATE TABLE matiereOption (
    id SERIAL PRIMARY KEY,
    groupe int,
    id_semestre INT REFERENCES semestre(id),
    id_matiere INT REFERENCES matiere(id)
);


CREATE TABLE note (
    id SERIAL PRIMARY KEY,
    note numeric,
    id_etudiant INT REFERENCES etudiant(id),
    id_matiere INT REFERENCES matiere(id)
);



CREATE TABLE config(
    id SERIAL PRIMARY KEY,
    code VARCHAR(20),
    config VARCHAR(100),
    valeur double precision
);







-- TSY FAFANA NY TABLE ADMIN,SEMESTRE,MATIERE,MATIEREOPRION 












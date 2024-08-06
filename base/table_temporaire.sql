CREATE TABLE import_config(
    id SERIAL PRIMARY KEY,
    code VARCHAR(20),
    config VARCHAR(100),
    valeur INTEGER
);

CREATE table import_note(
     id SERIAL PRIMARY KEY,
     numetu VARCHAR(100),
     nom VARCHAR(100),
     prenom VARCHAR(100),
     genre VARCHAR(100),
     datenaissance date,
     promotion VARCHAR(20),
     codematiere VARCHAR(100),
     semestre VARCHAR(20),
     note decimal
);

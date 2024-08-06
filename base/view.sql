-- liste etudiants
CREATE view v_liste_etudiant as
select 
    e.id,
    e.id_promotiom,
    e.num_etu,
    e.nom,
    e.prenom,
    e.date_naissance,
    e.genre,
    p.nom_promotion
from 
    etudiant e
join 
    promotion p on e.id_promotiom = p.id;



-- maka max note
CREATE view v_note_max as 
SELECT 
   id_etudiant,
   id_matiere,
   max(note) as note
FROM 
    note 
group by 
    id_etudiant,id_matiere;

    

-- maka liste matiere miaraka amin ny par defaut sy  manala matiere redoublant par note max
CREATE view v_releve_etudiant as
WITH distinct_max_notes  AS (
select 
   e.id as id_etudiant,
   m.id as id_matiere,
   0 as note
from 
    etudiant e
cross join 
    matiere m
)
SELECT 
  dmn.id_etudiant as id_etudiant,
  dmn.id_matiere as id_matiere,
  s.id as id_semestre,
  e.num_etu,
   m.code_matiere,
   m.nom_matiere,
   m.credit,
   mo.groupe,
   
        
    CASE WHEN
        vm.note is null THEN dmn.note
        ELSE vm.note 

    END as note   
FROM 
    v_note_max vm 
FULL OUTER JOIN 
    distinct_max_notes dmn on dmn.id_etudiant = vm.id_etudiant and  dmn.id_matiere = vm.id_matiere
JOIN 
    etudiant e on dmn.id_etudiant = e.id
JOIN 
    matiere m on dmn.id_matiere = m.id
JOIN 
    matiereOption mo on m.id = mo.id_matiere
JOIN 
    semestre s on mo.id_semestre = s.id;





-- getMatiere optionnelle  
CREATE VIEW v_get_matiere_option AS
WITH distinct_max_notes AS (
    SELECT DISTINCT ON (id_etudiant, id_semestre, groupe)
        id_etudiant,
        id_matiere,
        id_semestre,
        groupe,
        num_etu,
        code_matiere,
        nom_matiere,
        credit,
        note 
    FROM 
        v_releve_etudiant
    WHERE 
        groupe <> -1
    ORDER BY
        id_etudiant,
        id_semestre,
        groupe,
        note DESC
)
SELECT 
    v.id_etudiant,
    v.groupe,
    v.id_matiere,
    v.num_etu,
    v.id_semestre AS id_semestre,  
    v.code_matiere,
    v.nom_matiere,
    
    CASE 
        WHEN v.note >= 10 THEN v.credit
        ELSE 0
    END AS credit_obtenu,
    v.credit,
    v.note
FROM 
    distinct_max_notes dmn
RIGHT JOIN 
    v_releve_etudiant v 
    ON dmn.num_etu = v.num_etu 
    AND dmn.id_semestre = v.id_semestre 
    AND dmn.id_matiere = v.id_matiere
WHERE 
    v.id_matiere = dmn.id_matiere OR v.groupe = -1
ORDER BY
    v.id_etudiant,
    v.id_semestre,
    v.groupe,
    v.id_matiere;

































-- a)
SELECT * 
FROM film f
WHERE 1 = f.id_film;

-- b)
SELECT *
FROM film f
WHERE f.duree > 135
ORDER BY duree DESC;

-- c)
SELECT titre, annee_sortie_fr
FROM film f
WHERE f.id_realisateur = 1;

-- d)
SELECT COUNT(titre) AS count_titre, libelle
FROM film f, genre g, genre_film gf
WHERE f.id_film = gf.id_film
AND g.id_genre = gf.id_genre
GROUP BY libelle
ORDER BY count_titre DESC;

-- e)
SELECT COUNT(titre) AS count_titre, nom, prenom
FROM film f, personne p, realisateur r
WHERE f.id_realisateur = r.id_realisateur
AND p.id_personne = r.id_personne
GROUP BY nom, prenom
ORDER BY count_titre DESC;

-- f)
SELECT nom, prenom, sexe
FROM personne p,film f, casting c, acteur a
WHERE f.id_film = c.id_film
AND p.id_personne = a.id_personne
AND a.id_acteur = c.id_acteur
AND f.id_film = 4;

-- g)
SELECT libelle, annee_sortie_fr
FROM film f, role r, casting c
WHERE f.id_film = c.id_film
AND r.id_role = c.id_role
AND 2 = id_acteur
ORDER BY annee_sortie_fr DESC;

-- h)
SELECT nom, prenom
FROM personne p, realisateur r, acteur a
WHERE r.id_personne = p .id_personne
AND a.id_personne = p.id_personne;

-- i)
SELECT titre, annee_sortie_fr
FROM film f
WHERE annee_sortie_fr > "2017-07-20"
ORDER BY annee_sortie_fr DESC;

-- j)
SELECT COUNT(sexe), sexe
FROM personne p, acteur a
WHERE p.id_personne = a.id_personne
GROUP BY sexe;

-- k)
SELECT nom, prenom
FROM personne p, acteur a
WHERE p.id_personne = a.id_personne
AND "1973-07-20" > date_naissance;

-- l)
SELECT nom, prenom
FROM personne p, acteur a, casting c
WHERE p.id_personne = a.id_personne
AND a.id_acteur = c.id_acteur
GROUP BY nom, prenom
HAVING COUNT(a.id_acteur) = 3;
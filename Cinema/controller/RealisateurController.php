<?php

class RealisateurController 
{
    public function listRealisateur(){
        $dao = new DAO();

        $sql = "SELECT id_realisateur, nom, prenom, picture
        FROM realisateur r,personne p
        WHERE r.id_personne = p.id_personne
        ORDER BY nom ASC;";

        $realisateursList = $dao->executeRequest($sql);

        require("view/realisateur/realisateur.php");
    }

    public function detailRea(){
        $dao = new DAO();

        $sql = "SELECT nom, prenom, DATE_FORMAT(date_naissance, '%d %M %Y') date_naissance, sexe, r.picture, r.id_realisateur, COUNT(f.id_film) nbFilm, p.id_personne
        FROM personne p, realisateur r, film f
        WHERE p.id_personne = r.id_personne
        AND r.id_realisateur = f.id_realisateur
        GROUP BY r.id_realisateur;";

        $sql2 = "SELECT titre, f.picture, f.id_film, r.id_realisateur,TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, ROUND(note, 1) AS note_1
        FROM film f, realisateur r
        WHERE r.id_realisateur = f.id_realisateur;";

        $infoReas = $dao->executeRequest($sql);
        $filmReas = $dao->executeRequest($sql2);
        require("view/realisateur/detailRealisateur.php");
    }

    public function modifyReaOrActor($id){
        $dao = new DAO();

        $sql = "SELECT nom, prenom, date_naissance, sexe, p.id_personne
        FROM personne p";


        $modifyActeurs = $dao->executeRequest($sql);

        $selectionRole = isset($_POST['select_roleModifyActeur']);
        if(isset($_POST['modify'])){
            switch($_POST['modify']){
                case "modify":
                    case "modify":
                        if(isset($_POST['nomModifyActor']) && isset($_POST['prenomModifyActor']) && isset($_POST['sexeModifyActor']) && isset($_POST['ageModifyActor']) && isset($_POST['pictureActor'])){
                            $sql2 = "UPDATE personne p
                            SET nom='".$_POST['nomModifyActor']."', prenom='".$_POST['prenomModifyActor']."',sexe='".$_POST['sexeModifyActor']."',date_naissance = '".$_POST['ageModifyActor']."'
                            WHERE p.id_personne = ".$id.";";

                            $sql3 = "UPDATE acteur a
                            SET picture='public/img/".$_POST['pictureActor']."'
                            WHERE ".$id." = a.id_personne;";

                            $sql4 = "UPDATE realisateur r
                            SET picture='public/img/".$_POST['pictureActor']."'
                            WHERE ".$id." = r.id_personne;";
                
                            $dao->executeRequest($sql2);
                            $dao->executeRequest($sql3);
                            $dao->executeRequest($sql4);
                        }
                    break;
                case "remove":
                    $utiSup = "Personne Supprimer";
                    $dateSup = "0001-01-01";
                    $sqlDel = "UPDATE personne p
                    SET nom='".$utiSup."',prenom=NULL,sexe='".$utiSup."',date_naissance = '".$dateSup."'
                    WHERE p.id_personne = ".$id.";";

                    $addPictureA = "public/img/No_image_available.svg.png";
                    
                    $sqlAddActeur = "UPDATE acteur SET picture='".$addPictureA."'
                    WHERE id_personne=".$id.";";
                    $dao->executeRequest($sqlAddActeur);

                    $sqlAddRea = "UPDATE realisateur SET picture='".$addPictureA."'
                    WHERE id_personne=".$id.";";
                    $dao->executeRequest($sqlAddRea);
                

                    $dao->executeRequest($sqlDel);
                    break;
            }

        }

        require("view/realisateur/modifyReaOrActor.php");
    }
}
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

    public function detailRea($id){
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
                    if($selectionRole){
                        if(isset($_POST['nomModifyActor']) && isset($_POST['prenomModifyActor']) && isset($_POST['sexeModifyActor']) && isset($_POST['ageModifyActor']) && isset($_POST['pictureActor'])){
                            $sql2 = "UPDATE personne p
                            SET nom='".$_POST['nomModifyActor']."', prenom='".$_POST['prenomModifyActor']."',sexe='".$_POST['sexeModifyActor']."',date_naissance = '".$_POST['ageModifyActor']."'
                            WHERE p.id_personne = ".$id.";"; 
            
                            $dao->executeRequest($sql2);
                            if($_POST['select_roleModifyActeur'] == "realisateur"){
            
            
                                $sql3 = "SELECT a.id_acteur, p.id_personne
                                FROM acteur a, personne p
                                WHERE a.id_personne = ".$id."";
            
                                $getActors = $dao->executeRequest($sql3);
                                while($getActor = $getActors ->fetch()){
                                    $sqlActorDel = "DELETE FROM acteur
                                    WHERE id_personne = ".$id.";";
                                    
                                    $sqlActorDel2 ="DELETE FROM casting
                                    WHERE id_acteur = ".$getActor['id_acteur'].";";
                
                                    $sqlActor = "INSERT INTO realisateur VALUES(NULL, ".$id.",'public/img/".$_POST['pictureActor']."')";
                                    $dao->executeRequest($sqlActorDel2);
                                    $dao->executeRequest($sqlActorDel);
                                    $dao->executeRequest($sqlActor);
                                }
            
            
                            }
                            if($_POST['select_roleModifyActeur'] == "acteur"){
                                $sqlReaDel = "DELETE FROM realisateur
                                WHERE id_personne = ".$id.";";
                        
                                $sqlRealisateur = "INSERT INTO acteur VALUES(NULL, ".$id.",'public/img/".$_POST['pictureActor']."')";
            
                                $dao->executeRequest($sqlRealisateur);
                            }
                        }
                    }
                    break;
                case "remove":
                    
                    break;
            }

        }

        require("view/realisateur/modifyReaOrActor.php");
    }
}
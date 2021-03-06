<?php
    
    class Controllers{
       

        public function enregVoit(){
            self::loadView("enregistrementVoiture.php");

            if(isset($_POST['btnE'])){
                require_once('Models/Database.class.php');
                $bd = new Database();
                Database::init("localhost","stage","root","");

                
                    if($_POST['marque']!="" && $_POST['matricule']!="" && $_POST['place']!="" && $_POST['couleur']!="" && $_POST['proprietaire']!=""){
                        $marque = htmlspecialchars(trim($_POST['marque']));
                        $matricule = htmlspecialchars(trim($_POST['matricule'])) ;
                        $place = htmlspecialchars(trim($_POST['place']));
                        $couleur = htmlspecialchars(trim($_POST['couleur'])) ;
                        $proprietaire = htmlspecialchars(trim($_POST['proprietaire']));
                    }
                    $tab = $db  ->selectSP()
                                ->from("voiture")
                                ->where("matricule","=")
                                ->execute([$matricule]);
                    if(count($tab)>0){
                        echo "Erreur ! le numéro est pris. Veillez choisir un autre.";
                    }else{
                        $bd->insert("voiture")
                    ->parametters(["matricule","marque","place","couleur","id_personne"])
                    ->execute([$matricule,$marque,$place,$couleur,$proprietaire]);
                    }   
            }
        }
        public function enregProp(){
            self::loadView("enregistrementProprio.php");
            require_once('Models/Database.class.php');
            if(isset($_POST['btnS'])){
                $bd = new Database();
                Database::init("localhost","stage","root","");
                if($_POST['nom']!="" && $_POST['prenom']!="" && $_POST['adresse']!=""){
                    $nom = htmlspecialchars(trim(strtoupper($_POST['nom'])));
                    $prenom = ucwords(htmlspecialchars(trim($_POST['prenom']))) ;
                    $adresse = htmlspecialchars(trim($_POST['adresse']));
                
                $bd->insert("personne")
                   ->parametters(["nom","prenom","adresse"])
                   ->execute([$nom,$prenom,$adresse]);
                }else{
                    echo "Veillez remplir tous les champs";
                }        
            }
        }
        public function affichage(){
            self::loadView("affichage.php");
        }
        public function sauverP(){
            
                if(isset($_POST['btnSauver'])){
                    echo"commande réussie!";
                    $nom = htmlspecialchars(trim(strtoupper($_POST['nom'])));
                    $prenom = ucwords(htmlspecialchars(trim($_POST['prenom']))) ;
                    $adresse = htmlspecialchars(trim($_POST['adresse']));
                    $idP = htmlspecialchars(trim($_POST['id']));
                    // echo $idP.$nom.$adresse.$prenom;
                require_once('Models/Database.class.php');
                Database::init("localhost","stage","root","");
                    $db = new Database();
                               $db  ->update("personne")
                                    -> set(["nom","prenom","adresse"])
                                    ->where("id","=")
                                    ->execute([$nom,$prenom,$adresse,$idP]);

                        // echo json_encode("commande reussie!") ;     
                    
                }else{
                    echo "<h1>Veillez remplir tous les champs</h1>";
                }        
            
        }
        public function sauverV(){
            
            if(isset($_POST['btnSauverV'])){
                // echo 'commande réussie';
                $id = $_POST['id'];
                $marque = htmlspecialchars(trim($_POST['marque'])) ;
                $matricule = htmlspecialchars(trim($_POST['matricule']));
                $place = htmlspecialchars(trim($_POST['place']));
                $couleur = htmlspecialchars(trim($_POST['couleur']));
                $proprietaire = htmlspecialchars(trim($_POST['proprietaire']));

            //    echo json_encode($id.$marque.$matricule.$place.$couleur.$proprietaire) ;

            require_once('Models/Database.class.php');
            Database::init("localhost","stage","root","");
                $db = new Database();
                           $db  ->update("voiture")
                                // ->paramettersNV(["matricule","marque","place","couleur","id_personne"])
                                ->set(["matricule","marque","place","couleur","id_personne"])
                                ->where("id","=")
                                // ->getQuery();
                                ->execute([$matricule,$marque,$place,$couleur,$proprietaire,$id]);


                    // echo json_encode("commande reussie!") ;     
                
            }
            // else{
            // //     echo "<h1>Veillez remplir tous les champs</h1>";
            // }        
        
    }

        public function modifierV(){
            self::loadView("modifier.php");
        }
        public function modifierPers(){
            self::loadView("modifierPers.php");
        }
        public static function loadView($page){
            include("Views/".$page);
        }
    }
    
    
?>
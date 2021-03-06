<?php
// include_once ('Models/voiture.class.php');
// include_once ('Models/proprietaire.class.php');
// include_once ('Controls/control.php');
// include_once ('Views/enregistrementProprio.php');
// include_once ('Views/enregistrementVoiture.php');
// session_start();
// $matricule=htmlspecialchars(trim($_POST['matricule']));
// $_SESSION['user']=$matricule;
// 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
    <link rel="stylesheet" href="Publics/css/style.css">
    <link rel="stylesheet" href="Publics/css/bootstrap.css">
    <link rel="stylesheet" href="Publics/css/font-awesome.css">
    <link rel="stylesheet" href="Publics/css/util.css">

</head>
<body>
 
    
<div class="container-fluid" >
    <div class="container hide" id="formP">

        <form class="form-horizontal" method="POST" action="sauverP">

            <h2  class="centre titre2"> Modification du proprietaire de la voiture</h2>
            <div class="form-group">
                <label class="control-label " for="nom">NOM:</label>

                    <input type="text" class="form-control" id="nomP" placeholder="Nom du proprietaire" name="nom" value="">

            </div>

            <div class="form-group">
                <label class="control-label " for="prenom">PRENOM:</label>

                    <input type="text" class="form-control" id="prenomP" placeholder="Prenom du proprietaire" name="prenom" value="">

            </div>

            <div class="form-group">

                    <input type="text" class="form-control" id="idP" name="id" value="">

            </div>

            <div class="form-group">
                <label class="control-label " for="adresee">Adresse:</label>

                    <input type="text" class="form-control" id="adresseP" placeholder="Enter l' adresse" name="adresse" value="">

            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2">
                <button id="btnSauver" name="btnSauver" class="btn btn-success" value="Sauvegarder">Sauver</button>
                </div>
            </div>

        </form>
    </div>
                            <!--------------------------FIN Personne-------------------------->
    <div class="container formV hide">
        <form class="form-horizontal" method="POST" action="sauverV">
            <h2 class="centre titre2">Enregistrement de la voiture</h2>

            <div class="form-group">
                <label class="control-label " for="id">id:</label>        
                    <input type="text" class="form-control" id="idVoit" placeholder="Entrer la marque de la voiture" name="id" value="">
            </div>
            <div class="form-group">
                <label class="control-label " for="marque">Marque:</label>        
                    <input type="text" class="form-control" id="marqueVoit" placeholder="Entrer la marque de la voiture" name="marque" value="">
            </div>

            <div class="form-group">
                <label class="control-label" for="matricule">Matricule:</label>         
                    <input type="text" class="form-control" id="matriculeVoit" placeholder="Entrer le matricule" name="matricule" value="">
            </div>

            <div class="form-group">
                <label class="control-label" for="matricule">Couleur:</label>        
                <input type="text" class="form-control" id="couleurVoit" placeholder="Entrer le couleur" name="couleur" value="">             
            </div>

            <div class="form-group">
                <label class="control-label" for="place">Nombre de place:</label>        
                <input type="text" class="form-control" id="placeVoit" placeholder="Entrer le nombre de places" name="place" value="">             
            </div>

            <?php  
                $connexion = new PDO ("mysql:host=localhost;dbname=stage","root","");
                    $sql="SELECT id FROM personne  ";         
                    $stmt = $connexion -> prepare($sql);
                    $stmt -> execute();
                    $i=0;
                    $x=0;
                    while($tab= $stmt->fetch(PDO::FETCH_ASSOC)){
                            $x= $tab['id'];
                            // echo $table."<br>"; 
                            $table[$i]=$x;                       
                            $i++;                       
                    }                  
                    
                    $sql1="SELECT nom FROM personne  ";         
                    $stm = $connexion -> prepare($sql1);
                    $stm -> execute();
                    $j=0;
                    $y=0;
                    while($tab1= $stm->fetch(PDO::FETCH_ASSOC)){
                            $y= $tab1['nom'];
                            // echo $table."<br>"; 
                            $table1[$j]=$y;                       
                            $j++;                       
                    }                  
            ?>
                <p>
                    <label for="proprietaire">Proprietaire</label><br />
                    <select name="proprietaire" id="proprietaireVoit">

                    <?php   for($i=0;$i<count($table);$i++){ ?>                   
                            <option value="<?php echo $table[$i]; ?>"><?php echo $table[$i].' : '.$table1[$i]; ?></option>
                            <?php }  ?>
                    </select>
                </p>

                    <div class="form-group">  
                        <div class="row">      
                            <div class="col-sm-offset-2 col-sm-2">
                                <button  name="btnSauverV" class="btn btn-warning" id="sauverV" value="Sauver">Sauver</button>
                            </div>
                        </div>
                    </div>
        </form>  
    </div>

    <!---------------------FIN VOITURE----------------->
    <div class="row tab">
        <div class="col-md-5  ">

            <table class="m-t-100 table   ">
                            <tr>
                                <td>ID</td>
                                <td>NOM</td>
                                <td>PRENOM</td>
                                <td>ADRESSE</td>
                                <td>ACTION</td>
                                <!-- <td>MARQUE</td>
                                <td>MATRICULE</td>
                                <td>NOMBRE DE PLACE</td>
                                <td>COULEUR</td> -->
                            </tr>
                        <?php  
                            require_once ("Controls/Controllers.class.php");
                            require_once ("Models/Database.class.php");

                                $db = new Database();
                                Database::init("localhost","stage","root","");
                                $table= $db ->selectSP()
                                            ->from("personne")
                                            ->order("id")
                                            ->executeSP();
                                for($i=0;$i<count($table);$i++){         
                                                
                                    echo "<tr>
                                            <td>".$table[$i]->id."</td>
                                            <td>".$table[$i]->nom."</td>
                                            <td>".$table[$i]->prenom."</td>
                                            <td>".$table[$i]->adresse."</td>
                                            <td>
                                            <a href='affichage' id='effacer' onclick='effacer(".$table[$i]->id.")'>effacer </a>
                                            <a href='#' id='modifierP' onclick='modifierP(".$table[$i]->id.")'>Modifier</a>
                                            </td>

                                         </tr>
                                        "; 
                                }
                        ?>    
            </table> 
            <a href="enregProp" class="btn btn-info ajouter">Ajouter</a>
        </div>


                                        <!---------------------FIN TABLE PERSONNE----------------->
        <div class="col-md-7 tab">
                <table  class="m-t-100 table ">
                        <tr>
                            <!-- <td>NOM</td>
                            <td>PRENOM</td>-->
                            <td>id</td> 
                            <td>MARQUE</td>
                            <td>MATRICULE</td>
                            <td>NOMBRE DE PLACE</td>
                            <td>COULEUR</td>
                            <td>ID_PROPRIETAIRE</td>
                            <td>ACTION</td>
                        </tr>          
                    <?php  
                            $tab= $db ->selectSP()
                            ->from("voiture")
                            ->order("id")
                            ->executeSP();
                        for($i=0;$i<count($tab);$i++){         
                                
                    echo "<tr>
                            <td>".$tab[$i]->id."</td>
                            <td>".$tab[$i]->marque."</td>
                            <td>".$tab[$i]->matricule."</td>
                            <td>".$tab[$i]->place."</td>
                            <td>".$tab[$i]->couleur."</td>
                            <td>".$tab[$i]->id_personne."</td>
                            <td>
                            <a href='affichage' id='supprimer' onclick='supprimer(".$tab[$i]->id.")'>Effacer</a>
                            <a href='#' id='modVoit' onclick='modifierVoiture(".$tab[$i]->id.")'>Modifier</a>
                            </td>

                        </tr>
                        "; 
                }
                    ?>
                </table> 
                <a href="enregVoit" class="btn btn-info ajouter ">Ajouter</a>
        </div>
    </div> 

                             <!---------------------FIN TABLE VOITURE----------------->

    <div class="col-md-10 col-md-offset-1 tab">
        
        <table class="m-t-100 table ">             
                        <tr>
                            <td>NOM</td>
                            <td>PRENOM</td>
                            <td>ADRESSE</td>
                            <td>MARQUE</td>
                            <td>MATRICULE</td>
                            <td>NOMBRE DE PLACE</td>
                            <td>COULEUR</td>
                            <td>ID_PROPRIETAIRE</td>
                        </tr>

                    <?php  


                    $connexion = new PDO ("mysql:host=localhost;dbname=stage","root","");
                        $sql="SELECT * FROM voiture AS v INNER JOIN personne AS p ON p.id= v.id_personne";         
                        $stmt1 = $connexion -> prepare($sql);
                        $stmt1 -> execute();
                        $table=[];
                        $i=0;
                            while($x= $stmt1->fetch(PDO::FETCH_ASSOC)){
                                $table=$x;
                                $i++;
                            }
                                echo "
                                    <tr>                      
                                        <td> ".$table['nom']."</td>
                                        <td> ".$table['prenom']."</td>
                                        <td> ".$table['adresse']."</td>
                                        <td> ".$table['marque']."</td>
                                        <td> ".$table['matricule']."</td>
                                        <td> ".$table['place']."</td>
                                        <td> ".$table['couleur']."</td>
                                        <td> ".$table['id_personne']."</td>
                                    </tr>
                                ";
                                // echo $table['nom'];
                            
                    ?>
        </table>
    </div>
        
</div> 
    <script src="Publics/js/jquery.js"></script>
    <script src="Publics/js/bootstrap.js"></script>
    <script src="Publics/js/main.js"></script>               
</body>

    
</html>               
           




<?php
// include_once ('Models/voiture.class.php');
// include_once ('Models/proprietaire.class.php');
// include_once ('Controls/control.php');
// include_once ('Views/enregistrementProprio.php');
// include_once ('Views/enregistrementVoiture.php');
// session_start();
// $matricule=htmlspecialchars(trim($_POST['matricule']));
// $_SESSION['user']=$matricule;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Publics/css/style.css">
    <link rel="stylesheet" href="Publics/css/bootstrap.css">
    <link rel="stylesheet" href="Publics/css/font-awesome.css">
    <link rel="stylesheet" href="Publics/css/util.css">

</head>
<body>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">

            <table class="m-t-100 table table-bordered">
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
                        $connexion = new PDO ("mysql:host=localhost;dbname=stage","root","");
                            $sql="SELECT * FROM personne  ";         
                            $stmt = $connexion -> prepare($sql);
                            $stmt -> execute();
                                while($table= $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "
                                        <tr>
                                            <td> ".$table['id']."</td>
                                            <td> ".$table['nom']."</td>
                                            <td> ".$table['prenom']."</td>
                                            <td> ".$table['adresse']."</td>
                                            <td>
                                            <a href='#' id='efface' onclick='effacer(".$table['id'].")' >Effacer</a>
                                            <a href='#' onclick='modifier(".$table['id'].")'>Modifier</a> 
                                        </td>
                                        </tr>
                                    ";
                                }
                        ?>
            </table> 

        </div>

         <!-- INNER JOIN voiture AS v WHERE p.id = v.id_personne 
        ,v.marque,v.matricule,v.place,v.couleur

        WHERE p.nom LIKE '%i%'

         onclick=' return confirm(\"Voulez-vous supprimer?\")'

        <td> ".$tab['marque']."</td>
                                <td> ".$tab['matricule']."</td>
                                <td> ".$tab['place']."</td>
                                <td> ".$tab['couleur']."</td>

                                <td> ".$tab['nom']."</td>
                                <td> ".$tab['prenom']."</td>
                                <td> ".$tab['adresse']."</td>
        -->
        <div class="col-md-7">
                <table  class="m-t-100 table table-bordered">
                        <tr>
                            <!-- <td>NOM</td>
                            <td>PRENOM</td>
                            <td>ADRESSE</td> -->
                            <td>MARQUE</td>
                            <td>MATRICULE</td>
                            <td>NOMBRE DE PLACE</td>
                            <td>COULEUR</td>
                            <td>ID_PROPRIETAIRE</td>
                            <td>ACTION</td>
                        </tr>          
                    <?php  
                    $connexion = new PDO ("mysql:host=localhost;dbname=stage","root","");
                        $sql="SELECT * FROM voiture ";         
                        $stmt = $connexion -> prepare($sql);
                        $stmt -> execute();
                            while($tab= $stmt->fetch(PDO::FETCH_ASSOC)){
                                echo "
                                    <tr> 
                                        <td> ".$tab['marque']."</td>
                                        <td> ".$tab['matricule']."</td>
                                        <td> ".$tab['place']."</td>
                                        <td> ".$tab['couleur']."</td>
                                        <td> ".$tab['id_personne']."</td>
                                        <td>
                                            <a href='' id='supprime' onclick='effacer(".$tab['matricule'].")'>Supprimer</a>
                                            <a href=' ?action=modif&matr=".$tab['matricule']."'>Modifier</a>
                                        </td>
                                    </tr>
                                ";
                            }
                    ?>
                </table> 
        </div>
    </div> 
    <div class="col-md-10 col-md-offset-1">
   
<table class="m-t-100 table table-bordered">             
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
            // $connexion = new PDO ("mysql:host=localhost;dbname=stage","root","");
            //     $sql="SELECT * FROM voiture AS v INNER JOIN personne AS p ON p.id= v.id_personne";         
            //     $stmt1 = $connexion -> prepare($sql);
            //     $stmt1 -> execute();
            //     $table=[];
            //     $i=0;
            //         while($x= $stmt1->fetch(PDO::FETCH_ASSOC)){
            //             $table=$x;
            //             $i++;
            //         }
            //             echo "
            //                 <tr>                      
            //                     <td> ".$table['nom']."</td>
            //                     <td> ".$table['prenom']."</td>
            //                     <td> ".$table['adresse']."</td>
            //                     <td> ".$table['marque']."</td>
            //                     <td> ".$table['matricule']."</td>
            //                     <td> ".$table['place']."</td>
            //                     <td> ".$table['couleur']."</td>
            //                     <td> ".$table['id_personne']."</td>
            //                 </tr>
            //             ";
                        // echo $table['nom'];
                    
            ?>
</table>
</div>
<!-- <table border="1">
                <tr>
                    <td>ID_PERSONNE</td>
                  
                   <td>MARQUE</td>
                    <td>MATRICULE</td>
                    <td>NOMBRE DE PLACE</td>
                    <td>COULEUR</td> 
                </tr>
</table>  -->
               
            
       
             
            <!-- $connexion = new PDO ("mysql:host=localhost;dbname=stage","root","");
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
                        echo $table[0]." "; -->
        
    </div> 
    <script src="Publics/js/jquery.js"></script>
    <script src="Publics/js/bootstrap.js"></script>
    <script src="Publics/js/main.js"></script>               
</body>

    
</html>               
           




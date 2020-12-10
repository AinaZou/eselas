<?php
// session_start();
include_once('Models/proprietaire.class.php');
include_once('Controls/ajax.php');
global $personne;
$personne = new Personne();
$id=$_GET['id'];

$nom="";
$prenom="";
$adresse="";

$personne->setid($id);
$tab=[];
$tab=$personne->selectPersonne();
$nom=$tab['nom'];
$prenom=$tab['prenom'];
$adresse=$tab['adresse'];



// $nom="";
// $prenom="";
// $adresse="";
// $tab=[];
// $tab=selectp();
// $nom=$tab['nom'];
// $prenom=$tab['prenom'];
// $adresse=$tab['adresse'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Publics/css/style.css">
    <link rel="stylesheet" href="./Publics/css/bootstrap.css">
    <link rel="stylesheet" href="./Publics/css/font-awesome.css">
</head>
<body>
<div class="container">
        <form class="form-horizontal" method="POST" action="?action=sauvP">
            
            <h2  class="centre titre2"> Modification du proprietaire de la voiture</h2>
            

            <div class="form-group">
                <label class="control-label " for="nom">NOM:</label>
            
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom;?>">
            
            </div>

            <div class="form-group">
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>">
            
            </div>

            <div class="form-group">
                <label class="control-label " for="prenom">PRENOM:</label>
                
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom;?>">
            
            </div>
            <div class="form-group">
                <label class="control-label " for="adresse">Adresse:</label>
                    
                    <input type="text" class="form-control" id="adresse"  name="adresse" value="<?php echo $adresse;?>">
                            
            </div>

            <div class="form-group">        
                <div class="col-sm-offset-5 col-sm-2">
                <input type="submit" name="btnSauv" class="btn btn-primary" value="Sauver">
                </div>
            </div>
        </form>
    
    </div>

<script src="./exo/Publics/js/jquery.js"></script>
<script src="./exo/Publics/js/bootstrap.js"></script>

</body>
</html>
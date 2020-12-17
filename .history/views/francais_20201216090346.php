<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>francais</title>
    <link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome4/css/font-awesome.css">
    <link rel="stylesheet" href="Publics/css/francais.css">
</head>
<body>
    <div class="container">
    
        <h2 class="text-center titre2">français</h2>
        <a href="deconnexion" name="btnDeco" id="btnDeco" class="btn btn-danger"  onclick="return confirm('Se deconnecter?')">Se deconnecter</a>
<?php
include_once('Models/Database.class.php');
$tab = $db  ->selectSP()
            ->from("professeurs")
            ->where("nom","=")
            ->et(["mdp"], ["="])
            ->execute([$_SESSION['user'],$_SESSION['pass']]);

            if(count($tab)>0){
                echo '<button name="b" id="b" class="btn btn-info">Publier</button>';
            }
echo $_SESSION['user'];
?>
        
        
        <form action="publierFr" method="POST" id="formFR" enctype="multipart/form-data" class="hide">
            <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
            <div class="form-group">
                <textarea name="contenu" id="contenu" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo">
            </div>
            <button name="btnP" id="btnP" class="btn btn-danger">Publier</button>
        </form>

        <?php
            include_once "Models/Database.class.php";
            include_once 'Controls/Controllers.class.php';
        ?>
        <div>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, labore. Beatae illo ducimus sint dolorem dolore sit nostrum magnam nesciunt?
            </p>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, labore. Beatae illo ducimus sint dolorem dolore sit nostrum magnam nesciunt?
            </p>
        </div>
        <?php
            $db = new Database();
            Database::init("localhost", "eselas", "root", "");

            $table = $db->selectSP()
                ->from("publication")
                ->order("id", "DESC")
                ->executeSP();

            // var_dump($table);exit;
            for($i=0;$i<count($table);$i++){
                // echo '<h2>'.$table[$i]->titre.'</h2><br><br>';
                // echo $table[$i]->contenu."<br>";
                // echo '<img src="Publics/images/"'.$table[$i]->photo .'>';
                echo '<id="idSectinAff" section class="clsectionAff container-fluid">
                    <table>
                        <tr  class="date">
                              <td class="text-muted date">'.$table[$i]->date.'</td>
                        </tr >
                        <tr  class="date">
                              <td class="date"> Titre: <h4 class="titre4">'.$table[$i]->titre.'</h4></td>
                        </tr>
                        <tr  class="date">
                            
                            <td class="date"><span class="contenu">'.$table[$i]->contenu.'</span></td>
                        </tr> 
                        <tr  class="date">
                            <td class="date">
                                <img src="Publics/images/'.$table[$i]->photo.'" alt="" class="img-fluid">
                            </td>
                        </tr>
                       
                    </table>
            </section>';

            }
            

        ?>
    </div>

    <script src="Publics/js/jquery.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
    <script src="Publics/js/francais.js"></script>
</body>
</html>
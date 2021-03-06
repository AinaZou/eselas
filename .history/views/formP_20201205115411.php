<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connecter</title>
  <link rel="stylesheet" href="Publics/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/css/font-awesome.min.css">
    <link rel="stylesheet" href="Publics/css/style.css">
</head>
<body>

<!-- add/edit form modal -->
  <div class="container">
      <form id="addform" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nom" class="col-form-label">NOM:</label>
            <input type="text" class="form-control" id="nom" name="nom" required="required">
          </div>
          <div class="form-group">
            <label for="prenom" class="col-form-label">PRENOM:</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
          </div>
          <div class="form-group">
            <label for="niveau" class="col-form-label">Niveau:</label>
            <input type="text" class="form-control" id="niveau" name="niveau" required="required">
          </div>
          <div class="form-group">
            <label for="num_inscription" class="col-form-label">NUMERO D'INSCRIPTION:</label>
            <input type="text" class="form-control" id="num_inscription" name="num_inscription" required="required">
          </div>
          <!-- <div class="form-group">
            <label for="message-text" class="col-form-label">Photo:</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-picture-o"
                    aria-hidden="true"></i></span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="photo" id="userphoto">
                <label class="custom-file-label" for="userphoto">Choose file</label>
              </div>
            </div>

          </div> -->

        </div> 
          <button name="btnConnecter" class="btn btn-success" id="btnConnecter">Connecter</button>
          <a href="inscrire" class="btn btn-primary connecter " id="inscrire">
               <i class="glyphicon glyphicon-log-in"></i> Log In 
          </a>
          <!-- <input type="hidden" name="action" value="adduser">
          <input type="hidden" name="userid" id="userid" value=""> -->
        </div>
      </form>
      </div>    
<!-- add/edit form modal end -->
<script src="Publics/js/jquery.js"></script>
<script src="Publics/js/bootstrap.js"></script>
 <script src="Publics/js/main.js"></script> 
 <script src="../Publics/js/main.js"></script> 
</body>
</html>

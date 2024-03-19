<?php
include_once('data_base.php');
$sql = 'SELECT * FROM `condidat`';
$sth = $cnx->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recrutement</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="profilR.css">
</head>
<body>
    <head>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Recrutement</a>
            
                <form class="d-flex">
                  <input class="form-control me-2 shadow-none" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline shadow-none" type="submit">Search</button>
                </form>
              
          
          
      <button class="btn shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><img src="per1.webp" class="user"></button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <button type="button" class="btn-close text-reset shadow-none " data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <a href="#" class="opt">parametre</a>
            <a href="annonce.php" class="opt">Créer un annonce</a>
          </div>
    </div>
    </div>

    </nav>
    </head>
    <main>
      <h2>Rechercher des CV</h2> 
        <div class="recherch">
            
          <fieldset>
            <legend> Choisir Domaine:</legend> 
            <div class="input">               
              <input type="radio" name="R1" value="Agriculture" />
              <label >Agriculture</label></div>  
              <div class="input">              
              <input type="radio" name="R1" value="tourisme" />
              <label >Tourisme </label>
              </div>
              <div class="input">              
                <input type="radio" name="R1" value="Technologie de l'information" />
                <label for="horns">Technologie de l'information</label>
                </div>
                <div class="input">              
                  <input type="radio" name="R1" value="Énergie renouvelable" />
                  <label>Énergie renouvelable</label>
                  </div>
                  <div class="input">              
                    <input type="radio" name="R1" value="Finance et services bancaires " />
                    <label>Finance et services bancaires</label>
                    </div>
          </fieldset>
              
            <fieldset>
                <legend> Choisir fonction:</legend> 
                <div class="input">                  
                <input type="radio" name="R2" value="Achat" class="R1"/>
                <label>Achat</label> </div> 
                <div class="input">            
                <input type="radio" name="R2"  value="Surveillance/Securite" class="R2"/>
                <label>Surveillance/Securite</label>
              </div>
              <div class="input">            
                <input type="radio" name="R2" value="Assistant" class="R2" />
                <label>Assistant</label>
              </div>
              <div class="input">            
                <input type="radio" name="R2" value="Chaufeur" class="R2"/>
                <label>Chaufeur</label>
              </div>
              <div class="input">            
                <input type="radio" name="R2"  value="Commercial" class="R2"/>
                <label>Commercial</label>
              </div>

            </fieldset>
            
            <fieldset>
              <legend> Choisir niveau d'études:</legend> 
              <div class="input">                  
                <input type="radio" name="R3" value="bac" />
                <label>Bac</label>  
                </div>
                <div class="input">           
                <input type="radio" name="R3"  name="bac+2" />
                <label>Bac+2</label>
              </div> 
              <div class="input">           
                <input type="radio" name="R3"  name="bac+3" />
                <label>Bac+3</label>
              </div>
              <div class="input">           
                <input type="radio" name="R3" name="bac+5" />
                <label>Bac+5</label>
              </div>  
            </fieldset>

        </div>
        <section class="cv">
            <ul id="cvList"> 
              <?php  
        foreach($result as $row){
        ?>
         </li>   
                <li class="cvItem"> 
                  <img src="image/utilisateur.png"> 
                  <h3 ><?=$row['nom']." ".$row['prenom']?></h3>
                  <div class="champ">
                    <strong id="strong">Domaine :</STRong>
                  <p class="domaine"><?=$row['domaine']?>
                  </p>
                </div>
                <div class="champ">
                  <strong id="strong">Fonction :</STRong>
                  <p class="fonction"><?=$row['fonction']?></p>
                </div>
                <div class="champ">
                  <strong id="strong">Formation :</STRong>
                  <p class="formation"><?php echo $row['formation']?></p>
                </div>

                  <a href="#">Voir CV</a> 
                  <a href="message.php?user=<?=$row['email']?>">Envoyer un message</a> 
              </li> 
        <?php }?> 
            </section>


    </main>
    <script src="profil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
</body>
</html>
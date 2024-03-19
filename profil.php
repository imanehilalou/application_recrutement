<!-- <?php
// include_once('data_base.php');
// $sql='select * from condidat';
// $sth=$cnx->query($sql);
// $result=$sth->fetchAll(PDO::FETCH_ASSOC);
// ?> -->
<?php 
  session_start();

  if (isset($_SESSION['email'])) {
  	include 'data_base.php';

  	include 'list.php';

  	$user = getUser($_SESSION['email'], $cnx);

  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi</title>
    <Link rel="stylesheet" href=profile.css>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
             <a href=""> home</a>
             
            </div>
            <div class="row">
                <div class="col-md-4 mt-1" >
                    <div class="card text-center  sidebar">
                    <div class="card-body"id="bing">
                    <img src="https://th.bing.com/th/id/OIP.de7plhRZ6Vqb6u14Dev9rwHaH0?rs=1&pid=ImgDetMain" class="round-circle" width="150">
                    <div class="mt-3 " >
                    <h3><?=$user['nom'] . " " . $user['prenom']?></h3>
                    <a href="offre.php"> Annonces </a>
                    <a href=""> Messagerie </a>
                    <a href="logout.php"> Signout</a>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card nb-3 content">
                        <h1 class="m-3  pt-3">
                            Information
                        </h1> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>nom
                                    </h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?=$user['nom']?>
                               </div>
                                <div class="col-md-3">
                                    <h5>prenom
                                    </h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?=$user['prenom']?>
                                </div>
                                
                            </div>
                            <HR>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5> Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                <?=$user['email']?>

                                </div>
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <h5>Telephone</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                            <?=$user['tel']?>
                            </div>
                            <div class ="row">
                                <div class="col-md-3">
                                <h5>Adress</h5>
                                </div>
                                <div class="col -md-9 text-secondary">
                                <?=$user['adress']?>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 content">
                            <h1 class="m-3"> Recent project</h1>
                            <div class="card-body">
                                <div class="col-md-3">
                                    <h5>Project Name</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    Project Description
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<?php }?>
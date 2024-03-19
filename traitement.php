<?php

// Connexion à la base de données
function sendemail_verifile($nom,$email,$verify_token) {
    

}  


if(isset($_POST["valid"])){
$nom_entreprise=$_POST['nom_entreprise'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$civilite=$_POST['civilite'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

// $verify_token= md5(rand());

require_once 'data_base.php';


$checkEmail = "SELECT * FROM `recruteur` where `email` ='$email';";
$checkEmailExecute = $cnx->query($checkEmail);
$checkEmailResult = $checkEmailExecute->fetchAll();
if(!empty($checkEmailResult)){
    
     echo '<script>alert("Email déjà utilisé")</script>';
    //  header("location: recruteur.php");
    
}

else{
    IF(!empty($nom_entreprise) || !empty($adresse) || !empty($ville)|| 
    !empty($pays) || !empty($civilite) || !empty($prenom) || !empty($nom) ||
    !empty($tel) ||!empty($email) || !empty($password) || !empty($confirm_password)){
    
    $sql10 = "INSERT INTO `recruteur`
    (`nom`,`prenom`,`email`,`password`,`tel`,`adress`,`civilite`,`nomEntreprise`,`domaine`,`pays`) VALUES
    ('$nom','$prenom','$email','$password','$tel','$adresse','$civilite','$nom_entreprise','NULL','$pays');";
    $sth = $cnx->query($sql10);

    if($sth){
        $sql1 = "SELECT id FROM `recruteur` where `email` = '$email';";
        $sth1 = $cnx->query($sql1);
        $result = $sth1->fetch();
        session_start();
        // cree email
        sendemail_verifile("$nom","$email","$verify_token"); 
        $_SESSION['id'] = "register successfull.!please verfiy your email adress";
        $_SESSION['id'] = $result["id"];
        $_SESSION["id"];
        
        header("location: login.php");
    }
    else{
        
        header("location: index.php");
    }
}
}
}


?>




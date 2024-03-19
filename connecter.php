<?php  
session_start();

   include 'data_base.php';
   
   $password = $_POST['password'];
   $email = $_POST['email'];
  
 
      $sql  = "SELECT * FROM 
               condidat WHERE email=?";
      $stmt = $cnx->prepare($sql);
      $stmt->execute([$email]);

      if($stmt->rowCount() === 1){

        $utilisateurs = $stmt->fetch();

     
        if ($utilisateurs['email'] === $email) {
           
          if ( $utilisateurs['password'] === $password ) {

            $_SESSION['email'] = $utilisateurs['email'];
            $_SESSION['nom'] = $utilisateurs['nom'];
            $_SESSION['id_condidat'] = $utilisateurs['id_condidat'];

            header("Location: profil.php");
          }
        }
    }
    else{
      $sql1  = "SELECT * FROM 
               recruteur WHERE email=?";
      $stmt1 = $cnx->prepare($sql1);
      $stmt1->execute([$email]);

      if($stmt1->rowCount() === 1){
        echo "hello";
        $utilisateurs = $stmt1->fetch();

        if ($utilisateurs['email'] === $email) {
           

          if ( $utilisateurs['password'] === $password) {

            $_SESSION['email'] = $utilisateurs['email'];
            $_SESSION['nom'] = $utilisateurs['nom'];
            $_SESSION['id'] = $utilisateurs['id'];

            header("Location: profilR.php");
          }
        }
      }
      else{
        echo"utilisateur introuvable";
    }
    }
    
         
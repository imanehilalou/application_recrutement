<?php  
session_start();

   include 'connexion.php';

   $password = $_POST['password'];
   $username = $_POST['username'];
   
 
      $sql  = "SELECT * FROM 
               utilisateurs WHERE Nom_utilisateur=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);

      if($stmt->rowCount() === 1){
        $utilisateurs = $stmt->fetch();

        if ($utilisateurs['Nom_utilisateur'] === $username) {
           
          if (password_verify($password, $utilisateurs['mot_de_passe'])) {

            $_SESSION['Nom_utilisateur'] = $utilisateurs['Nom_utilisateur'];
            $_SESSION['Nom'] = $utilisateurs['Nom'];
            $_SESSION['id_utilisateur'] = $utilisateurs['id_utilisateur'];


            header("Location: chat.php");
          }
        }
    }
    else{
        echo"utilisateur introuvable";
    }
         
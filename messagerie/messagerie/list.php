<?php
function getUser($username , $conn){
    $sql="SELECT * from utilisateurs
    where Nom_utilisateur =?";
    $stmt =$conn -> prepare($sql);
    $stmt -> execute ([$username]);
    if($stmt -> rowCount() ===1) {
        $utilisateur = $stmt -> fetch();
        return $utilisateur ;
    }
    else{
        $utilisateur = [];
        return $utilisateur ;
    }
}
?>
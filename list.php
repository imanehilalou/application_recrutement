<?php
function getUser($username , $cnx){
    $sql="SELECT * from condidat
    where email =?";
    $stmt =$cnx -> prepare($sql);
    $stmt -> execute ([$username]);
    if($stmt -> rowCount() ===1) {
        $utilisateur = $stmt -> fetch();
        return $utilisateur ;
    }
    else{
        $sql="SELECT * from recruteur
        where email =?";
        $stmt =$cnx -> prepare($sql);
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
    
}
?>
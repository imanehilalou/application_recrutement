<?php 

    
    function getConversation($user_id, $conn){
    
    $sql = "SELECT * FROM conversations
            WHERE utilisateur_1=? OR utilisateur_2=?
            ORDER BY id_conversation DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id, $user_id]);

    if($stmt->rowCount() > 0){
        $conversations = $stmt->fetchAll();

        $user_data = [];
        
        foreach($conversations as $conversation){
            if ($conversation['utilisateur_1'] == $user_id) {
            	$sql2  = "SELECT *
            	          FROM utilisateurs WHERE id_utilisateur=?";
            	$stmt2 = $conn->prepare($sql2);
            	$stmt2->execute([$conversation['utilisateur_2']]);
            }else {
            	$sql2  = "SELECT *
            	          FROM utilisateurs WHERE id_utilisateur=?";
            	$stmt2 = $conn->prepare($sql2);
            	$stmt2->execute([$conversation['utilisateur_1']]);
            }

            $allConversations = $stmt2->fetchAll();

            # pushing the data into the array 
            array_push($user_data, $allConversations[0]);
        }

        return $user_data;

    }else {
    	$conversations = [];
    	return $conversations;
    }  

}
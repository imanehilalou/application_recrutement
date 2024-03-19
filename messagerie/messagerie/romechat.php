<?php 

function getChats($id_1, $id_2, $conn){
   
   $sql = "SELECT * FROM chats
           WHERE (émetteur=? AND to_id=?)
           OR    (to_id=? AND émetteur=?)
           ORDER BY chat_id ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
    	$chats = $stmt->fetchAll();
    	return $chats;
    }else {
    	$chats = [];
    	return $chats;
    }

}
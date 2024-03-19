<?php 
  session_start();

  if (isset($_SESSION['Nom_utilisateur'])) {

  	include 'connexion.php';

  	include 'list.php';
     include 'romechat.php';

  	if (!isset($_GET['user'])) {
  		header("Location: chat.php");
  		exit;
  	}


  	$chatWith = getUser($_GET['user'], $conn);

  	if (empty($chatWith)) {
  		header("Location: chat.php");
  		exit;
  	}

  	$chats = getChats($_SESSION['id_utilisateur'], $chatWith['id_utilisateur'], $conn);
      
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity
    ="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>
<body class="d-flex
            justify-content-center
            align-items-center
            vh-100">
    <div class="w-400 shadow p-4 rounded">
        <a href="chat.php"
        class="fs-4 link dark">&#8592;</a>
        <div class="d-flex align-items-center">
             <img src="image/teacher-295387_1280.png" class="w-15 rounded-circle">
             <h3 class="display-4 fs-sm m-2"><?=$chatWith['Nom']?></h3>
        </div>
        <div class="shadow p-4 rounded
                    d-flex flex-column
                    mt-2  chat-box" id="chatBox">
              <?php if(!empty($chats)){ 
                foreach($chats as $chat){
                if($chat['émetteur'] == $_SESSION['id_utilisateur']){
                  ?>
                  <p class="rtext align-self-end
                  border rounded p-2 mb-1 ">
                  <?=$chat['message']?>
                  <small class="d-block"><?=$chat['created_at']?></small></p>
              <?php } else{
                 ?>
                 <p class="ltext border rounded p-2 mb-1">  <?=$chat['message']?>
                <small class="d-block"><?=$chat['created_at']?></small>  
                </p>
              <?php  }?>
           <?php }}
            else{ ?>
          <div class="alert alert-info text-center">
                <ion-icon name="chatbubbles-outline" class=" d-block  fs-big text-center"></ion-icon>
                <p>Aucun message pour le moment</p>
          <?php } ?>
        </div>

         

        <div class="input-group mb-3 bg-light">
             <textarea  cols="3" class="form-control" id="message"></textarea>
             <button class="btn btn-primary" id="sendBtn"><ion-icon name="send-outline"></ion-icon></button>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      console.log("hello");
      var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	     }
	scrollDown();
  $(document).ready(function(){
      
      $("#sendBtn").on('click', function() {
      	message = $("#message").val();
        if (message == "") return;

$.post("insert.php",
     {
       message: message,
       to_id: <?=$chatWith['id_utilisateur']?>
     },
     function(data, status){
          $("#message").val("");
          $("#chatBox").append(data);
          scrollDown();
     });
  })
      })
    </script>
</body>
</html>
<!-- <?php
  // }else{
  // 	header("Location: login.php");
  //  	exit;
  // } -->
  }?>
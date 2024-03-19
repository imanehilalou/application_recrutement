<?php 
  session_start();

  if (isset($_SESSION['Nom_utilisateur'])) {
  	include 'connexion.php';

  	include 'list.php';
    include 'conversation.php';

  	$user = getUser($_SESSION['Nom_utilisateur'], $conn);

  	$conversations= getConversation($user['id_utilisateur'], $conn);
  
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
    <div class="p-2 w-400 rounded shadow">
        <div class="d-flex
                    mb-3
                    p-3
                    bg-light
                    justify-content-between 
                    align-items-center">
         <div class="d-flex
                     align-items-center">
                     <img src="image/man-159847_1280.png" class="w-25 rounded-circle">
                     <h3 class="fs-xs m-2"><?=$user['Nom']?></h3>
                     <a href="logout.php">&#8592;</a>
         </div>
        </div>
        <div class="input-group mb-3">
    			<input type="text"
    			       placeholder="Search..."
    			       id="searchText"
    			       class="form-control">
    			<button class="btn btn-primary" 
    			        id="searchBtn">
    			        <i class="fa fa-search"></i>	
    			</button>       
    		</div>
        <ul
          id="chatList"
         class="list-group wvh-50 overflow-auto">
            <?php if(!empty($conversations)) { ?>
                <?php foreach($conversations as $conversation) { ?>
          <li class="list-group-item">
               <a href="message.php?user=<?=$conversation['Nom_utilisateur']?>" 
                                             class="d-flex
                                             justify-content-between 
                                             align-items-center p-2">
                                             
               <div class="d-flex
               justify-content
               align-items-center p-2" >
                  <img src="image/teacher-295387_1280.png" class="w-10 rounded-circle">
                   <h3 class="fs-xs m-2"><?=$conversation['Nom']?></h3>
               </div>
               
                </a>
           </li>
           <?php } ?>
           <?php } else{ ?>
                <div class="alert alert-info text-center">
                <ion-icon name="chatbubbles-outline" class=" d-block fs-big text-center"></ion-icon>
                <p>Aucun message pour le moment</p>
            </div>
            <?php } ?>
           </ul>

    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
      
      // Search
       $("#searchText").on("input", function(){
            var searchText = $(this).val();
         if(searchText == "") return;
         $.post('search.php', 
                  {
                      key: searchText
                  },
                function(data, status){
                  $("#chatList").html(data);
                });
       });
  
       // Search using the button
       $("#serachBtn").on("click", function(){
            var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('search.php',
                  {
                      key: searchText
                  },
                function(data, status){
                  $("#chatList").html(data);
                });
       });
    });
    </script>
</body>
</html>
<?php
  }else{
  	header("Location: login.php");
   	exit;
  }
 ?>
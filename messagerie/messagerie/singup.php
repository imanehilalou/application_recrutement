<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
    
<div class="w-400 p-5 shadow rounded-3">
    <form method="post" 
	 	      action="inscription.php"
	 	      enctype="multipart/form-data">
     <div class="d-flex
                justify-content-center
                align-items-center
                flex-column">
                <div class="logo">
                <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
                <h1 class="fs-1 text-center">Sing UP</h1>
        </div>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text"
           class="form-control"
           name="name" >
        </div>

        <div class="mb-3">
          <label class="form-label">UserName</label>
          <input type="text"
           class="form-control"
           name="username">
        </div>

        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" 
            class="form-control"
            name="password">
          </div>

          <button type="submit" class="btn btn-primary">Sing Up</button>
          <a href="login.php">login </a>


    </form>

</div>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
<?php
  }else{
  	header("Location: chat.php");
   	exit;
  }
 ?>
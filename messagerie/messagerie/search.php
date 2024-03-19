
<?php

session_start();

if (isset($_SESSION['Nom_utilisateur'])) {

    if(isset($_POST['key'])){
    
	   include 'connexion.php';

	
	   $key = "%{$_POST['key']}%";
     
	   $sql = "SELECT * FROM utilisateurs
	           WHERE Nom_utilisateur
	           LIKE ? OR Nom LIKE ?";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$key, $key]);

       if($stmt->rowCount() > 0){ 
         $users = $stmt->fetchAll();

         foreach ($users as $user) {
         	if ($user['id_utilisateur'] == $_SESSION['id_utilisateur']) continue;
       ?>
       <li class="list-group-item">
		<a href="chat.php?user=<?=$user['Nom_utilisateur']?>"
		   class="d-flex
		          justify-content-between
		          align-items-center p-2">
			<div class="d-flex
			            align-items-center">

			    <!-- <img src="uploads/<?=$user['p_p']?>"
			         class="w-10 rounded-circle"> -->

			    <h3 class="fs-xs m-2">
			    	<?=$user['Nom']?>
			    </h3>            	
			</div>
		 </a>
	   </li>
       <?php } }else { ?>
         <div class="alert alert-info 
    				 text-center">
		   <i class="fa fa-user-times d-block fs-big"></i>
           The user "<?=htmlspecialchars($_POST['key'])?>"
           is  not found.
		</div>
    <?php }
    }

}else {
	header("Location: login.php");
	exit;
}
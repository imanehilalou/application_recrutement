<?php 

session_start();

if (isset($_SESSION['email'])) {

	if (isset($_POST['message']) &&
        isset($_POST['to_id'])) {
	
	include 'connexion.php';
	include 'data_base.php';

	$message = $_POST['message'];
	$to_id = $_POST['to_id'];


	$from_id = $_SESSION['email'];

	$sql = "INSERT INTO 
	       chats (émetteur, to_id, message) 
	       VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$res  = $stmt->execute([$from_id, $to_id, $message]);
    
    if ($res) {
 
       $sql2 = "SELECT * FROM conversations
               WHERE (utilisateur_1=? AND utilisateur_2=?)
               OR    (utilisateur_2=? AND utilisateur_1=?)";
       $stmt2 = $conn->prepare($sql2);
	   $stmt2->execute([$from_id, $to_id, $from_id, $to_id]);


        date_default_timezone_set('Africa/Casablanca');
		$time = date("h:i:s a");

		if ($stmt2->rowCount() == 0 ) {
			$sql3 = "INSERT INTO 
			         conversations(utilisateur_1, utilisateur_2)
			         VALUES (?,?)";
			$stmt3 = $conn->prepare($sql3); 
			$stmt3->execute([$from_id, $to_id]);
		}
		?>

		<p class="rtext align-self-end
		          border rounded p-2 mb-1">
		    <?=$message?>  
		    <small class="d-block"><?=$time?></small>      	
		</p>

    <?php 
     }
  }
}else {
	header("Location: login.php");
	exit;
}

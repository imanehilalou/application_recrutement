<?php  
include 'connexion.php';

$name = $_POST['name'];
$password = $_POST['password'];
$username = $_POST['username'];

$data = 'name='.$name.'&username='.$username;
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO utilisateurs (Nom, Nom_utilisateur, mot_de_passe) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$name, $username, $password]);
?>
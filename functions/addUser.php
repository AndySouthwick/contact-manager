<?php 
header('Location: ../');
include '../functions/var.php';
?>

<?php
if (isset($_POST["submit"])) {
$user_id = $_POST["user_id"];
$name = $_POST["name"];
$email= $_POST["email"];
$phone = $_POST["phone"];
$permission = $_POST["permission"];


  $query = "INSERT INTO user_contacts (user_id, name, email, phone, permission)  VALUES ('$user_id', '$name', '$email', '$phone', '$permission')";
  mysqli_query($dbc, $query) or die('Error querying database.');

     
  

  mysqli_close($dbc);

}

?>
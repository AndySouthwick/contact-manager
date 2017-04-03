<?php
header('Location: http://localhost:8888/phptest/index.php?page=login&message=thanks');
  
 include '../functions/var.php';
 
  session_start();
  if (isset($_POST['submit'])) {
 // Grab the profile data from the POST
    $name = $_POST['name'];
  	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if (!empty($name) && !empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM user WHERE email = '$email'";
       $data = mysqli_query($dbc, $query) or die('Error connecting to MySQL server1.');

      if (mysqli_num_rows($data) == 0) {


        // The username is unique, so insert the data into the database
        $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', SHA('$password1'))";
        mysqli_query($dbc, $query) or die('Error connecting to MySQL server2.');	
      // Confirm success with the user

        mysqli_close($dbc);
        exit();    
      }
     else{
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $email = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }
  mysqli_close($dbc);
  

?>

<?php header("Location: http://localhost:8888/crm"); 
include '../functions/var.php'; 
session_start();
 if(!isset($SESSION['user_id'])){
    if (isset($_POST['submit'])) {
//grab users data from DB
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	$password = mysqli_real_escape_string($dbc, trim($_POST['password']));

    if(!empty($email && !empty($password))) {
        $query = "SELECT user_id, name, email FROM user WHERE email = '$email' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 1){
            $row = mysqli_fetch_array($data);
            //store session vars 
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
           
           $uid= $_SESSION['user_id'];
// echo $row['name'];
// echo 'working';
         setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
		 setcookie('name', $row['name'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
         setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));  // expires in 30 days


exit();
        }else{
            $error_msg = "invalid";
        }
    }else{
        $error_msg = "incorrect";
    }
      if (empty($_SESSION['user_id'])) {
		header("Location: http://localhost:8888/crm/index.php?error");
        }
 }
 }
?>
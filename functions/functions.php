<? require_once 'functions/startsession.php'; ?>
<? require_once 'functions/var.php'; ?>

<? function add_contact(){   ?> 
       <div class="col-lg-3">
      <form method="post" action="functions/addUser.php">    
            <input class="form-control" type="hidden" name="user_id" value="<? echo $_SESSION['user_id']; ?>"><br>
            <input class="form-control" type="text" name="name" placeholder="name" value=""><br>
            <input class="form-control" type="text-area" name="email" placeholder="email" value=""><br>
            <input class="form-control" type="text" name="phone" placeholder="Phone" value=""><br>

            Permission <br>
            <select class="form-control" name="permission">
             <option value="Customer">Customer</option>
            <option value="CS">CS</option>
            <option value="Admin">Admin</option>
             </select>
           <br>

            <button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
            </form>
        </div>
<? } ?>


<? function show_contacts(){
   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to MySQL server.');
   $user_id = $_SESSION['user_id'];
   $query = "SELECT contact_id, name, email, phone, permission FROM user_contacts WHERE user_id = $user_id";
   $data = mysqli_query($dbc, $query);

   while($row = $data->fetch_array()){
  
      echo '<div class="col-md-9"><div class="panel panel-default"><div class="panel-body">';
      echo '<div class="col-md-1">ID:' . $row['contact_id'] .' </div>';
      echo  '<div class="col-md-3">Email: ' . $row['email'] . '</div>';
      echo '<div class="col-md-2">First Name <br/>' . $row['name'] . '</div>';
      echo '<div class="col-md-2">Phone <br/>' . $row['phone'] . '</div>';   
      echo '<div class="col-md-1">Permission <br/>' . $row['permission'] . '</div>';
      echo '<div class="col-md-1"><a href="index.php?layout=1&page=edituser&user=' . $row['u_id'] . '">Edit</a>';
      echo '</div></div></div></div>';

      }
}; ?>
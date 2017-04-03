  <? session_start();?> 
  <h2 class="form-signin-heading">Please Register</h2>
 <form method="post" action="functions/register.php">
    <input type="text"  name="name" class="form-control" placeholder="Name" required/>         
    <input type="text"  name="email" class="form-control" placeholder="Email" required/>         
    <input type="password"  name="password1" class="form-control" placeholder="Password" required/>
    <input type="password"  name="password2" class="form-control" placeholder="Confirm Password" required/>
    <input type="submit" value="Sign Up" name="submit" class="btn btn-lg btn-primary btn-block" />
</form>
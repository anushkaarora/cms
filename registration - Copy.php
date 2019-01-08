<?php  require_once('db.php'); ?>
<?php  require_once('header.php');?>
<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
if(!empty($username) && !empty($email) && !empty($password)){
$username = mysqli_real_escape_string($connection, $username);
 $email = mysqli_real_escape_string($connection, $email); //protecting from the sql injections
 $password = mysqli_real_escape_string($connection, $password);
		  
  $password =   password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12) );  //look for php.net for more information., 
   //password bycrypt is called as blowfish algorithm.
		     
/*$query = "SELECT randSalt FROM users";
$select_randsalt_query = mysqli_query($connection, $query);
		  
 if(!$select_randsalt_query){
die("query failed" . mysqli_error($connection));
} */


 /*$row = mysqli_fetch_array($select_randsalt_query);
$salt = $row['randSalt'];
				
       $hash =  crypt($password, $salt);*/
		// $result = mysqli_query($connection,$hash);

   $query = "INSERT INTO users(username, user_email, user_password, user_role) ";
$query .= "VALUES('{$username}','{$email}','{$password}', 'subscriber' )";
   $register_user_query = mysqli_query($connection, $query);
   if(!$register_user_query){
	    die("query failed" . mysqli_error($connection));
   }	 
   
       //  $message = "Your registration has been submitted";
		 
}//main if ends
 

    
?>  

    <!-- Navigation -->
    
    <?php  include "navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
					   <!-- <h6 class = "text-center"><?php echo $message;?></h6> -->
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"
							autocomplete="on"   value="<?php echo isset($username) ? $username : '' //so that we can dislay the name once we have registered ?>" >
														<p><?php echo isset($error['username']) ? $error['username'] : ''?></p>
							
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on"   value="<?php echo isset($email) ? $email : '' //so that we can dislay the name once we have registered ?>" >
							<p><?php echo isset($error['email']) ? $error['email'] : ''?></p>

                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
							<p><?php echo isset($error['password']) ? $error['password'] : ''?></p>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>

<?php include "footer.php";?>
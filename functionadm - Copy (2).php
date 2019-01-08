<?php
    function redirect($location){
		  
		 header("Location:" . $location );
		 exit;
	}
	       function ifItIsMethod($method=null){
			   if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
				   return true;
			   }
			      return false;
		   }
		               
	function isLoggedIn(){
		

    if(isset($_SESSION['user_role'])){

        return true;


    }


   return false;

}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
	

    if(isLoggedIn()){
	

        redirect($redirectLocation);

    }

}
  					   
   function is_admin($username) {

    global $connection; 

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
   
    $row = mysqli_fetch_array($result);


    if($row['user_role'] == 'admin'){

        return true;

    }else {


        return false;
    }

}


		
		function escape($string){
		
		global $connection;
		mysqli_real_escape_string($connection, trim($string));
		
	}
              function users_online(){
				   
				             if(isset($_GET['onlineusers'])) {
								 
								 global $connection;
								 
								 if(!$connection){ 
								  session_start();
								  include"../db.php";
								  
								  
								  
								 	    $session = session_id(); //everytym we start the session this function will catch the id of that session.
					
					 $time = time(); //holding the time
					 $time_out_in_seconds = 30; //equal to 60 sec
					 $time_out = $time -  $time_out_in_seconds;
					 
					 $query = "SELECT * FROM users_online WHERE session = '$session' ";
					 $send_query = mysqli_query($connection, $query);
					 $count = mysqli_num_rows($send_query);
					 
					 if($count == NULL){ 
					 mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");
					 }else{
						 
					         mysqli_query($connection,"UPDATE users_online SET time ='$time' WHERE session = '$session'");
					 }
					 
					$users_online_query =  mysqli_query($connection,"SELECT * FROM users_online WHERE time > '$time_out'"); //how many users are online
					echo $count_user = mysqli_num_rows($users_online_query);
								 }
					
							 } //closing of get request.
					 
			  }			
                                 users_online();			  
   function insert_categories(){ 
			 
				  global $connection;
				  if(isset($_POST['submit'])){
						$cat_title = $_POST['cat_title'];
				 if($cat_title == "" || empty($cat_title)){
					echo "this field should not be empty";
					}
					else
					{
					  $stmt = mysqli_prepare($connection,"INSERT INTO category(cat_title)VALUES(?) ");//prepare,bind and execute.
					  mysqli_stmt_bind_param($stmt,'s',$cat_title);
					  mysqli_stmt_execute($stmt);
           			  if(!$stmt){
					       die('QUERY FAILED' . mysqli_error($connection));
					}
				}
				   mysqli_stmt_close($stmt); //closing database connection, although it works fine without it.
			} 
		}

function find(){
	global $connection;
							$query  = "SELECT * FROM category";
                                $select_categories  = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($select_categories )){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categoriesadm.php?delete={$cat_id}'>Delete</a></td>";
									echo "<td><a href='categoriesadm.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
}

}
           function delete()
		   {
			    global $connection;
									if(isset($_GET['delete'])){
										$the_cat_id = $_GET['delete'];
										$query = "DELETE FROM category WHERE cat_id = {$the_cat_id} ";
										$delete_query = mysqli_query($connection,$query);
										header("Location: categoriesadm.php");
		   }
		   }
		               function recordCount($table){
						   global $connection;
                        $query = "SELECT * FROM posts . $table";
                        $select_all_post = mysqli_query($connection,$query);
					    $result =  mysqli_num_rows($select_all_post);
						return $result;
					   }
		function username_exists($username){
			  global $connection;
			  
			  $query = "SELECT username FROM users WHERE username = '$username' ";
			  $result = mysqli_query($connection,$query);
			  if(!$result){
				  die("query failed" . mysqli_error($connection));
			  }
			            if(mysqli_num_rows($result) > 0){
							return true;
						}else{
							return false;
						}
		} 

		
		function email_exists($email){
			  global $connection;
			  $query = "SELECT user_email FROM users WHERE user_email = '$email' ";
			  $result = mysqli_query($connection,$query);
			  if(!$result){
				  die("query failed" . mysqli_error($connection));
			  }
			            if(mysqli_num_rows($result) > 0){
							return true;
						}else{
							return false;
						}
		} 
	function register_user($username, $email, $password){
		global $connection;
		
  
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
		 
//main if ends
	} //end of the function.
	
function login_user($username,$password){
	//$password = "secret";
    //$has = "$2y$10&";
    //$salt = "iusesomecrazystrings22";// in order to check the string is of what length
    //echo strlen($salt);
    global $connection;
    $username = trim($username);
	
	$password = trim($password);        
	
    $username = mysqli_real_escape_string($connection, $username);
	
    $password = mysqli_real_escape_string($connection, $password);
    
    # Salt fetch
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    
    if(!$select_randsalt_query){
        die("query failed" . mysqli_error($connection));
    }
    
    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    
    $hashed_password_from_the_form = crypt($password, $salt);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection,$query);
    if(!$select_user_query){
        die("query failed" . mysqli_error($connection));
        
    }
    
    
    
    while($row = mysqli_fetch_array($select_user_query)) // to pull the data out of the query
    {
        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
		
		
		              
    if(password_verify($password, $db_user_password )){ //comparing the password
        $_SESSION['username'] = $db_username ;
        $_SESSION['firstname'] = $db_user_firstname ;
        $_SESSION['lastname'] = $db_user_lastname ;
        $_SESSION['user_role'] = $db_user_role ;
		
        redirect("adm.php");
    }
    
    else{
        //redirect("index1.php");
              return false;	   
    }
        
        
    }
    
	return true;
   
}	
	

?>



<?php   session_start();//to tell server to be ready for the session  or we are turning on the session   ?> 

<?php
             // everytime  a user enter the session, we have to cancel his/her session.
						  $_SESSION['username'] = null ;
						   $_SESSION['firstname'] = null ;
						   $_SESSION['lastname'] = null ;
						   $_SESSION['user_role'] = null ;
						   
						   //after cancelling the session we have to send user somewhere else
							   header("Location: index1.php");
						    
?>
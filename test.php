<?php
  
   echo password_hash('secret', PASSWORD_BCRYPT, array('cost' => 12) );  //look for php.net for more information., 
   //password bycrypt is called as blowfish algorithm.
   
?>
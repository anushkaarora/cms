<!-- Navigation -->
<?php #include "db.php";?>
<?php include "functionadm.php"; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <div class="container">
	
        <!-- Brand and toggle get grouped for better mobile display -->
		
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index1">CREATION DIARIES</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
			
           <?php
                $query  = "SELECT * FROM category";
                $select_all_category_query  = mysqli_query($connection,$query);
                while($row  = mysqli_fetch_assoc($select_all_category_query))
                {
                    $cat_title =  $row['cat_title'];
					$cat_id = $row['cat_id'];
					
					 $category_class = '';
					 
					 $registration_class = '';
					 
					 $page_name =  basename($_SERVER['PHP_SELF']); // it will select the particular page
					 $registration = 'registration.php';
					  if(isset($_GET['category']) && $_GET['category'] == $cat_id){
						  
						  $category_class = 'active'; //to make the static links active
					  }else if($page_name == $registration){
						  
						  $registration_class = 'active';
					  }
					  
                    echo "<li class= '$category_class'><a href='#'>{$cat_title}</a></li>";
                }
                
          ?>
		  
		          <?php if(isLoggedIn()): ?>

                        <li>
                            <a href="adm.php">Admin</a>
                        </li>
                <?php endif; ?>

                     <li>
                        <a href="registration.php">Registration</a>
                    </li>
                                  
				
				

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>





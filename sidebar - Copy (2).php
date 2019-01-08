<?php

                             if(ifItIsMethod('post')){
							   if(isset($_POST['username']) && isset($_POST['password'])){
								   login_user($_POST['username'], $_POST['password']);
							   }else{
								   redirect("index1.php");
							   }
						   }

?>
<body style="background-color:#800000">
<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                   
					<form action="search.php" method="post">
                <font color = "red" type= "Blackadder ITC"></b><i><h4>PHOTOGRAPHY BY SAMARTH BACHHETI</h4></i></b></font>
					</form><!--search form-->
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
				<h4>Blog Categories</h4>
				<?php
					$query  = "SELECT * FROM category ";
					$select_all_category_sidebar  = mysqli_query($connection,$query);
					
				?>
				        <div class="row">
                        <div class="col-lg-3">
                            <ul class="list-unstyled">
							    <?php 
								   while($row = mysqli_fetch_assoc($select_all_category_sidebar )){
									   $cat_title = $row['cat_title'];
									    $cat_id = $row['cat_id'];

											   echo "<li><a href = 'categoryad.php?category=$cat_id'>{$cat_title}</a></li>";
								   }
							  ?>
									   
                               
                            </ul>
                        </div>
            	
                    </div>
                    <!-- /.row -->
                </div>
			<!-- Login -->	
		<div class="well">
		<?php if(isset($_SESSION['user_role'])): ?>
		
		<h4>Logged in as <?php  echo $_SESSION['username'] ?></h4>
		
		<a href= "logout.php" class="btn btn-primary">Logout</a>
		
		<?php else: ?>
		
		<h4>Login</h4>
		<form  method="post">
		
		  <div class="form-group">
		    
			<input type="text"  name="username" class="form-control" placeholder="Enter Username">
	</div>
	   <div class="input-group">
	   
	   <input type="password"  name="password" class="form-control" placeholder="Enter Password">
	<span class="input-group-btn">
	<button class="btn btn-primary" name="login" type="submit">Submit </button>
	</span>
	</div>
	</form>
<?php endif; ?>
		
	</div>
	   
                <!-- Side Widget Well -->
               
 
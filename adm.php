<?php include "headeradm.php";?>
    <div id="wrapper">
	
	<body style= "background-color:white">
	<?php 
	               
	?>
	
	
        <!-- Navigation -->
        <?php include "navigationadm.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to  Admin
							
							
                            <small><?php echo  $_SESSION['username'] ;?></small>
                        </h1>  
						 
                    </div>
                </div>
				
                <!-- /.row -->
				       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
  $query = "SELECT * FROM posts";
  $select_all_posts = mysqli_query($connection,$query);
  if(!$select_all_posts){
	  die("QUERY FAILED" . mysqli_error($connection));
	  
  }
   
     $post_counts = mysqli_num_rows($select_all_posts);//to count the number of rows
     echo "<div class='huge'>{$post_counts}</div>";
                       
?>
					    				
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="postadm.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
										<?php
					  $query = "SELECT * FROM comments";
					  $select_all_comments = mysqli_query($connection,$query);
					  if(! $select_all_comments){
						  die("QUERY FAILED" . mysqli_error($connection));
						  
					  }
					   
					 $comments_count = mysqli_num_rows( $select_all_comments);//to count the number of rows
						 echo "<div class='huge'>{$comments_count}</div>";
										   
					?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
					  $query = "SELECT * FROM users";
					  $select_all_users = mysqli_query($connection,$query);
					  if(!$select_all_users){
						  die("QUERY FAILED" . mysqli_error($connection));
						  
					  }
					   
					 $users_count = mysqli_num_rows($select_all_users);//to count the number of rows
						 echo "<div class='huge'>{$users_count}</div>";
										   
					?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        					<?php
					  $query = "SELECT * FROM category";
					  $select_all_categories = mysqli_query($connection,$query);
					  if(!$select_all_categories ){
						  die("QUERY FAILED" . mysqli_error($connection));
						  
					  }
					   
					 $categories_count = mysqli_num_rows($select_all_categories );//to count the number of rows
						 echo "<div class='huge'>{$categories_count}</div>";
										   
					?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categoriesadm.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
				<?php
				
				          $query = "SELECT * FROM posts WHERE post_status = 'published'";
						  $select_all_publish_posts = mysqli_query($connection,$query);
						  if(!$select_all_publish_posts){
						  die("QUERY FAILED" . mysqli_error($connection));}
                          $post_publish_count = mysqli_num_rows($select_all_publish_posts);// to count the number of rows
				
                          $query = "SELECT * FROM posts WHERE post_status = 'draft'";
						  $select_all_draft_posts = mysqli_query($connection,$query);
						  if(!$select_all_draft_posts){
						  die("QUERY FAILED" . mysqli_error($connection));}
                          $post_draft_count = mysqli_num_rows($select_all_draft_posts);// to count the number of rows
                                
						  $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
						  $select_all_comment_posts = mysqli_query($connection,$query);
						  if(!$select_all_comment_posts){
						  die("QUERY FAILED" . mysqli_error($connection));}
						  $post_comment_count = mysqli_num_rows($select_all_comment_posts);// to count the number of rows
							 	 
						  $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
						  $select_all_users_posts = mysqli_query($connection,$query);
						  if(!$select_all_users_posts){
						  die("QUERY FAILED" . mysqli_error($connection));}
                          $post_users_count = mysqli_num_rows($select_all_users_posts);// to count the number of rows
					
				?>
		
				
				      

                <div class="row">
                    
                    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
                                      
             $element_text = ['Published Posts','Posts', 'Draft Posts' , 'Comments', 'Pending Comments' , 'Users', 'Subscriber Count' , 'Categories'];
			  $element_count = [$post_publish_count ,$post_counts, $post_draft_count, $comments_count, $post_comment_count, $post_users_count, $users_count, $categories_count];
			  


    for($i =0;$i < 8; $i++) {
    
        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
     
    
    
    }
                                                            
            ?>
               
     
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
                   
                   
  <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    
                    
                    
                    
                    
                </div>

  

            </div>
            <!-- /.container-fluid -->

        </div>
        
    
        <!-- /#page-wrapper -->
        
    <?php include "footer.php" ?>
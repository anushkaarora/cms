<?php include "db.php"; ?>
<?php 
include "header.php";
?>
<?php include "navigation.php" ;?>
<!-- Page Content -->
<div class="container">
    
    <div class="row">
   
        <!-- Blog Entries Column -->
        <div class="col-md-8">
                     <?php
					  
					         $post_query_count ="SELECT * FROM posts";//to check how many posts do we have, part of pagination.
							 $find_count = mysqli_query($connection,$post_query_count); //establishing a connection
							 $count = mysqli_num_rows($find_count); //to count how many rows do we have in a specific table.
					                    $count = ceil($count / 5);
										
										 if(isset($_GET['page'])){
											 $page = $_GET['page'];
										 }else{
											 $page= "";
										 }
										    if($page == "" || $page == 1){
												$page_1 = 0;
											}else{
												$page_1 = ($page * 5) - 5;
											}
										
										
					 
							     $query = "SELECT * FROM posts LIMIT $page_1 ,5 ";
								   $select_all_posts_query  = mysqli_query($connection,$query);
								   
								while($row  = mysqli_fetch_assoc($select_all_posts_query))
							{
								$post_id =  $row['post_id'];
								$post_title =  $row['post_title'];
								$post_author = $row['post_author'];
								$post_date =  $row['post_date'];
								$post_image =  $row['post_image'];
								$post_content = substr($row['post_content'],0,100); // to cut down the content to 100 characters only, to be displayed on index1.php
								$post_status =  $row['post_status'];
								
								 if($post_status == 'published'){
								 
									 
								 
								
								
						?>   
						
						
								
								<!-- First Blog Post -->
								 <?php echo  $count; ?> 
								<h2>
									<a href="postad.php?p_id=<?php echo $post_id; ?>"><?php  echo $post_title ?></a>       
								</h2>                                                                                    
								<p class="lead">
									<a href="authorpost.php?author=<?php  echo $post_author ; ?>&p_id=<?php echo $post_id; ?>"<?php  echo $post_author ; ?></a>
								</p>
								<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ; ?></p>
								<hr>
								<img class="img-responsive" src="images/<?php echo $post_image ; ?>" alt="">
								<hr>
								<p><?php echo $post_content?></p>
								
							<hr>
							<?php }  } ?>
                       <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">← Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer →</a>
                </li>
            </ul>
        
        </div>
        
        <?php include "sidebar.php" ?>
		</div>
    </div>
<!-- /.row -->
<hr>

<ul class="pager"> <!-- using bootstrap for adding pagination -->
     <?php 
	   for($i =1; $i <= $count; $i++){
		   echo "<li><a href='index1.php?page={$i}'>{$i}</a></li>"; //pagination.
	   }
           ?>
 

</ul>
<?php include  "footer.php" ?>
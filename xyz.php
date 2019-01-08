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
					 
							     $query = "SELECT * FROM posts  ";
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
								
								 if($post_status !== 'published'){
								 echo "<h1 class='text-center'> NO POST SORRY </h1>";
								 }
									 else{
										 
									 
							
						?>   
						
						
						
								<h1 class="page-header">
									Page Heading
									
									<small>Secondary Text</small>
								</h1>
								
								<!-- First Blog Post -->
								<h2>
									<a href="postad.php?p_id=<?php  echo $post_id; ?>"><?php  echo $post_title ?></a>       
								</h2>                                                                                    
								<p class="lead">
									<a href="index.php"><?php  echo $post_author ; ?></a>
								</p>
								<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ; ?></p>
								<hr>
								<img class="img-responsive" src="images/<?php echo $post_image ; ?>" alt="">
								<hr>
								<p><?php echo $post_content?></p>
								<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
							<hr>
							<?php }  } ?>
							  <!-- blog comments -->
							  <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="#" method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                
                <hr>
           			
							<!-- posted comments -->
						
				  <!-- Comment -->
                <div class="media">
                    
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php //echo $comment_date;   ?></small>
                        </h4>
               
                    </div>
                </div>			
							
							  <!-- Comment -->
                <div class="media">
                    
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php //echo $comment_date;   ?></small>
                        </h4>
                    
                    
                    </div>
                </div>
				
							dfyguhijoikoihugyghuijkoijhugyuhijok
							  <!-- nested  Comment -->
                <div class="media">
                    
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php //echo $comment_date;   ?></small>
                        </h4>
                    strdytfuyguhijolhgkfdxfgfkjl;lljhgfhjkloiuytuiopijhugyfthjukoplkoijhuyghuijkoihu
                    
                    </div>
                </div>
				<!-- end nested comments -->
			</div>
			</div>
							
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
<?php include  "footer.php" ?>
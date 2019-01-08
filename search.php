<?php include "db.php"; ?>
<?php
include "header.php"; //include "includes/header.php" in case the file is in another folder than htdocs
?>
<?php include "navigation.php" ;?>
<!-- Page Content -->
<div class="container">
    
    <div class="row">
        
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
			     if(isset($_POST['submit']))
				 {
				  	$search =  $_POST['search'];
					$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
					$search_query = mysqli_query($connection,$query);
					if(!$search_query){
						die("query failed" . mysqli_error($connection));
					}
					   $count = mysqli_num_rows($search_query);
					   if($count == 0){
						   echo "<h1> no results</h1>";
					   }
					      else{
							       $query = "SELECT * FROM posts";
								   $select_all_posts_query  = mysqli_query($connection,$query);
            while($row  = mysqli_fetch_assoc($select_all_posts_query))
            {
                $post_title =  $row['post_title'];
                $post_author = $row['post_author'];
                $post_date =  $row['post_date'];
                $post_image =  $row['post_image'];
                $post_content =  $row['post_content'];
                        ?>   
                <h1 class="page-header">
                    Page Heading
                    
                    <small>Secondary Text</small>
                </h1>
                
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php  echo $post_title ?></a>
                </h2>
                <p class="lead">
                    <a href="index.php"><?php  echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php  $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
			<?php } 
						  }
				 } 
			 ?>
			
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
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
 
<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero</p>
</div>
 
</div>
</div>
<!-- /.row -->
<?php include  "footer.php" ?>
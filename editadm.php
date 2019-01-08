<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
$query  = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id  = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_posts_by_id )){
    $post_id = $row['post_id'];
    $post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    echo  $post_date = $row['post_date'];
}
 
if(isset($_POST['update_post']))
{
    $post_user = $_POST['post_user'];
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    
    move_uploaded_file($post_image_temp,"images/$post_image");
    
    $query  = "UPDATE posts SET "; // -> You need a whitespace after SET
    $query .="post_title = '{$post_title}', ";
    $query .="post_category_id = {$post_category_id}, "; // -> No quotes around integer values
    $query .="post_date = now(), ";
    $query .="post_user  = '{$post_user}', ";
    $query .="post_status = '{$post_status}', ";
    $query .="post_tags = '{$post_tags}', ";
    $query .="post_content = '{$post_content}', ";
    $query .="post_image = '{$post_image}' ";
    $query .="WHERE post_id = {$the_post_id} ";
    
    $update_post = mysqli_query($connection,$query);
	
	  if(empty($post_image)){
							   $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
						   $select_post_image = mysqli_query($connection,$query);}
					   
    
    if(!$update_post){
        die('QUERY FAILED' . mysqli_error($connection));
    }
	
	    echo "<p class='bg-success'>Post Updated.<a href='../postad.php?p_id=$the_post_id'>View Post</a> or <a href='postadm.php'>Edit Post</a></p>"; //bg-class gives a green color, if we want to view the post we can view it.
}
 
 
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value ="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>
    
    <div class="form-group">
	<label for="categories">Categories</label>
						<br>
        <select name="post_category" id="">
            
            <?php
            $query = "SELECT * FROM category";
            $select_categories = mysqli_query($connection,$query);
            if(!$select_categories){
                die('QUERY FAILED' . mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($select_categories )){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>
    
    
  <!--  <div class="form-group">
        <label for="author">Post Author</label>
        <input  value ="" type="text" class="form-control" name="author">
    </div> -->
	
	
						                        <div class = "form-group">
						<label for="category">Users</label>
						<br>
                            <select name="post_user" id="">
				<?php 
				    echo "<option value='{$post_user}'>{$post_user}</option>";
				?>
                                
                                <?php
                                $users_query = "SELECT * FROM users";
                                $select_users = mysqli_query($connection, $users_query);
                                if(!$select_users){
                                    die('QUERY FAILED' . mysqli_error($connection));
                                }
                                while($row = mysqli_fetch_assoc($select_users)){
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    echo "<option value='{$username}'>{$username}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
	
	<div class="form-group">
	<select name="post_status" id="">
	<option value='<?php echo $post_status; ?>'><?php echo $post_status; ?> 
	</option>
	       <?php 
				if($post_status == 'published'){
					  echo "<option value='draft'>Draft</option>";
				}
				  else{
					   echo "<option value='published'>Published</option>";
				  }
		   
		   ?>
	</select>
      </div>
  <!--  <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value ="<?php echo $post_status;?>" type="text" class="form-control" name="post_status">
    </div> -->
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value ="<?php echo $post_tags;?>" type="text" class="form-control"name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input  type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
<?php echo $post_content;?></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update ">
    </div>
</form> 
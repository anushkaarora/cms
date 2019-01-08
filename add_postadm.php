<?php include "headeradm.php";?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "navigationadm.php";?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to  Admin
                        <small>Author</small>
                    </h1>
                    <?php
                    if(isset($_POST['create_post'])){
                        $post_title = $_POST['title']; 
                        $post_category_id = $_POST['post_category'];
						$post_user = $_POST['post_user'];
                        $post_status = $_POST['post_status'];
                        $post_image = $_FILES['image']['name'];
                        $post_image_temp = $_FILES['image']['tmp_name'];
                        
                        $post_tags = $_POST['post_tags'];
                        $post_content = $_POST['post_content'];
                        $post_date = date('d-m-y');
                      //  $post_comment_count = 4;
                        
                        move_uploaded_file($post_image_temp, "images/$post_image");
                        
                        $query = "INSERT INTO posts(post_category_id,post_title, post_user, post_date, post_image, post_content, post_tags, post_status) ";
                        $query .= "VALUES ({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
						$select_categories = mysqli_query($connection,$query);
                                if(!$select_categories){
                                    die('QUERY FAILED' . mysqli_error($connection));
                                }
								
								$the_post_id =  mysqli_insert_id($connection); // to pull the last created id.
								   echo "<p class='bg-success'>Post Created.<a href='../postad.php?p_id=$the_post_id'>View Post</a> or <a href='postadm.php'>Edit Post</a></p>"; //bg-class gives a green color, if we want to view the post we can view it.
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input class="form-control" name="title">
                        </div>
                        
                        <div class = "form-group">                                                                            
						<label for="category">Category</label>
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
						
						  <div class = "form-group">
						<label for="category">Users</label>
						<select name="post_user" id="">
						<br>
                                
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
                        
                        
                     <!--   <div class="form-group">
                            <label for="title">Post Author</label>
                            <input type="text" class="form-control" name="author">
                        </div> -->
                        
                        <div class="form-group">
                            <label for="post_status">Post Status</label>
							  <select name="post_status" id="">
							    <option value="draft">Select Options</option>
								 <option value="published">Publish</option>
								  <option value="draft">Draft</option>
							  </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags">
                        </div>
                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input type="file" name="image">
                        </div>
                        
                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                        </div>
                    </form>
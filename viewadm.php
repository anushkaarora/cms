<body style= "background-color:white">
<?php 
 
           include("delete_modal.php");

		   
		 		   
          if(isset($_POST['checkBoxArray'])){
			  foreach($_POST['checkBoxArray'] as $postValueId ){
				$bulk_options = $_POST['bulk_options'];
				
				 switch($bulk_options ){
					 case 'published' :
				 $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
				 $update_to_published_status = mysqli_query($connection,$query);
				    if(!$update_to_published_status){
						die("query failed" . mysqli_error($connection));
					}
					  break;
					  
					       case 'draft' :
						 $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
						 $update_to_draft_status = mysqli_query($connection,$query);
							if(!$update_to_draft_status){
								die("query failed" . mysqli_error($connection));
							}
							  break;
							      
								  
								   case 'delete' :
									 $query = "DELETE  FROM posts WHERE post_id = {$postValueId} ";
									 $update_to_delete_status = mysqli_query($connection,$query);
										if(!$update_to_delete_status){
											die("query failed" . mysqli_error($connection));
										}
										  break;
										  
										  
										     case 'clone':
											 
											 $query  = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
								        $select_post_query  = mysqli_query($connection,$query);
										
								   while($row = mysqli_fetch_assoc($select_post_query)){
									   
									   $post_title = $row['post_title'];
									   $post_category_id = $row['post_category_id'];
									   $post_date = $row['post_date'];
									   $post_author = $row['post_author'];
									   $post_user = $row['post_user'];
									   $post_status = $row['post_status'];
									   $post_image = $row['post_image'];
									   $post_tags = $row['post_tags'];
									   $post_content = $row['post_content'];
								   }
								                  

								     $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_user,post_date,post_image,post_content,post_tags,post_status)";
									 $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
									 
									 $copy_query = mysqli_query($connection,$query);
									 if(!$copy_query){
										 die("query failed" . mysqli_error($connection));
									 }
									   break;
											     
				 }
			  }
		  }

?>

<form action="" method='post'>
<table class="table table-bordered table-hover">
                     
					     <div id="bulkOptionsContainer" class="col-xs-4">
						       <select class="form-control" name="bulk_options" id="">
							    <option value="">Select Options</option>
								<option value="published">Publish</option>
								<option value="draft">Draft</option>
								<option value="delete">Delete</option>
								<option value="clone">Clone</option>
								</select>
								</div>
								   
								    <div  class="col-xs-4"> <!-- width of 33% -->
									 <input type="submit" name="submit" class="btn btn-success" value="Apply" >
									  <a class="btn btn-primary" href="add_postadm.php">Add New</a>
									  </div>
					  
								 <thead>
									 <tr>
									    <th><input id="selectAllBoxes" type="checkbox"></th>
										<th>ID</th>
										<th>User</th>
										<th>Title</th>
										<th>Category</th>
										<th>Status</th>
										<th>Image</th>
										<th>Tags</th>
										<th>Comments</th>
										<th>Date</th>
										<th>Edit</th>
										<th>Delete</th>
										<th>Views</th>
									 </tr>
								 </thead>
							  <tbody>
								<?php 
							       $query  = "SELECT * FROM posts ORDER  BY post_id DESC ";
								   $select_posts  = mysqli_query($connection,$query);
								   while($row = mysqli_fetch_assoc($select_posts )){
									   $post_id = $row['post_id'];
									   $post_author = $row['post_author'];
									   $post_user = $row['post_user'];
									   $post_title = $row['post_title'];
									   $post_category_id = $row['post_category_id'];
									   $post_status = $row['post_status'];
									   $post_image = $row['post_image'];
									   $post_tags = $row['post_tags'];
									   $post_comment_count = $row['post_comment_count'];
									   echo  $post_date = $row['post_date'];
									   echo  $post_views_count = $row['post_views_count'];
									   echo "<tr>";
								   
								?>
									   <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php  echo $post_id; ?>'></td>
								   
									   <?php 
									                         
                                               echo "<td>{$post_id}</td>";
											   
                                                   if(!empty($post_author)){
													   echo "<td>{$post_author}</td>";
													   
												   }elseif(!empty($post_user)){
													   
													   echo "<td>{$post_user}</td>";
												   }
												     
 
											   echo "<td>{$post_title}</td>";
											   
											   
											   
											           $query  = "SELECT * FROM category WHERE cat_id = {$post_category_id} ";
														$select_categories_id  = mysqli_query($connection,$query);
                                                  while($row = mysqli_fetch_assoc($select_categories_id )){
															$cat_id = $row['cat_id'];
													     	$cat_title = $row['cat_title'];
											  
												  echo "<td>{$cat_title}</td>"; 
												  
												    
												//echo "<td>{$post_category_id}</td>";
											   echo "<td>{$post_status}</td>";
											   echo "<td><img width ='100' src='images/$post_image'</td>";
											   echo "<td>{$post_tags}</td>";
											   
											   // to update number of rows , comment count
											    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id" ;
												
												$send_comment_count = mysqli_query($connection,$query);
												$row = mysqli_fetch_array($send_comment_count);
												$comment_id = $row['comment_id'];
												$count_comments = mysqli_num_rows($send_comment_count);
											   
											   echo "<td><a href='post_comment.php?id={$post_id}'>$count_comments</a></td>";
											   
											   
											  echo "<td>{$post_date}</td>";
											//  echo "<td><a class='btn btn-primary' href= 'postad.php'>View Post</a></td>";
											   echo "<td><a  class='btn btn-info' href='postadm.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>"; //dividing the values is done through ampersand
											   
											   ?>
											   <form method="post">
											               <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
														   <?php 
														         echo ' <td><input class="btn btn-danger" type="submit" name="delete" value="DELETE"></td>';
														   ?>
											   </form>
											   <?php
											 //  echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='postadm.php?delete={$post_id}'>Delete</a></td>"; //using escape sequence for javascript and a pop box to ask whether you want to proceeed further with your decision.
											   
											   echo "<td><a class= 'btn btn-primary' href='postadm.php?reset={$post_id}'>{$post_views_count}</a></td>" ;
											    echo "</tr>";
									  }
								   }

								?>
						</tbody>
						</table>
					<?php     
                                 if(isset($_POST['delete'])){
									 
								    $the_post_id = 	$_POST['post_id'];
									
									$query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                                               $delete_query = mysqli_query($connection,$query);
											   
											   header("Location: postadm.php");
									}	

                                                  
                                   if(isset($_GET['reset'])){
									 
								    $the_post_id = 	$_GET['reset'];
									
									$query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection,$_GET['reset']) . " ";
                                               $reset_query = mysqli_query($connection,$query);
											   
											   header("Location: postadm.php");
									} 
									 
									
					?>
		<!--<script>
		            
					$(document).ready(function(){
						
						alert("HELLO");
					});
		</script> -->
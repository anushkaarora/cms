	    if(isset($_GET['category'])){
						$post_category_id = $_GET['category'];
						if(is_admin($_SESSION['username'])){
							$stmt1 = mysqli_prepare($connection,"SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? ");
							
						}else{
							  $stmt2 = mysqli_prepare($connection,"SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ? ");
							  $published = 'published';// because prepare stat do not take strings but variables
						}
						     
										    if(isset($stmt1)){
												
												mysqli_stmt_bind_param($stmt1, "i", $post_category_id); //"i" because post_categoryId is an integer and "is" in case it is a string. 
												
												mysqli_stmt_execute($stmt1);
												mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content );
												$stmt = $stmt1;
											   }	else{
											
												mysqli_stmt_bind_param($stmt2, "is", $post_category_id,$published); //"i" because post_categoryId is an integer and "is" in case it is a string. 												
												mysqli_stmt_execute($stmt2);
												mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content );
												
												$stmt = $stmt2;
												
											}
																 
													 if(mysqli_num_rows ($stmt) == 0) {
														 echo "<h1 class='text-center'>No Categories  Available</h1>";
													 }
												
						    
						
						
								while($row  = mysqli_stmt_fetch($stmt)):
									
						     
							//	$post_content = substr($row['post_content'],0,100); // to cut down the content to 100 characters only, to be displayed on index1.php */
								
						?>   
								<h1 class="page-header">
									Page Heading
									
									<small>Secondary Text</small>
								</h1>
								
								<!-- First Blog Post -->
								<h2>
								<a href="postad.php?p_id=<?php  echo $post_id; ?>"><?php  echo $post_title; ?></a>       
								</h2>                                                                                    
								<p class="lead">
								<a href="index.php"><?php  echo $post_author ?></a>
								</p>
								<p><span class="glyphicon glyphicon-time"></span> <?php  $post_date ?></p>
								<hr>
								<img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
								<hr>
								<p><?php echo $post_content ; ?></p>
								<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
							      <hr>
							      <?php endwhile;  }   else{
								   header("Location: index1.php");
							      } ?>
                       <!-- Pager -->

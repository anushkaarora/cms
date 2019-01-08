<?php include "db.php"; ?>
<?php include "header.php";?>
<?php include "navigation.php" ;?>
<body style="background-color: #D8BFD8">
<!-- Page Content -->
<div class="container">
<div class="row">
<!-- Blog Entries Column -->
<div class="col-md-8">
<?php
		if(isset($_GET['category'])){
        
      $post_category_id  = $_GET['category'];




if(isset($_SESSION['username']) && is_admin($_SESSION['username'])){


 
							//	$post_content = substr($row['post_content'],0,100); // to cut down the content to 100 characters only, to be displayed on index1.php */
								


      $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ?");




    } else {

         $stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ? ");

         $published = 'published';

    }


    if(isset($stmt1)){

        mysqli_stmt_bind_param($stmt1, "i", $post_category_id);      //"i" because post_categoryId is an integer and "is" in case it is a string. 

        mysqli_stmt_execute($stmt1);

        mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);

      $stmt = $stmt1;


    }else {


        mysqli_stmt_bind_param($stmt2, "is", $post_category_id, $published); //"i" because post_categoryId is an integer and "is" in case it is a string. 												

        mysqli_stmt_execute($stmt2);

        mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);

        $stmt = $stmt2;

    }
 
												

while(mysqli_stmt_fetch($stmt)){
       
        
        ?>
        
          <h1 class="page-header">
                 <?php  ?>
                   
                </h1>

                <!-- First Blog Post -->
                <h2>
				 <a href="postad.php?p_id=<?php echo $post_id; ?>"><?php  echo $post_title ?></a> 
                    
                </h2>
                <p class="lead">
                  
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
             
                <hr>
                
   <?php }    } else {




            header("Location: index1.php");


   }?>

                
 </div>
</div>
<!-- /.row -->
<hr>
<?php include  "footer.php" ?>


   
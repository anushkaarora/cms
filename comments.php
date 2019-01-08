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
								<small><?php echo  $_SESSION['username'];?></small>
							</h1>
			

			
		<?php    if(isset($_GET['source'])){	
		            $source = $_GET['source']; //  to check if this parameter is available
					
					}
					 else 
					 {
						  $source = '';
					 }
					 switch($source){
						  case 'add_post';
						  include "add_postadm.php";
						  break;
						    case 'edit_post';
						  include "editadm.php";
						  break;
						   case '200';
						  echo "nice";
						  break;
						   default: 
							 include "view_comment.php"; //in case we do not get anything matching the case or the $_Get['source']
					 }
					 ?>
							  
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "footeradm.php";?>
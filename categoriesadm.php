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
                    <div class = "col-xs-6">
                        <?php
                              insert_categories();
                        ?>
						    <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title"> Add Category </label>
                                <input class="form-control" type="text" name="cat_title"/>
                            </div>
							<div class="form-group">
                                <input class=" btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
					<?php if(isset($_GET['edit'])){
						$cat_id = $_GET['edit']; 
						include "updateadm.php"; }
					?>
                    </div><!--Add Category Form -->
                    <div class = "col-xs-6">
                        <table class ="table table-bordered">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th>Category Title</th>
									<th>Delete</th>
									<th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  //find all categories query
                                        find();
                                
                                ?>
									<?php //delete query
										  delete();
									
						   ?> 
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include "footeradm.php";?>
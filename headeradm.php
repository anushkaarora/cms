<?php ob_start(); // requests that are sent to the buffer through this function or the requests that we made to the body is sent through this function ?>  
<?php include "db.php";?>
<?php session_start(); ?>
<?php include "functionadm.php";?>

<?php 
// preventing certain users to get into admin.


 if(!isset($_SESSION['user_role'])){   //reading the session row.
	 
		   header("Location: index1.php");
 }
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	
    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
   <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
	
		<link href="styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	


 
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 
 
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.3/classic/ckeditor.js"></script>

	
</head>

<body>                             
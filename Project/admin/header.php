

<?php
if(!($_SESSION['admin']))
{	
	echo "<script> 
		window.location='admin';
	</script>";
}	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	
	<!--
	1 Include jquery File  
	-->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<!--
	2 Include these two files 
	-->
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	
	<script>
	$(document).ready(function() 
	{
		$('#table').DataTable();
	} );
</script>


</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard">Medical</a>
            </div>

            <div class="header-right">

                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="admin_logout" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                Jhon Deo Alex
                            <br />
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="dashboard"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Category <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="add_cate"><i class="fa fa-table"></i>Add Category</a>
                            </li>
							 <li>
                                <a href="manage_cate"><i class="fa fa-table"></i>Manage Category</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-shopping-cart"></i>Products <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="add_prod"><i class="fa fa-table"></i>Add Products</a>
                            </li>
							 <li>
                                <a href="manage_prod"><i class="fa fa-table"></i>Manage Products</a>
                            </li>
                        </ul>
                    </li>
					  
                    <li>
                        <a href="manage_cust"><i class="fa fa-user "></i>Customer </a>   
                    </li>
					<li>
                        <a href="#"><i class="fa fa-user "></i>Employee <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="add_emp"><i class="fa fa-table"></i>Add Employee</a>
                            </li>
							 <li>
                                <a href="manage_emp"><i class="fa fa-table"></i>Manage Employee</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="manage_feed"><i class="fa fa-user "></i>Feedback </a>   
                    </li>
					<li>
                        <a href="manage_cont"><i class="fa fa-user "></i>Contacts </a>   
                    </li>
                    
                </ul>

            </div>

        </nav>
		
<?php  
require_once ("../db.php");

$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);

session_start();
if(!isset($_SESSION['student_login'])){
    header("Location:sign-in.php");
}
$student_id =  $_SESSION['student_id'];
$student_fristname =  $_SESSION['first_name'];
?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMs/Dashdoard</title>
    <link rel="icon" href="../images/icon.jpg" type="img">

    <!--
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    
    --load progress bar-->


    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">

    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">

    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>LMS</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                <!--<div class="header-section hidden-xs" id="notice-headerbox">

                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="badge x-danger b-rounded">7</span>

                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>

                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                <div class="text">
                                                    <span class="title">Error</span>
                                                    <span class="subtitle">sevidor C down</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                <div class="text">
                                                    <span class="title">New Configuration</span>
                                                    <span class="subtitle"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                <div class="text">
                                                    <span class="title">14 Task</span>
                                                    <span class="subtitle">completed</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                <div class="text">
                                                    <span class="title">21 Menssage</span>
                                                    <span class="subtitle"> (see more)</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>-->
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="../assets/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= $student_fristname; ?></span>
                            <span class="user-profile">Student</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="javascript:avoid(0)" data-toggle="modal" data-target="#viewProfile<?php echo $student_id; ?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item':'';?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?= $page == 'books.php' ? 'active-item':'';?>"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i><span>Books</span></a></li>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!--View user profile-->

            <?php 
      $query = "SELECT * FROM students WHERE id = '$student_id'";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $name = "$first_name $last_name";
                                    $roll = $row['roll'];
                                    $reg_no = $row['reg_no'];
                                    $email = $row['email'];
                                    $username = $row['username'];
                                    $phone = $row['phone'];
                                    $image = $row['image'];
                                    
                                    
?>
            <!-- Modal -->
            <div class="modal fade" id="viewProfile<?php echo $student_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-info">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>User Profile</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">

                                <tr>
                                    <th>Name</th>
                                    <td><?= $name; ?></td>
                                </tr>
                                <tr>
                                    <th>Roll</th>
                                    <td><?= $roll; ?></td>
                                </tr>

                                <tr>
                                    <th>Reg No</th>
                                    <td><?=  $reg_no; ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $username ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $email; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?=  $phone; ?></td>
                                </tr>
                            </table>
                            <a href="javascript:avoid(0)" data-dismiss="modal" class="btn btn-warning" data-toggle="modal" data-target="#profile-update<?= $student_id; ?>"><i class="fa fa-pencil"></i> Edit profile</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>




            <!--update-profile-->

            <?php 
      $query = "SELECT * FROM students WHERE id = '$student_id' ";
                                $result = mysqli_query($db, $query);
                               $row = mysqli_fetch_assoc($result);
                                   $id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $name = "$first_name $last_name";
                                    $roll = $row['roll'];
                                    $reg_no = $row['reg_no'];
                                    $email = $row['email'];
                                    $username = $row['username'];
                                    $phone = $row['phone'];
                                    $image = $row['image'];
                                    
?>
            <!-- Modal -->
            <div class="modal fade" id="profile-update<?= $student_id; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-info">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-info-label"><i class="fa fa-user"></i> Update Profile Information</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="book_name">Name</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $name; ?>" required>
                                                    <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_name">Roll</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $roll; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_name">Reg No</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $reg_no; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_name">Username</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $username; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_name">Email</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $email; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_name">Phone</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $phone; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" name="update_book"><i class="fa fa-save"></i> Update</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

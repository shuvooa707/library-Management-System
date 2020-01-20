<?php 

require_once ("header.php");

?>


<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">

        <div class="col-sm-12">
            <div class="row">
                <?php
                    $libraian_count_query = "SELECT * FROM libraian";
                $result = mysqli_query($db, $libraian_count_query);
                $total_libraian = mysqli_num_rows($result);
                
                ?>
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-user color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Libraian</h4>
                                        <h1 class="title color-light"><?= $total_libraian; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
                    $student_count_query = "SELECT * FROM students";
                $result = mysqli_query($db, $student_count_query);
                $total_students = mysqli_num_rows($result);
                
                ?>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                        <a href="students.php">
                            <div class="panel-content">
                                <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_students; ?> </h1>
                                <h4 class="subtitle color-darker-1">Total Students</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
                    $books_count_query = "SELECT * FROM books";
                $result = mysqli_query($db, $books_count_query);
                $total_books= mysqli_num_rows($result);
                
                $total_books_count_query = mysqli_query($db, "SELECT SUM(book_quantity) as total FROM books");
                $all_books = mysqli_fetch_assoc($total_books_count_query);
                
                $available_books_count_query = mysqli_query($db, "SELECT SUM(available_quantity) as total FROM books");
                $available_books = mysqli_fetch_assoc($available_books_count_query);
                ?>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-2 bg-darker-1">
                        <a href="manage-books.php">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <span class="icon fa fa-book color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-10">
                                        <h4 class="subtitle color-lighter-1">Total Books</h4>
                                        <h1 class="title color-light"> <?= $total_books.' ('.$all_books['total'].')-'.$available_books['total']; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>


<?php require_once ("footer.php"); ?>

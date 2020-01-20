<?php require_once ("header.php"); ?>


<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <form class="" method="post" action="">
                        <div class="row pt-md">
                            <div class="form-group col-sm-9 col-lg-10">
                                <span class="input-with-icon">
                                    <input type="text" name="searchtext" class="form-control" id="lefticon" placeholder="Search" required>
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <div class="form-group col-sm-3  col-lg-2 ">
                                <button type="submit" name="search_books" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php 
        
        if(isset($_POST['search_books'])){
            $searchtext = $_POST['searchtext'];
            
            ?>

        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <?php 
                        $result = mysqli_query($db, "SELECT * FROM books WHERE book_name LIKE '%$searchtext%'");
            if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)){
              
                       ?>

                        <div class="col-sm-3 col-md-2">
                            <img src="../images/books/<?= $row['book_image']; ?>" style="height:150px;" alt="">

                            <p style="margin-top:5px;"><b><?= $row['book_name']; ?></b></p>
                            <span style="margin-top:-7px;"><b>Available : <?= $row['available_quantity']; ?></b></span>
                        </div>
                        <?php }  }
                        
                        else{
                            ?>
                        <span style="text-align:center; color:red;"><b><?php echo "Book Not Found";?></b></span>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <?php }
        else{
            ?>

        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <?php 
                        $result = mysqli_query($db, "SELECT * FROM books");
                        while($row = mysqli_fetch_assoc($result)){
                            
                       ?>

                        <div class="col-sm-3 col-md-2">
                            <img src="../images/books/<?= $row['book_image']; ?>" style="height:150px;" alt="">

                            <p style="margin-top:5px;"><b><?= $row['book_name']; ?></b></p>
                            <span style="margin-top:-7px;"><b>Available : <?= $row['available_quantity']; ?></b></span>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>


        <?php } ?>



    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>


<?php require_once ("header.php"); ?>

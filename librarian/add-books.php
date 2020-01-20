<?php 

require_once ("header.php");


if(isset($_POST['save_book'])){
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_quantity = $_POST['book_quantity'];
    $available_quantity = $_POST['available_quantity'];
    $libraian_username = $_SESSION['libraian_username'];
    
    $book_image = $_FILES['book_image']['name'];
    $tmp_book_image = $_FILES['book_image']['tmp_name'];
    $path = "../images/books/";
    
    
    $query = "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_quantity`, `available_quantity`, `libraian_username`) VALUES ('$book_name', '$book_image', '$book_author_name', '$book_publication_name', '$book_purchase_date', '$book_price', '$book_quantity', '$available_quantity', '$libraian_username')";
    
    $result = mysqli_query($db, $query);
    if($result){
        move_uploaded_file($tmp_book_image, $path.$book_image);
        $success = "Book has been Added";
    }
    else{
        $error = "Something went Worng";
    }
    
}


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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="">Add Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <?php
                    if(isset($success)){
                        ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success; ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($error)){
                        ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                        <h5 class="mb-lg">Add Book</h5>
                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="book_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" id="book_image" name="book_image" placeholder="book_image" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="book_author_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" class="col-sm-4 control-label">Publication Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="book_publication_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="ddd---yyy">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-4 control-label">Price</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_price" name="book_price" placeholder="book_price" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_quantity" class="col-sm-4 control-label">Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_quantity" name="book_quantity" placeholder="book_quantity" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_quantity" class="col-sm-4 control-label">Available Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="available_quantity" name="available_quantity" placeholder="available_quantity" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save">

                                                    </i> Add Book</button>
                                            </div>
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
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>


<?php require_once ("footer.php"); ?>

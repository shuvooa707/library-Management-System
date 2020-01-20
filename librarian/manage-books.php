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
                <li><a href="">Manage Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Books</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Author Name</th>
                                    <th>Book Image</th>
                                    <th>Publication Name</th>
                                    <th>Publication Date</th>
                                    <th>Book Price</th>
                                    <th>Book Quantity</th>
                                    <th>Available Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
      $query = "SELECT * FROM books";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $book_name = $row['book_name'];
                                    $author_name = $row['book_author_name'];
                                    $book_image = $row['book_image'];
                                    $publicatio_name = $row['book_publication_name'];
                                    $purchase_date = $row['book_purchase_date'];
                                    $book_price = $row['book_price'];
                                    $book_quantity = $row['book_quantity'];
                                    $available_quantity = $row['available_quantity'];
                               
                                ?>

                                <tr>
                                    <td><?= $book_name; ?></td>
                                    <td><?= $author_name; ?></td>
                                    <td><img style="height:100px;" src="../images/books/<?= $book_image; ?>" alt=""></td>
                                    <td><?=  $publicatio_name; ?></td>
                                    <td><?= date('d-M-y', strtotime($purchase_date)) ?></td>
                                    <td><?= $book_price; ?></td>
                                    <td><?=  $book_quantity; ?></td>
                                    <td><?=  $available_quantity; ?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id']; ?>"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#book-update<?= $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                        <a href="delete.php?deletebook=<?= base64_encode($id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
                                    </td>

                                    <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>

<?php 
      $query = "SELECT * FROM books";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $book_name = $row['book_name'];
                                    $author_name = $row['book_author_name'];
                                    $book_image = $row['book_image'];
                                    $publication_name = $row['book_publication_name'];
                                    $purchase_date = $row['book_purchase_date'];
                                    $book_price = $row['book_price'];
                                    $book_quantity = $row['book_quantity'];
                                    $available_quantity = $row['available_quantity'];
                                    
?>
<!-- Modal -->
<div class="modal fade" id="book-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>

                        <th>Book Name</th>
                        <td><?= $book_name; ?></td>
                    </tr>
                    <tr>
                        <th>Author Name</th>
                        <td><?= $author_name; ?></td>
                    </tr>
                    <tr>
                        <th>Book Image</th>
                        <td><img style="height:100px;" src="../images/books/<?= $book_image; ?>" alt=""></td>
                    </tr>
                    <tr>
                        <th>Publication Name</th>
                        <td><?=  $publication_name; ?></td>
                    </tr>
                    <tr>
                        <th>Purchase Date</th>
                        <td><?= date('d-M-y', strtotime($purchase_date)) ?></td>
                    </tr>
                    <tr>
                        <th>Book Price</th>
                        <td><?= $book_price; ?></td>
                    </tr>
                    <tr>
                        <th>Book Quantity</th>
                        <td><?=  $book_quantity; ?></td>
                    </tr>
                    <tr>
                        <th>Available Quantity</th>
                        <td><?=  $available_quantity; ?></td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<!-- book update -->



<?php 
      $query = "SELECT * FROM books ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $book_name = $row['book_name'];
                                    $author_name = $row['book_author_name'];
                                    $book_image = $row['book_image'];
                                    $publication_name = $row['book_publication_name'];
                                    $purchase_date = $row['book_purchase_date'];
                                    $book_price = $row['book_price'];
                                    $book_quantity = $row['book_quantity'];
                                    $available_quantity = $row['available_quantity'];
                                    
?>
<!-- Modal -->
<div class="modal fade" id="book-update<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Update Book Information</h4>
            </div>
            <div class="modal-body">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="book_name">Book Name</label>
                                        <input type="text" class="form-control" id="book_name" name="book_name" value="<?= $book_name; ?>" placeholder="Book Name" required>
                                        <input type="hidden" class="form-control" name="id" value="<?= $id; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="author_name">Author Name</label>
                                        <input type="text" class="form-control" id="author_name" name="author_name" value="<?= $author_name; ?>" placeholder="Author Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="publication_name">Publication Name</label>
                                        <input type="text" class="form-control" id="publication_name" name="publication_name" value="<?= $publication_name; ?>" placeholder="Publication Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_date">Purchase Date</label>
                                        <input type="text" class="form-control" id="purchase_date" name="purchase_date" value="<?= $purchase_date; ?>" placeholder="ddd---yyy">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" value="<?= $book_price; ?>" placeholder="Price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $book_quantity; ?>" placeholder="Quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="available_quantity">Available Quantity</label>
                                        <input type="number" class="form-control" id="available_quantity" name="available_quantity" value="<?= $available_quantity; ?>" placeholder="Available Quantity" required>
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

<?php } ?>

<?php 

if(isset($_POST['update_book'])){
    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $publication_name = $_POST['publication_name'];
    $purchase_date = $_POST['purchase_date'];
    $book_price = $_POST['price'];
    $book_quantity = $_POST['quantity'];
    $available_quantity = $_POST['available_quantity'];
    
    
     $query = "UPDATE books SET book_name ='$book_name', book_author_name ='$author_name', book_publication_name ='$publication_name', book_purchase_date ='$purchase_date', book_price ='$book_price', book_quantity ='$book_quantity', available_quantity ='$available_quantity' WHERE id= '$id' ";
    
    $result = mysqli_query($db, $query);
    if($result){
        ?>
<script type="text/javascript">
    alert('Book Updated Successfully');
    javascript: history.go(-1);

</script>

<?php
    }
    else{
        ?>
<script type="text/javascript">
    alert('Book not Updated');

</script>

<?php
    }
}


?>



<?php require_once ("footer.php"); ?>

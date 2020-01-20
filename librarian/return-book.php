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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="">Return Books</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Return Books</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Phone</th>
                                    <th>Book Name</th>
                                    <th>Book Image</th>
                                    <th>Book Issue Date</th>
                                    <th>Return Book</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
      $query = "SELECT issue_book.id, issue_book.book_id, issue_book.book_issue_date, students.first_name, students.last_name, students.roll, students.phone, books.book_image, books.book_name FROM issue_book
      INNER JOIN students ON students.id = issue_book.student_id
      INNER JOIN books ON books.id = issue_book.book_id WHERE issue_book.book_return_date = '' ";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $name = "$first_name $last_name";
                                     $roll = $row['roll'];
                                     $phone = $row['phone'];
                                     $book_name = $row['book_name'];
                                     $book_image = $row['book_image'];
                                     $book_issue_date = $row['book_issue_date'];
                                    
                               
                                ?>

                                <tr>
                                    <td><?= $name; ?></td>
                                    <td><?= $roll; ?></td>
                                    <td><?= $phone; ?></td>
                                    <td><?= $book_name; ?></td>

                                    <td><img src="../images/books/<?= $book_image; ?>" style="height:40px;" alt=""></td>
                                    <td><?= date('d-M-Y', strtotime($book_issue_date)); ?></td>
                                    <td><a href="return-book.php?id=<?= base64_encode($row['id']); ?> & book_id=<?= base64_encode($row['book_id']); ?>" class="btn btn-info">Retutn Book</a></td>
                                </tr>
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
if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $book_id = base64_decode($_GET['book_id']);
    $date = date('d-m-y');
    
    $query = "UPDATE issue_book SET book_return_date = '$date' WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    if($result){
         mysqli_query($db, "UPDATE books SET available_quantity = available_quantity + 1 WHERE id = '$book_id'");
        ?>
<script type="text/javascript">
    alert('Book Return Successfully');
    javascript: history.go(-1);

</script>
<?php
    }
    else{
       ?>
<script type="text/javascript">
    alert('Somethink Wrong!');

</script>
<?php
    }
}

?>


<?php require_once ("footer.php"); ?>

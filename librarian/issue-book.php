<?php 

require_once ("header.php");

if(isset($_POST['issue_book'])){
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];
    
    $result = mysqli_query($db, "INSERT INTO issue_book (student_id, book_id, book_issue_date) VALUES ('$student_id', '$book_id', '$book_issue_date') ");
       
    if($result){
        mysqli_query($db, "UPDATE books SET available_quantity = available_quantity - 1 WHERE id = '$book_id'");
        
        ?>
<script type="text/javascript">
    alert('Book issued Successfully');

</script>

<?php
    }
    else{
        ?>
<script type="text/javascript">
    alert('Book issued Successfully');

</script>

<?php
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
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="#">Issue Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">

        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline" method="post">
                                <div class="form-group">


                                    <select class="form-control" name="student_id" id="">
                                        <option value="">-- Select --</option>
                                        <?php 
      $query = "SELECT * FROM students WHERE status ='1'";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <option value="<?= $row['id']; ?>"><?= ucfirst($row['first_name']).' '.ucfirst($row['last_name']).' -- ( '.$row['roll'].' )'?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="search">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php 
                    if(isset($_POST['search'])){
                        $id = $_POST['student_id'];
                        
                        $query ="SELECT * FROM students WHERE id ='$id' AND status = '1'";
                        $result = mysqli_query($db, $query);
                        if(mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_assoc($result);
                           
                        } ?>

                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">
                                        <h5 class="mb-md ">Issue your book & collect it !</h5>
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= ucfirst($row['first_name']).' '.ucfirst($row['last_name'])?>" readonly>
                                            <input type="hidden" name="student_id" value="<?= $row['id'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Book Name</label>
                                            <select class="form-control" name="book_id" id="">
                                                <option value="">-- Select --</option>
                                                <?php 
      $query = "SELECT * FROM books WHERE available_quantity > '0'";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['book_name']; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Book Issue date</label>
                                            <input type="text" class="form-control" name="book_issue_date" value="<?= date('d-m-y'); ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="issue_book">Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>


<?php require_once ("footer.php"); ?>

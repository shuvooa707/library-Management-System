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
                <li><a href="">Students</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">

            <h4 class="section-subtitle"><b>All Students</b></h4>

            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>RegNo</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
      $query = "SELECT * FROM students";
                                $result = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id= $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $name = "$first_name $last_name";
                                     $roll = $row['roll'];
                                     $reg_no = $row['reg_no'];
                                     $email = $row['email'];
                                     $username = $row['username'];
                                     $phone = $row['phone'];
                                     $image = $row['image'];
                                     $status = $row['status'];
                               
                                ?>

                                <tr>
                                    <td><?= $name; ?></td>
                                    <td><?= $roll; ?></td>
                                    <td><?= $reg_no; ?></td>
                                    <td><?= $email; ?></td>
                                    <td><?= $username; ?></td>
                                    <td><?= $phone; ?></td>
                                    <td><img src="<?= $image; ?>" alt=""></td>
                                    <td><?= $status == 1 ? 'Active':'Inactive'; ?></td>
                                    <td>
                                        <?php 
                                        if($status == 1){
                                            ?>
                                        <a href="status-inactive.php?id=<?= base64_encode($id); ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                        <?php        
                                        }else{
                                            ?>
                                        <a href="status-active.php?id=<?= base64_encode($id); ?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                        <?php
                                        }
                                        ?>


                                    </td>

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


<?php require_once ("footer.php"); ?>

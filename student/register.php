<?php 
require_once ("../db.php");

session_start();
if(isset($_SESSION['student_login'])){
    header("Location:index.php");
}

$first_name = $last_name = $roll = $reg_no = $phone = $email = $username =  $password = "";
$first_nameErr = $last_nameErr = $rollErr = $reg_noErr = $phoneErr = $emailErr = $usernameErr =  $passwordErr = "";
$msg = $error = "";



if(isset($_POST['register'])){
    
    
    if(empty($_POST['first_name'])){
        $first_nameErr = "First name is required";
    }
    else{
         $first_name = ucfirst($_POST['first_name']);
    }
    
    if(empty($_POST['last_name'])){
        $last_nameErr = "Last name is required";
    }
    else{
         $last_name = ucfirst($_POST['last_name']);
    }
    
    if(empty($_POST['roll'])){
        $rollErr = "Roll is required";
    }
    else{
         $roll = $_POST['roll'];
    }
    
    if(empty($_POST['reg_no'])){
        $reg_noErr = "RegNo is required";
    }
    else{
         $reg_no = $_POST['reg_no'];
    }
    
    if(empty($_POST['phone'])){
        $phoneErr = "PhoneNo. is required";
    }
    else{
        $phone = $_POST['phone'];
    }
    
    if(empty($_POST['email'])){
        $emailErr = "Email is required";
    }
    else{
          $email = $_POST['email'];
    }
    
    if(empty($_POST['username'])){
        $usernameErr = "Username is required";
    }
    else{
        $username = $_POST['username'];
    }
    
    if(empty($_POST['password'])){
        $passwordErr = "Create your password";
    }
    else{
          $password = md5($_POST['password']);
    }
    
    


     
           $query = "INSERT INTO students(first_name, last_name, roll, reg_no, email, username, password, status, phone)             VALUES ('$first_name', '$last_name', '$roll', '$reg_no', '$email', '$username', '$password', '0',  '$phone')";      
    
          if(mysqli_query($db, $query)){
                $msg = "Registration Successful";
              $first_name = $last_name = $roll = $reg_no = $phone = $email = $username =  $password = "";
  
          }
     
   
}

?>




<!doctype html>
<html lang="en" class="fixed accounts sign-in">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMs/Student Registration</title>
    <link rel="icon" href="../images/icon.jpg" type="img">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">


    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">

                <h1 class="text-center">LMS Registration</h1>
            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form action="" method="post">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:green"><?php if(isset($msg)) echo $msg; ?></span>
                                    <span class="pull-right" style="color:red"><?php if(isset($error)) echo $error; ?></span><br>
                                    <span class="pull-right" style="color:red"><?php echo $first_nameErr; ?></span>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>" placeholder="First Name">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $last_nameErr; ?></span>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $rollErr; ?></span>
                                    <input type="text" class="form-control" name="roll" value="<?php echo $roll; ?>" placeholder="Roll" pattern="[0-9]{6}">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $reg_noErr; ?></span>
                                    <input type="text" class="form-control" name="reg_no" value="<?php echo $reg_no; ?>" placeholder="Reg No" pattern="[0-9]{6}">
                                    <i class="fa fa-list"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $phoneErr; ?></span>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="017***" pattern="01[1|3-9][0-9]{8}">
                                    <i class="fa fa-phone"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $emailErr; ?></span>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $usernameErr; ?></span>
                                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Username">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php echo $passwordErr; ?></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
                            </div>
                            <div class="form-group text-center">
                                Have an account?, <a href="sign-in.php">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="../assets/javascripts/template-script.min.js"></script>
    <script src="../assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->

</html>

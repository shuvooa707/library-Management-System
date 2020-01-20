<?php 

require_once ("../db.php");

session_start();
if(isset($_SESSION['libraian_login'])){
    header("Location:index.php");
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $query = "SELECT * FROM libraian WHERE email = '$email' or username = '$email'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_assoc($result);
        if($row['password'] == $password){
                $_SESSION['libraian_login'] = $email;
                $_SESSION['libraian_username'] = $row['username'];
                header("location:index.php");
        }
        else {
             $passError = "Incorrect Password";
        }
    }
    else{
        $error = "Email or Username Invalid";
    }
  
    
}

?>




<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMs/libraianSignUp</title>
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
                <h1 class="text-center">LMS libraian logIn</h1>
            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <center> <span style="color:red"><?php if(isset($inactiveStatus)) echo $inactiveStatus; ?></span></center>
                                    <span class="pull-right" style="color:red"><?php if(isset($error)) echo $error; ?></span>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php if( isset($email)) echo $email;?>" placeholder="Email">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <span class="pull-right" style="color:red"><?php if(isset($passError)) echo $passError ; ?></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="login" value="Log In">
                            </div>
                            <div class="form-group text-center">
                                <a href="pages_forgot-password.html">Forgot password?</a>
                                <hr />

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
    <script src="vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="javascripts/template-script.min.js"></script>
    <script src="javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:37 GMT -->

</html>

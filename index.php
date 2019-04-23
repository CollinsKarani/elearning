<?php
session_start();
require_once('config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Login - Elearning System </title>

<!-- Bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Template style -->
<link rel="stylesheet" href="assets/dist/css/style.css">
<link rel="stylesheet" href="assets/et-line-font/et-line-font.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="assets/dist/weather/weather-icons.min.css">
<link type="text/css" rel="stylesheet" href="assets/dist/weather/weather-icons-wind.min.css">
	<!-- notification  -->
<link href="public/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
 <style>
 .required,.error{
     color: #CC0000;
 }

 </style>
<body class="body-bg-color">
<div class="wrapper">
  <div class="form-body">

     <?php

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $check =$conn->query("SELECT * FROM tbl_login WHERE username='$username' AND password='$password'");
        $row = mysqli_fetch_assoc($check);
        $count = mysqli_num_rows($check);
        if($count>0){
              if($row['role_id']==1){
                  $_SESSION['id']=$row['id'];
                  $_SESSION['admin']=$row['username'];
                  $_SESSION['role_session']= $row['role_id'];

                    header('Location: admin/dashboard');
         	$conn->query("INSERT into user_log (username,login_date,user_id)values('$username',NOW(),".$row['id'].")");

		    }
             else if($row['role_id']==3){
                  $_SESSION['id']=$row['id'];
                  $_SESSION['student']=$row['username'];
                  $_SESSION['role_session']= $row['role_id'];
		            //echo 'true_student';
                    header('Location: student/dashboard_student');
         	   $conn->query("INSERT into user_log (username,login_date,user_id)values('$username',NOW(),".$row['id'].")");

		    }
            else if($row['role_id']==2){
                $_SESSION['id']=$row['id'];
                $_SESSION['instructor']= $row['username'];
                $_SESSION['role_session']= $row['role_id'];
                 header('Location: instructor/dashboard');
		       // echo 'true';
               	$conn->query("INSERT into user_log (username,login_date,user_id)values('$username',NOW(),".$row['id'].")");
            }
        }
        else{
              echo '<div class="alert alert-danger">Wrong details provided. </div>';
        }
    }
    ?>
    <form  id="login_form1" class="col-form" method="post">
    <div class="col-logo"><a href="index.php"><img alt="" src="assets/images/l.png" width="140px;" height="120px;"></a></div>

    <header>MMUST E-learning Portal</header>

      <fieldset>
        <section>
          <div class="form-group has-feedback">
            <label class="control-label">Username: <span class="required">*</span></label>
            <input class="form-control" required="required" id="username" name="username" placeholder="Registration/ PF Number" type="text">
            <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span> </div>
        </section>
        <section>
          <div class="form-group has-feedback">
            <label class="control-label">Password: <span class="required">*</span></label>
            <input class="form-control" required="required" placeholder="Password" type="password"  id="password" name="password">
            <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span> </div>
        </section>
        <section>
          <div class="row">
            <div class="col-md-6 checkbox"> <a href="forgot_password" class="modal-opener">Forgot password?</a> </div>
            <div class="col-md-6 text-right">
              <label class="checkbox">
                <input name="remember" checked="" type="checkbox">
                <i></i>Keep me logged in</label>
            </div>
          </div>
        </section>
      </fieldset>
      <footer class="text-right">
        <button type="submit" class="btn btn-info  pull-left"  id="signin" name="login"><i class="glyphicon glyphicon-lock"></i> Login</button>
        <a href="user_register" class="button button-secondary  pull-right">Register</a> </footer>

    </form>

  </div>
</div>
<!-- wrapper -->

<!-- jQuery -->
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dist/js/ovio.js"></script>
</body>

</html>
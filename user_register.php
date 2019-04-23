<?php
  require_once('config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Register-  MMUST Elearning Portal</title>

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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <style>
  .error,.required{
      color: #CC0000;
  }

  </style>
<body class="body-bg-color">
<div class="wrapper">
  <div class="form-body">
      <?php
        if(isset($_POST['register'])){
            $username= $_POST['reg'];
            $password = $_POST['password1'];
            $check = $conn->query("SELECT * FROM tbl_login WHERE username='$username'");
            $count=mysqli_num_rows($check);
            if($count>0){
                $update= $conn->query("UPDATE tbl_login SET password='$password' WHERE username='$username'");
               echo "<div class='alert alert-success'><strong>Congratulations!! </strong>Your account has been activated.</div> ";
            }
            else{
               echo "<div class='alert alert-danger'><strong> Sorry!!!</strong> Wrong details. Visit our ICT Office</div> ";
            }
        }
      ?>
    <form class="col-form" method="post" id="myForm4" novalidate>
    <div class="col-logo"><a href="index.php"><img alt="" src="assets/images/l.png" width="140px;" height="120px;"></a></div>
      <header>MMUST E-learning Portal</header>
      <fieldset>
        <section>
          <div class="form-group has-feedback">
            <label class="control-label">Registration Number:</label>
            <input class="form-control" name="reg" id="reg" placeholder="Registration Number" required="required" type="text">
            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
        </section>

        <section>
          <div class="form-group has-feedback">
            <label class="control-label">Password</label>
            <input class="form-control" name="password1" id="password1" placeholder="Password" type="password">
            <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span> </div>
        </section>
         <section>
          <div class="form-group has-feedback">
            <label class="control-label">Confirm Password:</label>
            <input class="form-control" name="password2" id="password2" placeholder="Confirm Password" type="password">
            <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span> </div>
        </section>
        <section>
          <div class="row">
            <div class="col-md-12 text-center">
              <label class="checkbox">
                <input name="remember" checked="" type="checkbox">
                <i></i>Agree the terms and policy </label>
            </div>
          </div>
        </section>
      </fieldset>
      <footer class="text-right">
        <button type="submit" name="register" class="btn btn-info pull-left">Activate</button>
        <a href="index.php" class="button button-secondary">Login</a> </footer>
    </form>
  </div>
</div>
<!-- wrapper --> 

<!-- jQuery --> 
<script src="assets/dist/js/jquery.min.js"></script>
 <script src="public/js/jquery.validate.js"></script>
 <script src="public/js/additional-methods.js"></script>
 <script src="public/js/form-validator.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/dist/js/ovio.js"></script>
</body>

</html>
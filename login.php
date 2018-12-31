<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK AHP | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/lte/bootstrap/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/lte/dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
  <?php
  session_start();

  include 'php-file/koneksi.php';
  if(!empty($_SESSION['username'])){
    header("location:index.php") ;
  }

  //proses-cek-login
 if (isset($_POST['proses-login'])) {
   $username = trim($_POST['username']);
   $password = md5(trim($_POST['password']));

   if ($username=="" || $password=="") {
     $error="Username and Password is Required";
   }
   else {
     $login = $koneksi->prepare("SELECT nama, username, password FROM tbl_admin WHERE username=:username");
     $login->bindParam(':username',$username);
     $login->execute();
     $data = $login->fetch(PDO::FETCH_ASSOC);
     if (COUNT($data['username']) == 1 && $password == $data['password']) {
         $_SESSION['nama'] = $data['nama'];
         $_SESSION['username'] = $data['username'];
         header("location:index.php");
     }
     else {
       $error="Username or Password is Incorrect";
       $username = "";
       $password = "";
     }
   }
 }
  ?>
<div class="login-box">
  <div class="login-logo">
    SPK <b>AHP</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login Admin</p>
    <?php
    if (isset($error)) {
      echo  '<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>'.$error.'</strong>
             </div>' ;
    }
    ?>
    <form action="login.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 ">
          <button type="submit" class="btn btn-primary btn-block btn-flat btn-block" name="proses-login">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="assets/lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/lte/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

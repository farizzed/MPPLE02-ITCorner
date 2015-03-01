<!doctype html>

<html>
<head>
	<title>IT Corner - Forum IT Terkini!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body background="login-back.jpg" style="background-position:center">
  <div class="container">
    
    <div class="row" style="padding-top:125px;">
      <div class="col-md-4 col-md-offset-4">
        <p align="center"><img src="itcorner-hitam.png" style="align:center;"></p>
        <div class="panel panel-default outer-login">
          <div class="panel-body">
            <?php
            /*if(isset($_SERVER['HTTP_REFERER']))
            {*/
            $a=$_SERVER['HTTP_REFERER'];
            /*  if(strcmp($a,"http://localhost/itcorner.co.id/index.php") === 0)
              {
                echo "<div class='alert alert-dismissable alert-danger'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      Anda harus login terlebih dahulu!
                      </div>";
              }
            }*/

            if ($_SERVER["REQUEST_METHOD"] == "POST" && strcmp($a,"http://localhost/itcorner.co.id/login.php") === 0)
            {
              $user = $_POST['username'];
              $pass = $_POST['password'];

              if ($user == "admin" && $pass == "admin")
              {
                header('Location: home_admin.php');
              }
              elseif ($user == "farizzed" && $pass == "123")
              {
                header('Location: home_user.php');
              }
              else
              {
                echo "<div class='alert alert-dismissable alert-danger'>
                      <button type='button' class='close' data-dismiss='alert'>&times;</button>
                      ID atau Password yang Anda masukkan salah !</div>";
              }
            }

           /*if(isset($_GET['status']) && $_GET['status']=="ok")
           {
            echo "<div class='alert alert-dismissable alert-success'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Berhasil!</b> Data Telah Dimasukkan...
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> ID atau Password yang Anda masukkan salah !
            </div>";
           }*/
          ?>
          <h3> Login </h3>
          <br>
          
          <form action="" method="POST">
            <div class="form-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input class="form-control" type="text" name="username">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input class="form-control" type="password" name="password">
              </div>
            </div>
                <div class="pull-left">
                  Tidak punya akun? <a href="daftar.php">Daftar</a>
                </div>
                <div class="pull-right">
                   <button type="submit" class="btn btn-success">Login</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  </body>
  </html>
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
<body background="login-back.jpg" style="background-position:center;background-attachment:fixed">
  <div class="container">
    
    <div class="row" style="padding-top:30px;">
      <div class="col-md-4 col-md-offset-4">
      <p align="center"><img src="itcorner-hitam.png" style="align:center;"></p>
        <div class="panel panel-default outer-login">
          <div class="panel-body">
            <?php
           if(isset($_GET['status']) && $_GET['status']=="ok")
           {
            echo "<div class='alert alert-dismissable alert-success'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Berhasil!</b> Silahkan Login
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> ID atau Password yang Anda masukkan salah !
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="beda"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> Password berbeda..
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="captcha"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> Text yang dimasukkan berbeda..
            </div>";
           }
          ?>
          <h3>Daftar</h3>
          <br>
          <form action="daftarquery.php" method="POST">
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
            <div class="form-group">
              <label class="control-label">Password (Ulangi)</label>
              <div class="controls">
                <input class="form-control" type="password" name="password1">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Lengkap</label>
              <div class="controls">
                <input class="form-control" type="text" name="nama">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">E-mail</label>
              <div class="controls">
                <input class="form-control" type="text" name="email">
              </div>
            </div>
            <div class="form-group">
            <label class="control-label">Ketiklah huruf yang tertera pada gambar!</label>
              <p><img src="captcha.jpg"><br></p>
              <div class="controls">
                <input class="form-control" type="text" name="captcha">
              </div>
            </div>
                <div class="pull-left">
                  <p><a href="index.php">Halaman Utama</a> | <a href="login.php">Login</a></p>
                </div>
                <div class="pull-right">
                   
                  <input class="btn btn-success" type="submit" value="Daftar"/>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  </body>
  </html>
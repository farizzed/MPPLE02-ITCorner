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
           if(isset($_GET['status']) && $_GET['status']=="kosong")
           {
            echo "<div class='alert alert-danger'>
            <b>Gagal!</b> Silahkan isi isian dengan lengkap
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <b>Gagal!</b> Username sudah digunakan. Gunakan username yang lain
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="beda"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <b>Gagal!</b> Password yang anda isikan berbeda
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="captcha"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <b>Gagal!</b> Kode gambar yang anda masukkan salah
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="email"){
            echo "<div class='alert alert-dismissable alert-danger'>
            <b>Gagal!</b> Format email salah
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
                <input class="form-control" type="text" name="email" placeholder="email@domain.com">
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
                  <?php
                    if(isset($_GET['location']))
                    {
                      $location = $_GET['location'];
                      $ayam = str_replace("/","%2F",$location);
                      $loc = "login.php?location=" . $ayam;
                    }
                    if(isset($_GET['location']) && $_GET['location'] == '/mppl/index.php')
                    {
                      $redir = 'index.php';
                    }
                    else
                    {
                      $redir = 'home.php';
                    }
                    echo '<p> Sudah punya akun? <a href="' . $loc .'">Login</a><br><a href="'.$redir.'">&larr; Halaman Utama</a></p>';
                  ?>
                </div>
                <div class="pull-right">
                  <input class="btn btn-success btn-lg" type="submit" value="Daftar"/>
                  <?php
                    //Fungsi yang satu ini hidden dan akan melakukan passing jika tombol login ditekan
                    //Isi yang dipassing ada lokasi halaman terakhir sebelum login
                    echo '<input type="hidden" name="location" value="';
                    if(isset($_GET['location']))
                    {
                      echo htmlspecialchars($_GET['location']);
                    }
                    echo '" />';
                  ?>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  </body>
  </html>
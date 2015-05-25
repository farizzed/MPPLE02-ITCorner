<!doctype html>

<html>
<head>
	<title>Login | IT Corner - Forum IT Terkini!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(".alert").fadeOut(3000);
  </script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body background="login-back.jpg" style="background-position:center;background-attachment:fixed ">
  <div class="container">
    
    <div class="row" style="padding-top:75px;">
      <div class="col-md-4 col-md-offset-4">
        <p align="center"><img src="itcorner-hitam.png" style="align:center;"></p>
        <div class="panel panel-default outer-login" style="border-style:solid;border-color:#1DB8B1">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px;"><span class="glyphicon glyphicon-log-in"></span> Login</p>
        </div>
          <div class="panel-body">
            <?php
            session_start();

            //Mengambil parameter p dari loginhandling, untuk mencetak error proses login
            //p=1, Jika satu atau lebih isian kosong
            //p=2, Jika captcha salah
            //p=3, Jika captcha benar namun username sama password salah
            if(isset($_GET['p']))
            {
              $p = $_GET["p"];

              if($p=="1")
              {
                echo '<div class="alert alert-danger alert-dismissable fade in">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        Silahkan isi isian dengan lengkap</div>';
              }
              elseif($p=="2")
              {
                echo '<div class="alert alert-danger alert-dismissable fade in">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        Kode gambar yang anda masukkan salah</div>';
              }
              elseif($p=="3")
              {
                echo '<div class="alert alert-danger alert-dismissable fade in">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        ID atau Password yang Anda masukkan salah</div>';
              }
            }

            if(isset($_GET['alasan']))
            {
              $alasan = $_GET["alasan"];

              if($alasan=="1")
              {
                echo "<div class='alert alert-danger'>
                      Anda belum login. Silahkan login untuk menambah pertanyaan</div>";
              }
              elseif($alasan=="2")
              {
                echo "<div class='alert alert-danger'>
                      Anda belum login. Silahkan login untuk menambah artikel</div>";
              }
              elseif($alasan=="3")
              {
                echo "<div class='alert alert-danger'>
                      Anda belum login. Silahkan login untuk menambah jawaban</div>";
              }
              elseif($alasan=="4")
              {
                echo "<div class='alert alert-danger'>
                      Anda belum login. Silahkan login untuk menambah komentar</div>";
              }
              elseif($alasan=="5")
              {
                echo "<div class='alert alert-danger'>
                      Anda belum login. Silahkan login untuk mengirim pesan kepada member</div>";
              }
            }
          ?>
          <form action="loginhandling.php" method="POST">
            <div class="form-group">
              <label class="control-label">Username</label>
              <div class="controls">
                <input class="form-control" type="text" name="username" placeholder="username" <?php
                if(isset($_GET['username']))
                {
                  $user = $_GET['username'];
                  echo ' value="' . $user . '">';
                }
                else
                {
                  echo '>';
                }
                ?>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input class="form-control" type="password" name="password" placeholder="password">
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
                      $loc = "daftar.php?location=" . $ayam;
                    }
                    if(isset($_GET['location']) && $_GET['location'] == '/mppl/index.php')
                    {
                      $redir = 'index.php';
                    }
                    else
                    {
                      $redir = 'home.php';
                    }
                    echo '<p>Tidak punya akun? <a href="'. $loc .'">Daftar</a><br><a href="'.$redir.'">&larr; Halaman utama</a></p>';
                  ?>
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-check"></span> Login</button>
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
<!doctype html>

<html>
<head>
  <title>IT Corner - Forum IT Terkini!</title>
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
        <div class="panel panel-default outer-login">
          <div class="panel-body">
          <h3> Login </h3>
          <br>
          
          
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
                  <button type="submit" class="btn btn-success btn-lg">Login</button>
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
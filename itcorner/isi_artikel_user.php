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
<body>
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse outer-navbar">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          
        </div>
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
      <li>
      <img src="it_corner.png" style="padding-top:1px">
      </li>
            <li>
              <a href="home_user.php">Beranda</a>
            </li>
            <li class="active">
              <a href="list_artikel.php">Artikel</a>
            </li>
            <li>
              <a href="list_pertanyaan.php">Pertanyaan</a>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="login.php" style="color:#FFFFFF">Fariz Aulia Pradipta</a>
            </li>
            <li>
              <a href="riwayat.php">Riwayat</a>
            </li>
            <li>
              <a href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!--Isi-->
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 align="left">Memilih Smartphone Android yang Tepat Untuk Kebutuhan Anda</h3>
            <h5>Hardware | 20 Februari 2015 - 08:39 WIB | Fariz Aulia Pradipta</h5>
            <p align="left">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam 
                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. 
                Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros 
                et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum 
                soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus 
                egentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam 
                processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, 
                anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, 
                fiant sollemnes in futurum.
                <br><br>
            </p>
            <h3>Komentar</h3>
            <hr>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>Nicko Ramadhano</h4>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                  Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat..</p>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>Biandina Meidyani</h4>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
                  Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat..</p>
                </div>
              </div>
            </div>

            <!--Proses penambahan komentar-->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              $name = "Fariz Aulia Pradipta";
              $isi = ($_POST["komentar"]);
              echo '
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-body"><h4>';
                        echo $name;
                        echo '</h4><p>';
                        echo $isi;
                        echo '</p>
                  </div>
                </div>
              </div>
              ';
            }
            
            ?>

            <!--Form penambahan komentar-->
            <hr>
            <h3 align="left">Tambahkan komentar</h3>
            <hr>
            <form method="post" action="login.php">
              <fieldset disabled>
                <p align="left"><textarea name="komentar" rows="4" cols="133"> </textarea></p>
                <input class="btn btn-success" type="submit" value="Tambahkan"/>
              </fieldset>
              <p>Anda belum login. Silahkan login untuk menambahkan komentar.
              <input class="btn btn-success" type="submit" value="Login"/></p>
              <p>Belum punya akun? <a href="daftar.php">Daftar</a> sekarang juga!</p>
            </form>

            <table class="table table-hover table-bordered table-striped">
              <thead>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Footer-->
  <div class="footer outer-footer">
     <div class="container">
       <div class="row">
         <div class="col-md-3">
           <h3 style="color:white;">Tentang IT Corner</h3>
           <p style="color:white">IT corner adalah sebuah forum yang membahas informasi, pertanyaan, berita seputar teknologi informasi.</p>
        </div>
        <div class="col-md-3">
           <h3 style="color:white">Kontak Kami</h3>
          <p style="color:white">Telepon&nbsp;: +6281123456789 <br> Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: cs@itcorner.co.id</p>
          <p style="color:white"></p>
        </div>
        <div class="col-md-6">
           <h3 style="color:white;" align="right">MPPL - Kelompok E02</h3>
          <p style="color:white;font-size:15px;" align="right">Fariz Aulia Pradipta | Claudia Primasiwi | Nicko Ramadhano<br>Atika Faradina Randa | Uti Solichah | Biandina Meidyani<br><a href="#top" style="color:white;font-size:12px;" align="right">Kembali ke atas</a></p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
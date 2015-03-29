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
            <li >
              <a href="list_artikel_user.php">Artikel</a>
            </li>
            <li class="active">
              <a href="list_pertanyaan_user.php">Pertanyaan</a>
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
            <h2 align="left">Saya membutuhan sebuah harddisk external. Merek apa yang agan recommend?</h2>
            <h5>Hardware | 20 Februari 2015 - 17.55 | Fandy Ahmad</h5>
            <p align="left">
                Harddisk external yang 500GB tapi kualitas maksimal apa ya gan? Maaf gan, nubi gatau nih hehe. Sekalian kasih kisaran harganya 
                gan ye..
                <br>
            </p>
            <h3>Jawaban</h3>
            <hr>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>Atika Farahdina Randa</h4>
                  <p>Hitachi gan bagus. Cuman lumayan mahal sih sekitar 580an kalo 500GB. Tapi emang awet dan tahan lama. Kualitas? Jangan ditanya! hehe.. 
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>Nicko Ramadhano</h4>
                  <p>Saya dulu belinya seagate sih. Mahal, tapi bagus gan awet sampe sekarang umurnya udah 4 tahun. Dulu saya belinya 560k kalo USB2 
                      kalo sekarang udah banyak USB3 harganya sekitar 500-600k lah. Ane sih recommend seagate!
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h4>Biandina Meidyani</h4>
                  <p>Iya tuh seagate bagus kualitasnya! Tapi denger-denger kalo sekarang banyak yang rekomendasikan hitachi karena hitachi sudah terbukti juga
                      dan banyak testinya juga gan. Bahkan toko komputer menyarankan hitachi. Kalo mau beli hitachi aja gan. Kalo harganya sih agak mahal tapi 
                      dijamin ga nyesel deh hehe..
                  </p>
                </div>
              </div>
            </div>

            <!--Proses penambahan komentar-->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              $name = "Fariz Aulia Pradipta";
              $isi = ($_POST["jawaban"]);
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
            <h3 align="left">Tambahkan jawaban</h3>
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
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
    <!--Header-->
    <div class="navbar navbar-fixed-top navbar-inverse outer-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
        </div>
        <!--List navigation-->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
            <img src="it_corner.png" style="padding-top:1px">
            </li>
            <li>
              <a href="home.php">Beranda</a>
            </li>
            <li >
              <a href="list_artikel.php">Artikel</a>
            </li>
            <li class="active">
              <a href="list_pertanyaan.php">Pertanyaan</a>
            </li>
            <?php session_start(); include 'header.php'; ?>
        </div>
        <!--List navigation-->
      </div>
    </div>
    <!--Header-->
    
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 align="left">Kategori: Software</h3>
            <p align="left">
              <ul class="nav navbar-nav">
                <li style="margin-right: 5px;">
                <a href="list_pertanyaan_hardware.php"><img src="ram.png" width="70" height="70" title="Hardware (Perangkat Keras)"></a>
                </li>
                <li style="margin-right: 5px;">
                <a href="list_pertanyaan_software.php"><img src="software.png" width="70" height="70" title="Software (Perangkat Lunak)"></a>
                </li>
              </ul>
              <br><br><br><br>
            </p>
            <p><a href="list_pertanyaan.php">&larr; Kembali ke semua daftar pertanyaan</a></p>
            <h3 align="left">Pertanyaan Terbaru</h3>
            <hr>
            <?php
            $a=0;
            include ('connection/connect_to_oracle.php');
            $query="SELECT id_pertanyaan, judul_pertanyaan, isi_pertanyaan, username, kategori_pertanyaan, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from pertanyaan where status='1' && kategori_pertanyaan='Software' order by id_pertanyaan desc";
        $rows=mysql_query($query);
        while($row=mysql_fetch_assoc($rows))
        {
          $kode = $row['id_pertanyaan'];
          $potong_pertanyaan = substr($row['isi_pertanyaan'],0,160);
          $tanggal = $row['tanggal'];

          $day = substr($tanggal, 0, 2);
          $coba = substr($tanggal, 3, 2);
          $yeartime = substr($tanggal, 6);
          if($coba == '01')
          {
            $coba = 'Januari';
          }
          elseif($coba == '02')
          {
            $coba = 'Februari';
          }
          elseif($coba == '03')
          {
            $coba = 'Maret';
          }
          elseif($coba == '04')
          {
            $coba = 'April';
          }
          elseif($coba == '05')
          {
            $coba = 'Mei';
          }
          elseif($coba == '06')
          {
            $coba = 'Juni';
          }
          elseif($coba == '07')
          {
            $coba = 'Juli';
          }
          elseif($coba == '08')
          {
            $coba = 'Agustus';
          }
          elseif($coba == '09')
          {
            $coba = 'September';
          }
          elseif($coba == '10')
          {
            $coba = 'Oktober';
          }
          elseif($coba == '11')
          {
            $coba = 'November';
          }
          elseif($coba == '12')
          {
            $coba = 'Desember';
          }
          $format_tanggal = $day . ' ' . $coba . ' ' . $yeartime . ' WIB'; 
          //echo $potong_artikel;
          echo'
            <h3 align="left">'.$row['judul_pertanyaan'].'</h3>
            <h5>'.$row['kategori_pertanyaan'].' | '.$format_tanggal.' | '.$row['username'].'</h5>
            <p align="left">
                '.$potong_pertanyaan.' 
                <br>
                
            </p>
            <form action = "isi_pertanyaan.php" method = "get" enctype = "multipart/form-data">
            <div style="display:none;">
            </div>
            <label>
            <input type="submit" value="Read more" class="btn btn-success">
                <input class="form-control" type="hidden" name="id" value="'.$kode.'">
            </label>
            </form>
            <hr>';
            $a++;
        }
        if($a==0)
        {
          echo '<h2 align="center">- Tidak ada pertanyaan yang ditemukan pada kategori software -</h2>';
          echo '<h4 align="center"><a href="list_pertanyaan.php">Kembali ke semua daftar pertanyaan</a></h4>';
        }
            ?>
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
    
       <!--Footer-->
 </div> 
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
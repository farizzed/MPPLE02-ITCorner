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
            <li class="active">
              <a href="list_artikel.php">Artikel</a>
            </li>
            <li>
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
            <h3 align="left">Kategori: Hardware</h3>
            <p align="left">
              <ul class="nav navbar-nav">
                <li style="margin-right: 5px;">
                <a href="list_artikel_hardware.php"><img src="ram.png" width="70" height="70" title="Hardware (Perangkat Keras)"></a>
                </li>
                <li style="margin-right: 5px;">
                <a href="list_artikel_software.php"><img src="software.png" width="70" height="70" title="Software (Perangkat Lunak)"></a>
                </li>              
                
</ul>
              <br><br><br><br>
            </p>
            <p><a href="list_artikel.php">&larr; Kembali ke semua daftar artikel</a></p>
            <h3 align="left">Artikel Hardware</h3>
            <hr>
            <?php
            include ('connection/connect_to_oracle.php');
            $a=0;
            $query="SELECT id_artikel, judul_artikel, isi_artikel, username, kategori_artikel, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from artikel where status='1' AND kategori_artikel='Hardware' order by id_artikel desc";
        $rows=mysql_query($query);
        while($row=mysql_fetch_assoc($rows))
        {
          $kode = $row['id_artikel'];
          $potong_artikel = substr($row['isi_artikel'],0,160);
          $potong_tanggal = substr($row['tanggal'],0,16); 
          echo'
            <h3 align="left">'.$row['judul_artikel'].'</h3>
            <h5>'.$row['kategori_artikel'].' | '.$potong_tanggal.' | '.$row['username'].'</h5>
            <p align="left">
                '.$potong_artikel.' 
                <br>
                
            </p>
            <form action = "isi_artikel.php" method = "post" enctype = "multipart/form-data">
            <div style="display:none;">
            <input class="form-control" type="text" name="id" value="'.$kode.'">
            </div>
            <label>
            <input type="submit" name="konfirmasi" value="Read more" class="btn btn-success">
            </label>
            </form>
            
            <hr>';
            $a++;
        }
        if($a==0)
        {
          echo '<h2 align="center">- Tidak ada pertanyaan yang ditemukan pada kategori hardware -</h2>';
          echo '<h4 align="center"><a href="list_artikel.php">Kembali ke semua daftar artikel</a></h4>';
        }
            ?>
            <hr>
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
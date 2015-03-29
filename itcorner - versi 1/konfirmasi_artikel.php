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
            <li>
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
        <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
             
            <h4>Kelola artikel</h4>
            <p>Apa yang akan anda lakukan terhadap artikel ini?</p>
            <?php 
              include ('connection/connect_to_oracle.php');
              $apa = $_GET['id'];
              $query = "select * from artikel where id_artikel = '$apa' ";
              $hasil = mysql_query($query,$koneksi);
              $baris = mysql_fetch_array($hasil);
              $judul = $baris['judul_artikel'];
              $user = $baris['username'];
              $tgl = $baris['tanggal'];
              $isi = $baris['isi_artikel'];
              $kat = $baris['kategori_artikel'];
              $idini = $baris['id_artikel'];

              //Format tanggal
              $tahun = substr($tgl, 0, 4);
              $coba = substr($tgl, 5, 2);
              $day = substr($tgl, 8, 2);
              $time = substr($tgl, 11);
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
              $format_tanggal = $day . ' ' . $coba . ' ' . $tahun . ' ' . $time . ' WIB';

              echo "<a href='konfirmasi.php'><button type='button' class='btn btn-info'>Kembali</button></a>
              &nbsp;
              <a onclick='doConfirmKonfir()'><button type='button' class='btn btn-primary'>Konfirmasi</button></a>
              &nbsp;
              <a onclick='doConfirmHapus()'><button type='button' class='btn btn-danger'>Hapus</button></a>
              <hr>";
              echo '<script type="text/javascript">
                function doConfirmKonfir() 
                {
                     if(confirm("Apakah anda yakin ingin mengkonfirmasi artikel ini?"))
                     {
                        window.location.href = "konfirmasi_action.php?id='.$idini.'";
                     }
                }
                function doConfirmHapus() 
                {
                     if(confirm("Apakah anda yakin ingin menghapus artikel ini?"))
                     {
                        window.location.href = "konfirmasi_delete.php?id='.$idini.'";
                     }
                }
              </script>';
              
              echo "<h2 align='left'>"."$judul"."</h2>";
              echo "<h5>"."$kat"." | "."$format_tanggal"." |"."$user"."</h5>";
              echo "<p align='left'>"."$isi"."
                  
                  <br>
              </p>";
              ?>
          </div>
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
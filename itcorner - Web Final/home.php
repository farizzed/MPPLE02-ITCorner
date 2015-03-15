<!doctype html>

<html>
<head>
	<title>IT Corner - Forum IT Terkini!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(".alert").fadeOut(3000);
  </script>
</head>
<body>
  <!--Container-->
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
            <li class="active">
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

    <!--Content-->
    <div class="row" style="padding-top:50px;">
      <br>
      &nbsp;&nbsp;
      <?php
        if(empty($_SESSION['nama']))
        {
            echo '<a href="login.php?location=tambah_pertanyaan.php&alasan=1" <button type="button" class="btn btn-primary btn-lg">Tanyakan Disini</button></a>&nbsp;';
            echo '<a href="login.php?location=tambah_artikel.php&alasan=2" <button type="button" class="btn btn-primary btn-lg">Buat Artikel</button></a>';
        }
        elseif($_SESSION['nama'] != "Admin")
        {
            echo '<a href="tambah_pertanyaan.php" <button type="button" class="btn btn-primary btn-lg">Tanyakan Disini</button></a>&nbsp;';
            echo '<a href="tambah_artikel.php" <button type="button" class="btn btn-primary btn-lg">Buat artikel</button></a>';
        }


           if(isset($_GET['status']) && $_GET['status']=="ok")
           {
            echo "<br><br><div class='alert alert-dismissable alert-success fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Penambahan konten berhasil!</b> Konten anda akan dikonfirmasi oleh admin. Cek pada <a href='riwayat.php'>riwayat anda</a> pada tabulasi konten dalam konfirmasi.
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="hapus")
           {
            if(isset($_GET['aksi']))
            {
              echo "<br><br><div class='alert alert-dismissable alert-success fade in'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    ".$_GET['aksi']." berhasil dihapus
                    </div>";
            }
           }
           else
           {
            echo "<br><br>";
           }
      ?>
      <div class="col-md-6 ">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3>Artikel Terbaru</h3>
            <hr>
            <?php 
            include ('connection/connect_to_oracle.php');
            $query="SELECT a.id_artikel, u.nama, a.judul_artikel, a.isi_artikel, a.kategori_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') as tanggal from artikel as a, user as u where a.status='1' AND a.username=u.username order by id_artikel desc";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
              $kode = $row['id_artikel'];
              $potong_artikel = substr($row['isi_artikel'],0,160);
              $tanggal = $row['tanggal'];
              //Format tanggal
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

              echo'
                <h3 align="left">'.$row['judul_artikel'].'</h3>
                <h5>'.$row['kategori_artikel'].' | '.$format_tanggal.' | '.$row['nama'].'</h5>
                <p align="left">
                  '.$potong_artikel.' 
                <br>              
                </p>
                <form action = "isi_artikel.php" method = "get" enctype = "multipart/form-data">
                <div style="display:none;">
                </div>
                <label>
                <input type="submit" value="Read more" class="btn btn-success">
                <input class="form-control" type="hidden" name="id" value="'.$kode.'">
                </label>
                </form>
                <hr>';
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
      <div class="col-md-6 ">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 align="left">Pertanyaan Terbaru</h3>
            
            <hr>
            <?php 
            include ('connection/connect_to_oracle.php');
            $query="SELECT p.id_pertanyaan, u.nama, p.judul_pertanyaan, p.isi_pertanyaan, p.kategori_pertanyaan, DATE_FORMAT(p.tanggal, '%d-%m-%Y - %H:%i') as tanggal from pertanyaan as p, user as u where p.status='1' AND p.username=u.username order by id_pertanyaan desc";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
              $kode = $row['id_pertanyaan'];
              $potong_pertanyaan = substr($row['isi_pertanyaan'],0,160);
              $tanggal = $row['tanggal'];
              
              //Format tanggal
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
                <h5>'.$row['kategori_pertanyaan'].' | '.$format_tanggal.' | '.$row['nama'].'</h5>
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
                <hr>'

                ;
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
    <!--Content-->
</div>
<!--Container-->

<br><br><br>

<!--Footer-->
  <div class="footer outer-footer">
     <div class="container">
       <div class="row">
         <div class="col-md-3">
           <h3 style="color:white">Tentang IT Corner</h3>
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
<!--Footer-->
</body>
</html>
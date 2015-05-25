<!doctype html>

<html>
<head>
  <title>Beranda | IT Corner - Forum IT Terkini!</title>
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
    <p class="visible-sm" align="center" style="padding:0px;margin:0px;"><a href="#"><img src="it_corner.png" style="padding-top:1px"></a></p>
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-sm" style="padding:0px;margin:0px;" href="#"><img src="it_corner.png" style="padding-top:1px"></a>

        </div>
        <!--List navigation-->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
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
    <br class="visible-sm"><br class="visible-sm">
    <!--Header-->

    <!--Content-->
    <div class="row" style="padding-top:70px;">
    <div class="col-md-5 col-md-offset-7">
      <form id="cariForm" action="cari.php" method="GET">
          <h4 align="right">Cari artikel atau pertanyaan</h4>
              <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                <input type="text" class="form-control" id="cari" name="search" placeholder="Masukkan kata pencarian disini...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Cari</button>
                </span>
              </div>
              <p class="fade in" id="errormsg" align="right" style="display:none;color:red"></p>
      </form>
      </div>

      <script type="text/javascript">
      $('#cariForm').on('submit', function(e)
      {
        if ($('#cari').val()==''){
            e.preventDefault();
            $('#errormsg').text('- Isilah kata pencarian pada kotak pencarian -').show();
        }else{
            // do nothing and let the form post
        }
      });
      </script>

      <table class="table table-hover table-bordered table-striped">
              <thead>
              </thead>
              <tbody>
              </tbody>
            </table>
      <?php
      if(isset($_GET['status']) && $_GET['status']=="ok")
           {
            echo "<div class='alert alert-dismissable alert-success fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Penambahan konten berhasil!</b> Konten anda akan dikonfirmasi oleh admin. Cek pada <a href='riwayat.php'>riwayat anda</a> pada tabulasi konten dalam konfirmasi.
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="hapus")
           {
            if(isset($_GET['aksi']))
            {
              echo "<div class='alert alert-dismissable alert-success fade in'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    Berhasil! ".$_GET['aksi']." berhasil dihapus
                    </div>";
            }
           }
        
        if(empty($_SESSION['nama']))
        {
          echo '
            <div class="col-md-12">
            <div class="panel-welcome panel-default-welcome" style="background-color:#FCFCFC">
            <div class="panel-heading-welcome">
            <h3 class="panel-title-welcome">
            Selamat datang di IT Corner!
            </h3>
            </div>
              <div class="panel-body-welcome">
                    <div class="col-md-6">
                      <div class="pull-left"><h4>Buat Artikel Baru</h4>
                      <p>IT Corner adalah tempat untuk berbagi ilmu. Jadi apabila anda memiliki informasi baru tentang IT, 
                      mengapa tidak berbagi dengan member lainnya? Tulis artikel baru untuk memulai.</p></div>
                      <div class="pull-right"><a href="login.php?location=tambah_artikel.php&alasan=2" <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Buat artikel</button></a>
                      </div>
                    </div>
                    <div class="col-md-6" style="border-left:solid 1px silver;">
                    <div class="pull-left"><h4>Tanyakan disini</h4>
                    <p>Jika anda memiliki pertanyaan seputar IT atau sedang mencari solusi dari permasalahan di bidang IT, tanyakan
                    saja. Member forum ini siap menjawab pertanyaan anda.</p></div>
                    <div class="pull-right">
                    <a href="login.php?location=tambah_pertanyaan.php&alasan=1" <button type="button" class="btn btn-primary btn-lg-tanya"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Tanyakan disini</button></a>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            ';
        }
        elseif($_SESSION['nama'] != "Admin")
        {
            echo '
            <div class="col-md-12">
            <div class="panel-welcome panel-default-welcome">
            <div class="panel-heading-welcome">
            <h3 class="panel-title-welcome">
            Selamat datang di IT Corner - <b>'.$_SESSION['nama'].'</b>!
            </h3>
            </div>
              <div class="panel-body-welcome">
                    <div class="col-md-6">
                      <div class="pull-left"><h4>Buat Artikel Baru</h4>
                      <p>IT Corner adalah tempat untuk berbagi ilmu. Jadi apabila anda memiliki informasi baru tentang IT, 
                      mengapa tidak berbagi dengan member lainnya? Tulis artikel baru untuk memulai.</p></div>
                      <div class="pull-right">
                      <a href="tambah_artikel.php" <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Buat artikel</button></a>
                      </div>
                    </div>
                    <div class="col-md-6" style="border-left:solid 1px silver;">
                    <div class="pull-left"><h4>Tanyakan Disini</h4>
                    <p>Jika anda memiliki pertanyaan seputar IT atau sedang mencari solusi dari permasalahan di bidang IT, tanyakan
                    saja. Member forum ini siap menjawab pertanyaan anda.</p></div>
                    <div class="pull-right">
                    <a href="tambah_pertanyaan.php" <button type="button" class="btn btn-primary btn-lg-tanya"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Tanyakan disini</button></a>
                    </div>
                    </div>
                </div>
              </div>
            </div>
            ';
        }


           
      ?>

      <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
            <?php
            $loc = urlencode($_SERVER['REQUEST_URI']);
            include ('connection/connect_to_oracle.php');
            echo '<div class="list-group">
                <a class="list-group-item active">
                <span class="glyphicon glyphicon-list-alt"></span>
                  &nbsp;Artikel Terbaru
                </a>';
            $query="SELECT a.kunci, a.id_artikel, u.nama, a.judul_artikel, a.kategori_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') as tanggal from artikel as a, user as u where a.status='1' AND a.username=u.username order by id_artikel desc LIMIT 0,5";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
              $kode = $row['id_artikel'];
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
                <a href="isi_artikel.php?id='.$kode.'" class="list-group-item">
                  <h4 class="list-group-item-heading">';
                  if($row['kunci']=='ya')
                  {
                    echo '<span class="glyphicon glyphicon-lock" data-toggle="tooltip" data-placement="top" title="Konten dikunci - Tidak bisa menambah komentar atau jawaban"></span> ';
                  }
                  echo ''.$row['judul_artikel'].'</h4>
                  <h5 class="list-group-item-text">'.$row['kategori_artikel'].' | '.$format_tanggal.' | '.$row['nama'].'';
                  echo '</h5>';
              echo '</a>';
              }
            ?>
            <a class="list-group-item info" href="list_artikel.php"><i>Lebih banyak lagi di daftar artikel &raquo;</i></a>
            </div>
            </div>
            <div class="col-md-6">
            <?php
            echo '<div class="list-group">
                  <a class="list-group-item active">
                  <span class="glyphicon glyphicon-list"></span>
                    &nbsp;Pertanyaan Terbaru
                  </a>';
            $query="SELECT p.kunci, p.id_pertanyaan, u.nama, p.judul_pertanyaan, p.kategori_pertanyaan, DATE_FORMAT(p.tanggal, '%d-%m-%Y - %H:%i') as tanggal from pertanyaan as p, user as u where p.status='1' AND p.username=u.username order by id_pertanyaan desc LIMIT 0,5";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
              $kode = $row['id_pertanyaan'];
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
              <a href="isi_pertanyaan.php?id='.$kode.'" class="list-group-item">
                  <h4 class="list-group-item-heading">';
                  if($row['kunci']=='ya')
                  {
                    echo '<span class="glyphicon glyphicon-lock" data-toggle="tooltip" data-placement="top" title="Konten dikunci - Tidak bisa menambah komentar atau jawaban"></span> ';
                  }
                  echo ''.$row['judul_pertanyaan'].'</h4>
                  <h5 class="list-group-item-text">'.$row['kategori_pertanyaan'].' | '.$format_tanggal.' | '.$row['nama'].'';
                echo '</h5>';
              echo '</a>';
            }
            ?>
            <a class="list-group-item info" href="list_pertanyaan.php"><i>Lebih banyak lagi di daftar pertanyaan &raquo;</i></a>
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
<!doctype html>

<html>
<head>
	<title>Daftar Artikel | IT Corner - Forum IT Terkini!</title>
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

    <div class="row" style="padding-top:80px;">
    <div class="col-md-5">
    <?php
    if(empty($_SESSION['nama']))
    {
      echo '
      <a href="login.php?location=tambah_artikel.php&alasan=2" <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Buat artikel</button></a>
      <a href="login.php?location=tambah_pertanyaan.php&alasan=1" <button type="button" class="btn btn-primary btn-lg-tanya"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Tanyakan disini</button></a>';
    }
    elseif($_SESSION['nama'] != "Admin")
    {
      echo'
      <a href="tambah_artikel.php" <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Buat artikel</button></a>
      <a href="tambah_pertanyaan.php" <button type="button" class="btn btn-primary btn-lg-tanya"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Tanyakan disini</button></a>';
    }
    ?>
    </div>
    <br class="visible-sm visible-xs">
    <div class="col-md-5 col-md-offset-2">
      <form id="cariForm" action="cari.php" method="GET">
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

      <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-list"></span> Daftar Artikel</p>
        </div>
          <div class="panel-body">
            <h3 align="left">Pilihan kategori</h3>
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
            <hr>
            <div class="row">
            <?php 
            include ('connection/connect_to_oracle.php');
            $loc = urlencode($_SERVER['REQUEST_URI']);
            $a=0;
            echo '<div class="col-md-8">';
            echo '<div class="list-group">
            <a class="list-group-item active clearfix">
              <span class="glyphicon glyphicon-list"></span>
              &nbsp;Artikel Terbaru - <i>Semua kategori</i>
              <span class="pull-right">';
            //pagination initialization
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $numContent = 5;
            $startAt = $numContent * ($page - 1);

            $que = "SELECT COUNT(*) as count FROM `artikel` WHERE status='1'";
            if($result=mysql_query($que))
            {
              $obj=mysql_fetch_object($result);
              $count = $obj->count;
            }
            $totalpage = ceil($count / $numContent);

            if($count != 0)
            {
              echo 'Halaman '.$page.' dari '.$totalpage.'';
            }
            echo '<span></a>';
            $query="select a.kunci, a.jumlah_komentar, a.id_artikel, a.judul_artikel, a.kategori_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama from artikel as a,user as u where a.status='1' && a.username=u.username order by a.id_artikel desc LIMIT $startAt, $numContent";
          $rows=mysql_query($query);
          while($row=mysql_fetch_assoc($rows))
          {
          $kode = $row['id_artikel'];
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
          
          echo'
              <a href="isi_artikel.php?id='.$kode.'" class="list-group-item">
                  <h4 class="list-group-item-heading">';
                  if($row['kunci']=='ya')
                  {
                    echo '<span class="glyphicon glyphicon-lock" data-toggle="tooltip" data-placement="top" title="Konten dikunci - Tidak bisa menambah komentar atau jawaban"></span> ';
                  }
                  echo ''.$row['judul_artikel'].'</h4>
                  <h5 class="list-group-item-text">Kategori : '.$row['kategori_artikel'].' | '.$format_tanggal.' oleh '.$row['nama'].'<br>
                  ';
          if($row['jumlah_komentar']==0)
          {
            echo 'Belum ada komentar';
          }
          else
          {
            echo ''.$row['jumlah_komentar'].' komentar';
          }
          echo '</h5>
              </a>';
            $a++;
        }
        if($a==0)
        {
          echo '<h2 align="center">- Tidak ada artikel yang ditemukan -</h2>';
          echo '<h4 align="center"><a href="home.php">Kembali ke beranda</a></h4>';
        }
        else
        {
            //Pagination//

            echo '</div>
              <p align="center">Navigasi</p>
                <div class="text-center">
                  <ul class="pagination">
            ';
            if($page == 1)
            {
              echo '<li class="disabled"><a href="#0" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            }
            else
            {
              $before = ($page - 1);
              echo '<li><a href="list_artikel.php?page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
            }
                
            for ($i = 1; $i <= $totalpage; $i++)
            {
              if($i != $page)
              {
                echo "<li><a href='list_artikel.php?page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
              }
              else
              {
                echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
              }
            }

            if($page == $totalpage)
            {
              echo '<li class="disabled"><a href="#0" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            else
            {
              $after = ($page + 1);
              echo '<li><a href="list_artikel.php?page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
            }
            echo '</ul>
               </div></div>';
            //- end of pagination -//
          }
        ?>
        <div class="col-md-4">
            <?php
            $a=0;
            echo '<div class="list-group">
                <a class="list-group-item active">
                <span class="glyphicon glyphicon-stats"></span>
                  &nbsp;Artikel Terpopuler
                </a>';
            $query="select a.kunci, a.jumlah_komentar,a.id_artikel, a.kategori_artikel, a.judul_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') AS tanggal_woy , u.nama, a.jumlah_komentar, a.tanggal from artikel as a,user as u where a.status='1' && a.username=u.username ORDER BY `a`.`jumlah_komentar` DESC, `a`.`tanggal` DESC LIMIT 0 , 5";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
              $kode = $row['id_artikel'];
              $tanggal = $row['tanggal_woy'];

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
                      <h5 style="font-weight:bold;font-size:16px" class="list-group-item-heading">';
                      if($row['kunci']=='ya')
                      {
                        echo '<span class="glyphicon glyphicon-lock" data-toggle="tooltip" data-placement="top" title="Konten dikunci - Tidak bisa menambah komentar atau jawaban"></span> ';
                      }
                      echo ''.$row['judul_artikel'].'</h5>
                      <h5 class="list-group-item-text">'.$row['kategori_artikel'].'<br>'.$format_tanggal.' oleh '.$row['nama'].'<br>
                      ';
              if($row['jumlah_komentar']==0)
              {
                echo 'Belum ada komentar';
              }
              else
              {
                echo ''.$row['jumlah_komentar'].' komentar';
              }
              echo '</h5>
                  </a>';
                  $a++;
            }
            if($a==0)
            {
              echo '<a class="list-group-item"><h4 class="list-group-item-heading" align="center">- Tidak ada artikel yang ditemukan -</h4></a>';
            }
            echo '</div>';
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
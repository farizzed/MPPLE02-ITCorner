<!doctype html>

<html>
<head>
  <title>Profil Member | IT Corner - Forum IT Terkini!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  })
  </script>
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
        <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-user"></span> Profil Member</p>
        </div>
          <div class="panel-body">
            <div class="row">
            <?php
            include ('connection/connect_to_oracle.php');
            if(isset($_GET['status']) && $_GET['status']=="terkirim")
             {
              echo "<div class='col-md-12'>
              <div class='alert alert-dismissable alert-success fade in'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Pesan berhasil dikirim
              </div>
              </div>";
             }
             $loc = $_SERVER['REQUEST_URI'];
             $loc = explode('&status', $loc);
            $loc = urlencode($loc[0]);
            if(isset($_SESSION['username']))
            {
              if($_GET['user'] !==  $_SESSION['username'])
              {
                if(isset($_GET['location']))
                {
                  echo '<div class="col-md-12"><a href="'.$_GET['location'].'" <button type="button" class="btn btn-primary">&larr; Kembali</button></a></div></div><br>';
                }
                $n = $_GET['user'];
                $query="SELECT nama, email, gambar, DATE_FORMAT(tanggal_masuk, '%d-%m-%Y') AS tanggal, deskripsi, DATE_FORMAT(tanggal_lahir, '%d/%m/%Y') AS lahir, tempat_tinggal from user where username='$n'";
                $rows=mysql_query($query);
                while($row = mysql_fetch_assoc($rows))
                {
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
                  $format_tanggal = $day . ' ' . $coba . ' ' . $yeartime;

                  //Format tanggal
                  $lahir = $row['lahir'];
                  $day = substr($lahir, 0, 2);
                  $coba = substr($lahir, 3, 2);
                  $yeartime = substr($lahir, 6);
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
                  $tanggal_lahir = $day . ' ' . $coba . ' ' . $yeartime;

                  $nama = $row['nama'];

                  echo "<div class='col-sm-3'>";
                  //Untuk gambar
                  if($row['gambar'] == NULL)
                  {
                    echo "<p align='center'><img src='anon.jpg' width='250px' height='250px'></p></div>";
                  }
                  else
                  {
                    echo "<p align='center'><img src='".$row['gambar']."' width='250px' height='250px'></p></div>";
                  }
                  
                  //Profil member lengkap
                  echo "<div class='col-sm-9'>";
                  echo "<p style='font-size:30px;font-style:bold;'>" .$nama."</p>";
                  echo "<h4>Member sejak</h4>
                  " . $format_tanggal . "";

                  //Untuk tempat tinggal
                  if($row['deskripsi'] == NULL)
                  {
                    echo '<br><br><h4>Asal</h4>
                    - Member ini malu-malu ketika ditanya asalnya -';
                  }
                  else
                  {
                    echo '<br><br><h4>Asal</h4>
                    ' . $row['tempat_tinggal'] . '';
                  }

                  //Untuk tanggal lahir
                  if($row['lahir'] == NULL)
                  {
                    echo '<br><br><h4>Tanggal Lahir</h4>
                    - Member ini malu-malu ketika ditanya tanggal lahirnya -';
                  }
                  else
                  {
                    echo '<br><br><h4>Tanggal Lahir</h4>
                    ' . $tanggal_lahir . '';
                  }

                  //Untuk biografi
                  if($row['deskripsi'] == NULL)
                  {
                    echo '<br><br><h4>Biografi singkat</h4>
                    - Tidak ada deskripsi singkat tentang member ini -';
                  }
                  else
                  {
                    echo '<br><br><h4>Biografi singkat</h4>
                    ' . $row['deskripsi'] . '';
                  }
                }
                if(isset($_SESSION['username']) && isset($_SESSION['nama']))
                {
                  echo '</div></div><br>
                  <p align="center"><a href="tulis_pesan.php?location='.$loc.'&user='.$_GET['user'].'"><button class="btn btn-primary btn-lg" type="submit"><span class="glyphicon glyphicon-pencil"></span> Kirim pesan</button></a></p>';
                }
                else
                {
                  echo '</div></div><br>
                  <p align="center"><a href="login.php?location='.$loc.'&user='.$_GET['user'].'&alasan=5"><button class="btn btn-primary btn-lg" type="submit"><span class="glyphicon glyphicon-pencil"></span> Kirim pesan</button></a></p>';
                }
              }
              else
              {
                
                $n = $_SESSION['username'];
                if(isset($_GET['location']))
                {
                  echo '<div class="col-md-12"><a href="'.$_GET['location'].'" <button type="button" class="btn btn-primary">&larr; Kembali</button></a></div><br><br>';
                }
                if(isset($_GET['status']))
                {
                  if($_GET['status'] == 'berhasil')
                  {
                    echo '<div class="col-sm-12"><div class="alert alert-success alert-dismissable fade in">
                          <a class="close" data-dismiss="alert" href="#">&times;</a>
                          Profil berhasil di mutakhirkan!</div></div>';
                  }
                }
                $query="SELECT nama, email, gambar, DATE_FORMAT(tanggal_masuk, '%d-%m-%Y') AS tanggal, deskripsi, DATE_FORMAT(tanggal_lahir, '%d/%m/%Y') AS lahir, tempat_tinggal from user where username='$n'";
                $rows=mysql_query($query);
                while($row = mysql_fetch_assoc($rows))
                {
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
                  $format_tanggal = $day . ' ' . $coba . ' ' . $yeartime;

                  //Format tanggal
                  $lahir = $row['lahir'];
                  $day = substr($lahir, 0, 2);
                  $coba = substr($lahir, 3, 2);
                  $yeartime = substr($lahir, 6);
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
                  $tanggal_lahir = $day . ' ' . $coba . ' ' . $yeartime;

                  $nama = $row['nama'];

                  echo "<div class='col-sm-3'>";
                  //Untuk gambar
                  if($row['gambar'] == NULL)
                  {
                    echo "<p align='center'><img src='anon.jpg' width='250px' height='250px'></p></div>";
                  }
                  else
                  {
                    echo "<p align='center'><img src='".$row['gambar']."' width='250px' height='250px'></p></div>";
                  }
                  
                  //Profil member lengkap
                  echo "<div class='col-sm-9'>";
                  echo "<p style='font-size:30px;font-style:bold;'>" .$nama."</p>";
                  echo "<h4>Member sejak</h4>
                  " . $format_tanggal . "";

                  //Untuk tempat tinggal
                  if($row['deskripsi'] == NULL)
                  {
                    echo '<br><br><h4>Asal</h4>
                    - Member ini malu-malu ketika ditanya asalnya -';
                  }
                  else
                  {
                    echo '<br><br><h4>Asal</h4>
                    ' . $row['tempat_tinggal'] . '';
                  }

                  //Untuk tanggal lahir
                  if($row['lahir'] == NULL)
                  {
                    echo '<br><br><h4>Tanggal Lahir</h4>
                    - Member ini malu-malu ketika ditanya tanggal lahirnya -';
                  }
                  else
                  {
                    echo '<br><br><h4>Tanggal Lahir</h4>
                    ' . $tanggal_lahir . '';
                  }

                  //Untuk biografi
                  if($row['deskripsi'] == NULL)
                  {
                    echo '<br><br><h4>Biografi singkat</h4>
                    - Tidak ada deskripsi singkat tentang member ini -';
                  }
                  else
                  {
                    echo '<br><br><h4>Biografi singkat</h4>
                    ' . $row['deskripsi'] . '';
                  }
                }
                echo "</div></div><br>";
                echo '<p align="center"><a href="edit_profil.php?location='.$loc.'"><button class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil"></span> Edit profil</button></a></p>';
              }
            }
            else
            {
              if(isset($_GET['location']))
                {
                  echo '<div class="col-md-12"><a href="'.$_GET['location'].'" <button type="button" class="btn btn-primary">&larr; Kembali</button></a></div></div><br>';
                }
                $n = $_GET['user'];
                $query="SELECT nama, email, gambar, DATE_FORMAT(tanggal_masuk, '%d-%m-%Y') AS tanggal, deskripsi, DATE_FORMAT(tanggal_lahir, '%d/%m/%Y') AS lahir, tempat_tinggal from user where username='$n'";
                $rows=mysql_query($query);
                while($row = mysql_fetch_assoc($rows))
                {
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
                  $format_tanggal = $day . ' ' . $coba . ' ' . $yeartime;

                  //Format tanggal
                  $lahir = $row['lahir'];
                  $day = substr($lahir, 0, 2);
                  $coba = substr($lahir, 3, 2);
                  $yeartime = substr($lahir, 6);
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
                  $tanggal_lahir = $day . ' ' . $coba . ' ' . $yeartime;

                  $nama = $row['nama'];

                  echo "<div class='col-sm-3'>";
                  //Untuk gambar
                  if($row['gambar'] == NULL)
                  {
                    echo "<p align='center'><img src='anon.jpg' width='250px' height='250px'></p></div>";
                  }
                  else
                  {
                    echo "<p align='center'><img src='".$row['gambar']."' width='250px' height='250px'></p></div>";
                  }
                  
                  //Profil member lengkap
                  echo "<div class='col-sm-9'>";
                  echo "<p style='font-size:30px;font-style:bold;'>" .$nama."</p>";
                  echo "<h4>Member sejak</h4>
                  " . $format_tanggal . "";

                  //Untuk tempat tinggal
                  if($row['deskripsi'] == NULL)
                  {
                    echo '<br><br><h4>Asal</h4>
                    - Member ini malu-malu ketika ditanya asalnya -';
                  }
                  else
                  {
                    echo '<br><br><h4>Asal</h4>
                    ' . $row['tempat_tinggal'] . '';
                  }

                  //Untuk tanggal lahir
                  if($row['lahir'] == NULL)
                  {
                    echo '<br><br><h4>Tanggal Lahir</h4>
                    - Member ini malu-malu ketika ditanya tanggal lahirnya -';
                  }
                  else
                  {
                    echo '<br><br><h4>Tanggal Lahir</h4>
                    ' . $tanggal_lahir . '';
                  }

                  //Untuk biografi
                  if($row['deskripsi'] == NULL)
                  {
                    echo '<br><br><h4>Biografi singkat</h4>
                    - Tidak ada deskripsi singkat tentang member ini -';
                  }
                  else
                  {
                    echo '<br><br><h4>Biografi singkat</h4>
                    ' . $row['deskripsi'] . '';
                  }
                }
                if(isset($_SESSION['username']) && isset($_SESSION['nama']))
                {
                  echo '</div></div><br>
                  <p align="center"><a href="tulis_pesan.php?location='.$loc.'&user='.$_GET['user'].'"><button class="btn btn-primary btn-lg" type="submit"><span class="glyphicon glyphicon-pencil"></span> Kirim pesan</button></a></p>';
                }
                else
                {
                  echo '</div></div><br>
                  <p align="center"><a href="login.php?location='.$loc.'&user='.$_GET['user'].'&alasan=5"><button class="btn btn-primary btn-lg" type="submit"><span class="glyphicon glyphicon-pencil"></span> Kirim pesan</button></a></p>';
                }
            }
            
            
          ?>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Footer-->
  <br><br>
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
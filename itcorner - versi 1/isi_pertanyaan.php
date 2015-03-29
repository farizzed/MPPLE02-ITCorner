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
            <li class="active">
              <a href="list_pertanyaan.php">Pertanyaan</a>
            </li>
            <?php session_start(); include 'header.php'; ?>
        </div>
        <!--List navigation-->
      </div>
    </div>
    <!--Header-->

    <!--Isi-->
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
          
          <?php
          include ('connection/connect_to_oracle.php');
          $kategori = $tanggal = $nama = $isi = $judul = "";

          
          if(!empty($_GET['status']))
          {
            if($_GET['status'] == 'gagal')
            {
                echo '<div class="alert alert-danger">
                  Isian tidak boleh kosong</div>';
            }
            elseif($_GET['status'] == 'berhasil')
            {
              echo '<div class="alert alert-success alert-dismissable fade in">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    Jawaban berhasil dimasukkan</div>';
            }
            elseif($_GET['status'] == 'hapus')
            {
              echo '<div class="alert alert-success alert-dismissable fade in">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    Jawaban berhasil dihapus</div>';
            }
          }

          $kode = $_GET['id'];
          if(isset($_SESSION['nama']))
          {
            if($_SESSION['nama'] == "Admin")
            {
              $previous = "javascript:history.go(-1)";
              if(isset($_SERVER['HTTP_REFERER']))
              {
                  $previous = $_SERVER['HTTP_REFERER'];
              }
              $loc = urlencode($_SERVER['REQUEST_URI']);
              echo '<div class="alert alert-info">
                      <h4>Kelola artikel - Administrator</h4>
                      <p>Apa yang akan anda lakukan terhadap pertanyaan ini?</p>
                      <h5><a href="'.$previous.'"> <button type="button" class="btn btn-info">Kembali ke laman sebelumnya</button></a>
                      &nbsp;
                      <a onclick="doConfirmPertanyaan()"> <button type="button" class="btn btn-danger">Hapus pertanyaan</button></a></h5>
                    </div>';

              echo '<script type="text/javascript">
                function doConfirmPertanyaan() 
                {
                     if(confirm("Apakah anda yakin ingin menghapus pertanyaan ini?"))
                     {
                        window.location.href = "deletequery.php?id='.$kode.'&location='.$loc.'&aksi=pertanyaan";
                     }
                }
              </script>
              ';
            }
          }

          //Jika artikel ada
          if(mysql_query("select p.judul_pertanyaan, p.kategori_pertanyaan, DATE_FORMAT(p.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, p.isi_pertanyaan from pertanyaan as p,user as u where p.id_pertanyaan=".$kode." && p.username=u.username;"))
          {
            //Query isi artikel
            $row = mysql_query("select p.judul_pertanyaan, p.kategori_pertanyaan, DATE_FORMAT(p.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, p.isi_pertanyaan from pertanyaan as p,user as u where p.id_pertanyaan=".$kode." && p.username=u.username;");
            $result = mysql_fetch_array($row);
            
            //Hasil query
            $judul = $result[0];
            $kategori = $result[1];
            $tanggal = $result[2];
            $nama = $result[3];
            $isi = $result[4];

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

            echo '
                    <h3 align="left">'.$judul.'</h3>
                    <h5>'.$kategori.' | '.$format_tanggal.' | '.$nama.'</h5>
                    <p align="left">
                        '.$isi.'
                        <br><br>
                    </p>
            ';
            echo '<h3>Jawaban</h3>
                  <hr>';
              $kode = $_GET['id'];
              $count = 0;
              $result = mysql_query("SELECT j.id_jawaban, j.isi_jawaban, j.nama, DATE_FORMAT(j.tanggal, '%d-%m-%Y - %H:%i') AS tanggal FROM jawaban as j WHERE j.id_pertanyaan=".$kode.";");
              while ($row = mysql_fetch_assoc($result))
              {
                  //Format tanggal
                  $tanggal = $row["tanggal"];
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

                  echo '
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <a href="'.$row["id_jawaban"].'"></a>
                        <h4>'.$row["nama"].'</h4>
                        <h5>'.$format_tanggal.'</h5>
                        <p>'.$row["isi_jawaban"].'</p>';
                        if(isset($_SESSION['nama']))
                        {
                          if($_SESSION['nama'] == "Admin")
                          {
                            $kodejawab = $row["id_jawaban"];
                            $loc = urlencode($_SERVER['REQUEST_URI']);
                            echo '<a onclick="doConfirm()"> <button type="button" class="btn btn-danger">Hapus jawaban</button></a></h5>';
                            
                            echo '<script type="text/javascript">
                                  function doConfirm() 
                                  {
                                       if(confirm("Apakah anda yakin ingin menghapus jawaban ini?"))
                                       {
                                          window.location.href = "deletequery.php?id='.$kodejawab.'&location='.$loc.'&aksi=jawaban";
                                       }
                                  }
                                </script>
                            ';

                          }
                        }
                  echo '
                      </div>
                    </div>
                  </div>
                  ';
                  $count++;
                }
                if($count==0)
                {
                  if(isset($_SESSION['nama']))
                  {
                    if($_SESSION['nama'] == "Admin")
                    {
                      echo '<p align="center"><img src="answer.png" align="center"></p>';
                      echo '<h2 align="center">Belum ada jawaban untuk pertanyaan ini</h2>';
                    }
                    else
                    {
                      echo '<p align="center"><img src="answer.png" align="center"></p>';
                      echo '<h2 align="center">Belum ada jawaban</h2>';
                      echo '<h4 align="center">Yuk bantu menjawab! Isi jawaban anda dibawah..</h4>';
                    }
                  }
                  else
                  {
                    echo '<p align="center"><img src="answer.png" align="center"></p>';
                    echo '<h2 align="center">Belum ada jawaban</h2>';
                    echo '<h4 align="center">Yuk bantu menjawab! Isi jawaban anda dibawah..</h4>';
                  }
                }
              }
          ?>

          <!--Form penambahan komentar-->
          <?php
            if(empty($_SESSION['nama']))
            {
              echo '<h3 align="left">Tambahkan jawaban</h3>
                      <hr>';
              $a = urlencode($_SERVER['REQUEST_URI']);
              $b = 'login.php?location=' .$a;
              $c = 'daftar.php?location=' .$a;
              echo '<form method="post" action="'. $b .'">
                     <fieldset disabled>
                       <p align="left"><textarea name="jawaban" rows="4" cols="133"> </textarea></p>
                         <input class="btn btn-success" type="submit" value="Tambahkan"/>
                     </fieldset>
                     <p>Anda belum login. Silahkan login untuk menambahkan jawaban.
                     <input class="btn btn-success" type="submit" value="Login"/></p>
                     <p>Belum punya akun? <a href="'. $c .'">Daftar</a> sekarang juga!</p>
                    </form>';
            }
            elseif($_SESSION['nama'] != "Admin")
            {
              echo '<h3 align="left">Tambahkan jawaban</h3>
                      <hr>';
              $d = urlencode($_SERVER['REQUEST_URI']);
              echo '<form method="post" action="tambah_konten.php?location='.$d.'&id='.$_GET['id'].'&aksi=jawab">
                      <p align="left"><textarea class="form-control" name="jawaban" rows="4" cols="136"></textarea></p>
                      <input class="btn btn-success" type="submit" value="Tambahkan"/>
                    </form>';
                      //Fungsi yang satu ini hidden dan akan melakukan passing jika tombol login ditekan
                      //Isi yang dipassing ada lokasi halaman terakhir sebelum login
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
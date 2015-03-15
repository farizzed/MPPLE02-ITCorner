<!doctype html>

<html>
<head>
	<title>IT Corner - Forum IT Terkini!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(".alert").fadeOut(3000);
  </script>
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

    <!--Isi-->
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
    <?php
    include ('connection/connect_to_oracle.php');
    $kategori = $tanggal = $nama = $isi = $judul = "";

    
    $kode = $_GET['id'];
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
              Komentar berhasil dimasukkan</div>';
      }
      elseif($_GET['status'] == 'hapus')
            {
              echo '<div class="alert alert-success alert-dismissable fade in">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    Komentar berhasil dihapus</div>';
            }
    }
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
                <p>Apa yang akan anda lakukan terhadap artikel ini?</p>
                <h5><a href="'.$previous.'"> <button type="button" class="btn btn-info">Kembali ke laman sebelumnya</button></a>
                &nbsp;
                <a onclick="doConfirmArtikel()"> <button type="button" class="btn btn-danger">Hapus artikel</button></a></h5>
              </div>';

        echo '<script type="text/javascript">
                function doConfirmArtikel() 
                {
                     if(confirm("Apakah anda yakin ingin menghapus artikel ini?"))
                     {
                        window.location.href = "deletequery.php?id='.$kode.'&location='.$loc.'&aksi=artikel";
                     }
                }
              </script>
              ';
      }
    }

    //Jika artikel ada
    $kode = $_GET['id'];
    if(mysql_query("select a.judul_artikel, a.kategori_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, a.isi_artikel from artikel as a,user as u where a.id_artikel=".$kode." && a.username=u.username;"))
    {
      //Query isi artikel
      $row = mysql_query("select a.judul_artikel, a.kategori_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, a.isi_artikel from artikel as a,user as u where a.id_artikel=".$kode." && a.username=u.username;");
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
      echo '<h3>Komentar</h3>
            <hr>';
          $count = 0;
          $result = mysql_query("SELECT k.id_komentar, k.isi_komentar, k.nama, DATE_FORMAT(k.tanggal, '%d-%m-%Y - %H:%i') AS tanggal FROM komentar as k WHERE k.id_artikel=".$kode.";");
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
                  <a href="'.$row["id_komentar"].'"></a>
                  <h4>'.$row["nama"].'</h4>
                  <h5>'.$format_tanggal.'</h5>
                  <p>'.$row["isi_komentar"].'</p>';
                  if(isset($_SESSION['nama']))
                  {
                    if($_SESSION['nama'] == "Admin")
                    {
                      $kodekomen = $row["id_komentar"];
                      $loc = urlencode($_SERVER['REQUEST_URI']);
                      echo '<a onclick="doConfirm()"> <button type="button" class="btn btn-danger">Hapus komentar</button></a></h5>';
                    
                      echo '<script type="text/javascript">
                              function doConfirm() 
                              {
                                if(confirm("Apakah anda yakin ingin menghapus komentar ini?"))
                                {
                                  window.location.href = "deletequery.php?id='.$kodekomen.'&location='.$loc.'&aksi=komentar";
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
                echo '<p align="center"><img src="comment.png" align="center"></p>';
                echo '<h2 align="center">Belum ada komentar untuk artikel ini</h2>';
              }
              else
              {
                echo '<p align="center"><img src="comment.png" align="center"></p>';
                echo '<h2 align="center">Belum ada komentar</h2>';
                echo '<h4 align="center">Berilah komentar pada artikel ini! Isi komentar anda dibawah..</h4>';
              }
            }
            else
            {
              echo '<p align="center"><img src="comment.png" align="center"></p>';
              echo '<h2 align="center">Belum ada komentar</h2>';
              echo '<h4 align="center">Berilah komentar pada artikel ini! Isi komentar anda dibawah..</h4>';
            }
          }
        }
        ?>

            <!--Form penambahan komentar-->
            <?php
              if(empty($_SESSION['nama']))
              {
                echo '<h3 align="left">Tambahkan komentar</h3>
                      <hr>';
                $a = urlencode($_SERVER['REQUEST_URI']);
                $b = 'login.php?location=' .$a;
                $c = 'daftar.php?location=' .$a;
                echo '<form method="post" action="'. $b .'">
                          <fieldset disabled>
                            <p align="left"><textarea name="komentar" rows="4" cols="133"> </textarea></p>
                            <input class="btn btn-success" type="submit" value="Tambahkan"/>
                          </fieldset>
                          <p>Anda belum login. Silahkan login untuk menambahkan komentar.
                          <input class="btn btn-success" type="submit" value="Login"/></p>
                          <p>Belum punya akun? <a href="'. $c .'">Daftar</a> sekarang juga!</p>
                        </form>';
              }
              elseif($_SESSION['nama'] != "Admin")
              {
                echo '<h3 align="left">Tambahkan komentar</h3>
                      <hr>';
                $d = urlencode($_SERVER['REQUEST_URI']);
                echo '<form method="post" action="tambah_konten.php?location='.$d.'&id='.$_GET['id'].'&aksi=komentar">
                          <p align="left"><textarea class="form-control" name="komentar" rows="4" cols="136"></textarea></p>
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
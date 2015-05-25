<!doctype html>

<html>
<head>
<?php
  include ('connection/connect_to_oracle.php');
  $kode = $_GET['id'];
  $row = mysql_query("select p.judul_pertanyaan from pertanyaan as p where p.id_pertanyaan=".$kode."");
  $result = mysql_fetch_array($row);
  $judul = $result[0];
  echo '<title>'.$judul.' | IT Corner - Forum IT Terkini!</title>';
?>
	<meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(".alert").fadeOut(3000);
  </script>
  <script type="text/javascript">
  $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
  </script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
  <div class="container">

    <!--Header-->
    <a id="top"></a>
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

<!-- Modal Link-->
<div class="modal fade" id="modalLink" tabindex="-1" role="dialog" aria-labelledby="modalLinkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLinkLabelLabel">Tambah Link URL (Pranala luar)</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="link" class="control-label">Masukkan link URL:</label>
            <input type="text" class="form-control" value="http://" id="link">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" onclick="addElement('Link')">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalGambarLabel">Tambah URL Gambar</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="link" class="control-label">Masukkan URL gambar yang valid:</label>
            <input type="text" class="form-control" value="http://" id="urlimg">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" onclick="addGambar()">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>

    <!--Isi-->
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-list"></span> Isi Pertanyaan</p>
        </div>
          <div class="panel-body">
          
          <?php
          $kategori = $tanggal = $nama = $isi = $judul = "";

          $loc = urlencode($_SERVER['REQUEST_URI']);
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
            elseif($_GET['status'] == 'kunci')
            {
              echo '<div class="alert alert-success alert-dismissable fade in">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    Pertanyaan berhasil dikunci</div>';
            }
            elseif($_GET['status'] == 'lepas')
            {
              echo '<div class="alert alert-success alert-dismissable fade in">
                    <a class="close" data-dismiss="alert" href="#">&times;</a>
                    Kunci pertanyaan berhasil dilepas</div>';
            }
          }
          $result = mysql_query("SELECT kunci FROM pertanyaan WHERE id_pertanyaan=".$kode."");
              while ($row = mysql_fetch_assoc($result))
              {
                $kunci = $row['kunci'];
              }
          if(isset($_SESSION['nama']))
          {
            if($_SESSION['nama'] == "Admin")
            {
              echo '<div class="alert alert-info">
                <h4>Kelola pertanyaan - Administrator</h4>
                <p>Apa yang akan anda lakukan terhadap pertanyaan ini?</p>
                <h5>
                <a onclick="doConfirmPertanyaan()" <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus pertanyaan</button></a>
                &nbsp;';
                if($kunci=='tidak')
                {
                  echo '<a onclick="doConfirmLockPertanyaan()" <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Mengunci pertanyaan, member tidak dapat menambah jawaban pada pertanyaan ini"><span class="glyphicon glyphicon-lock"></span> Kunci pertanyaan</button></a></h5>';
                }
                else
                {
                  echo '<a onclick="doConfirmUnlockPertanyaan()" <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Membuka kunci pertanyaan, pertanyaan dapat menerima jawaban lagi dari member dan admin"><span class="glyphicon glyphicon-lock"></span> Buka Kunci pertanyaan</button></a></h5>';
                }
              echo '</div>';

              echo '<script type="text/javascript">
                function doConfirmPertanyaan() 
                {
                     if(confirm("Apakah anda yakin ingin menghapus pertanyaan ini?"))
                     {
                        window.location.href = "deletequery.php?id='.$kode.'&location='.$loc.'&aksi=pertanyaan";
                     }
                }
              </script>
              <script type="text/javascript">
                function doConfirmLockPertanyaan() 
                {
                     if(confirm("Apakah anda yakin ingin mengunci pertanyaan ini? - Pertanyaan yang dikunci tidak dapat menerima jawaban lagi"))
                     {
                        window.location.href = "lockquery.php?id='.$kode.'&location='.$loc.'&aksi=kunci_pertanyaan";
                     }
                }
              </script>
              </script>
              <script type="text/javascript">
                function doConfirmUnlockPertanyaan() 
                {
                     if(confirm("Apakah anda yakin ingin melepas kunci pertanyaan ini? - Pertanyaan dapat menerima jawaban kembali"))
                     {
                        window.location.href = "lockquery.php?id='.$kode.'&location='.$loc.'&aksi=lepas_pertanyaan";
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
              <h5>'.$kategori.' | '.$format_tanggal.' | '.$nama.'';
              if($kunci=='ya')
              {
                echo ' | <span class="glyphicon glyphicon-lock" data-toggle="tooltip" data-placement="top" title="Konten dikunci - Tidak bisa menambah komentar atau jawaban"></span></h5>';
              }
              else
              {
                echo '</h5>';
              }
                  echo '<p align="left">
                          '.$isi.'
                          <br>
                      </p>
                      </div></div></div></div>
              ';
            echo '<div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
              <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-comment"></span> Jawaban</p>
            </div>
          <div class="panel-body">';

            //pagination initialization
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $numContent = 5;
            $startAt = $numContent * ($page - 1);
            //Pagination//
            $que = "SELECT COUNT(*) as count FROM jawaban WHERE id_pertanyaan='$kode'";
            if($result=mysql_query($que))
            {
              $obj=mysql_fetch_object($result);
              $jml = $obj->count;
            }
            $totalpage = ceil($jml / $numContent);
            if($jml==0)
            {
                  if(isset($_SESSION['nama']))
                  {
                    if($_SESSION['nama'] == "Admin")
                    {
                      echo '<p align="center"><img src="answer.png" align="center"></p>';
                      echo '<h2 align="center">Belum ada jawaban untuk pertanyaan ini</h2></div></div>';
                    }
                    else
                    {
                      echo '<p align="center"><img src="answer.png" align="center"></p>';
                      echo '<h2 align="center">Belum ada jawaban</h2>';
                      echo '<h4 align="center">Yuk bantu menjawab! Isi jawaban anda dibawah..</h4></div></div>';
                    }
                  }
                  else
                  {
                    echo '<p align="center"><img src="answer.png" align="center"></p>';
                    echo '<h2 align="center">Belum ada jawaban</h2>';
                    echo '<h4 align="center">Yuk bantu menjawab! Isi jawaban anda dibawah..</h4></div></div>';
                  }
            }
            else
            {
              echo '
              <div class="row">
                <div class="col-sm-5">
                <div class="text-left">'.$jml.' jawaban</div>
                </div>
                <div class="col-sm-7">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
                  <li><a href="#jawab">Halaman '.$page.' dari '.$totalpage.'</a></li>
              ';
              if($page > 5)
              {
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page=1" aria-label="Previous" data-toggle="tooltip" data-placement="top" title="Halaman pertama"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Halaman sebelumnya">&laquo;</span></a></li>';
              }
              $i=1;
              if($page <= 5 && $totalpage > 5)
              {
                $totalshow = $page + 4;
                  for ($i = 1; $i <= $totalpage; $i++)
                  {
                      if($i == $totalshow)
                      {
                        break;
                      }
                      else if($i != $page)
                      {
                        echo "<li><a href='isi_pertanyaan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                }
                elseif($page > 5 && $totalpage > 5)
                {
                  $totalshow = $page + 4;
                  $i = $page - 3;
                  for ($i; $i <= $totalpage; $i++)
                  {
                      if($i == $totalshow)
                      {
                        break;
                      }
                      else if($i != $page)
                      {
                        echo "<li><a href='isi_pertanyaan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                  }
                  else
                  {
                    for ($i = 1; $i <= $totalpage; $i++)
                    {
                      if($i != $page)
                      {
                        echo "<li><a href='isi_pertanyaan.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                  }

              if($page != $totalpage)
              {
                $after = ($page + 1);
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Halaman selanjutnya">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Halaman terakhir">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
            }

              $result = mysql_query("SELECT u.gambar, j.username, j.id_jawaban, j.isi_jawaban, j.nama, DATE_FORMAT(j.tanggal, '%d-%m-%Y - %H:%i') AS tanggal FROM jawaban as j, user as u WHERE j.username=u.username AND j.id_pertanyaan=".$kode." LIMIT $startAt, $numContent;");
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
                    <div class="panel-response panel-default-response">';
                    if($row["nama"] == 'Admin')
                    {
                      echo '<div class="panel-heading-response" style="background-color:#F7CD03">
                      <div class="panel-title-response" style="color:black">';
                    }
                    else
                    {
                      echo '<div class="panel-heading-response">
                      <div class="panel-title-response">';
                    }
                    echo '<div class="row">
                        <div class="col-md-1">';
                  if($row["gambar"] == NULL)
                  {
                    echo '<img align="left" style="width: 60px; height: 60px;margin-top: 2px" title="'.$row["nama"].' avatar" src="anon.jpg">
                        </div>';
                  }
                  else
                  {
                    echo '<img align="left" style="width: 60px; height: 60px;margin-top: 2px" src="'.$row["gambar"].'">
                        </div>';
                  }
                  echo '    
                  <div class="col-md-11" style="padding-left:0px">
                    <h4 style="margin-top: 7px;">';
                    $loc = urlencode($_SERVER['REQUEST_URI']);
                    if($row["nama"] == 'Admin')
                    {
                      echo ''.$row["nama"].'';
                    }
                    else
                    {
                      echo ''.$row["nama"].' <a href="profil.php?location='.$loc.'&user='.$row["username"].'"><button class="btn btn-info btn-xs">Lihat profil</button></a>';
                    }
                    echo '<h4>
                          <h5 style="margin-top: -4px;">'.$format_tanggal.'</h5>
                        </div>
                      </div>
                    </div>
                   </div>
                      <div class="panel-body-response">
                        <p>'.$row["isi_jawaban"].'</p>';
                        if(isset($_SESSION['nama']))
                        {
                          if($_SESSION['nama'] == "Admin" || $_SESSION['username'] == $row["username"])
                          {
                            $kodekomen = $row["id_jawaban"];
                            echo '<a onclick="doConfirm(\''.$kodekomen.'\',\''.$kode.'\')"> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus jawaban</button></a></h5>';
                          }
                        }
                  echo '
                      </div>
                    </div>
                  </div>
                  ';
                }
              }
              if($jml != 0)
              {
                echo '
                <div class="row">
                <div class="col-sm-12">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
                  <li><a href="#jawab">Halaman '.$page.' dari '.$totalpage.'</a></li>
              ';
              if($page > 5)
              {
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page=1" aria-label="Previous" data-toggle="tooltip" data-placement="top" title="Halaman pertama"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Halaman sebelumnya">&laquo;</span></a></li>';
              }
              $i=1;
              if($page <= 5 && $totalpage > 5)
              {
                $totalshow = $page + 4;
                  for ($i = 1; $i <= $totalpage; $i++)
                  {
                      if($i == $totalshow)
                      {
                        break;
                      }
                      else if($i != $page)
                      {
                        echo "<li><a href='isi_pertanyaan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                }
                elseif($page > 5 && $totalpage > 5)
                {
                  $totalshow = $page + 4;
                  $i = $page - 3;
                  for ($i; $i <= $totalpage; $i++)
                  {
                      if($i == $totalshow)
                      {
                        break;
                      }
                      else if($i != $page)
                      {
                        echo "<li><a href='isi_pertanyaan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                  }
                  else
                  {
                    for ($i = 1; $i <= $totalpage; $i++)
                    {
                      if($i != $page)
                      {
                        echo "<li><a href='isi_pertanyaan.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$page."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                  }

              if($page != $totalpage)
              {
                $after = ($page + 1);
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Halaman selanjutnya">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="isi_pertanyaan.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Halaman terakhir">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div></div></div>';
              //- end of pagination -//
              }
          ?>

          <!--Form penambahan jawaban-->
          <?php
          echo '
              <div class="row">
                <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-hand-right"></span> Tambahkan jawaban</p>
                </div>
              <div class="panel-body">';
              if($kunci=='ya')
              {
                echo '<h4 align="center">- Anda tidak dapat menambahkan jawaban pada pertanyaan ini karena pertanyaan ini telah dikunci -</h4>';
              }
              elseif(empty($_SESSION['nama']))
              {
              $a = urlencode($_SERVER['REQUEST_URI']);
              $b = 'login.php?location=' .$a;
              $c = 'daftar.php?location=' .$a;
              echo '<form method="post" action="'. $b .'">
                     <fieldset disabled>
                       <p align="left"><textarea class="form-control" name="jawaban" rows="4"> </textarea></p>
                         <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Tambahkan</button>
                     </fieldset>
                     <p>Anda belum login. Silahkan login untuk menambahkan jawaban.
                     <input class="btn btn-success" type="submit" value="Login"/></p>
                     <p>Belum punya akun? <a href="'. $c .'">Daftar</a> sekarang juga!</p>
                    </form>';
            }
            else
            {
              echo '
                <div class="panel-addcomment panel-default-addcomment">
                  <div class="panel-heading-addcomment">
                    <h3 class="panel-title-addcomment">';
                    if($_SESSION['nama'] == "Admin")
                    {
                      echo '<p style="color:yellow;"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <b>Peringatan!</b> Anda menambah jawaban sebagai admin</p>';
                    }
                    echo '
                    <p><i>Anda bisa gunakan kakas bantu</i></p>
                    <div class="btn-group">
                    <button type="button" title="Bold (Teks tebal)" class="btn btn-default" aria-label="Left Align" onclick="addElement(\'Bold\')">
                      <img src="bold.png" width="18px" height="18px">
                    </button>
                    <button type="button" class="btn btn-default" aria-label="Left Align" title="Italic (Teks miring)" onclick="addElement(\'Italic\')">
                      <img src="italic.png" width="18px" height="18px">
                    </button>
                    <button type="button" class="btn btn-default" aria-label="Left Align" title="Underline (Teks bergaris bawah)" onclick="addElement(\'Underline\')">
                      <img src="underline.png" width="18px" height="18px">
                    </button>
                    </div>
                    &nbsp;
                    <div class="btn-group">
                    <button type="button" title="Tambah kutipan (Quote)" class="btn btn-default" aria-label="Left Align" onclick="addElement(\'Quote\')">
                      <img src="quote.png" width="18px" height="18px">
                    </button>
                    <button type="button" title="Tambah pranala luar (link)" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#modalLink">
                      <img src="link.png" width="18px" height="18px">
                    </button>
                    <button type="button" title="Tambah URL gambar" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#modalGambar">
                      <img src="image.png" width="18px" height="18px">
                    </button>
                    </div>
                      </h3>
                  </div>
                  <div class="panel-body">
                ';
              $d = urlencode($_SERVER['REQUEST_URI']);
              echo '<form method="post" action="tambah_konten.php?location='.$d.'&id='.$_GET['id'].'&aksi=jawab">
                      <p align="left"><textarea id="jawab" class="form-control" name="jawaban" rows="4" cols="136" placeholder="Isi jawaban anda disini..."></textarea></p>
                      <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Tambahkan</button>
                    </form>';
              echo '
                    </div>
                </div></div></div></div></div>';
                      //Fungsi yang satu ini hidden dan akan melakukan passing jika tombol login ditekan
                      //Isi yang dipassing ada lokasi halaman terakhir sebelum login
             }
             $loc = urlencode($_SERVER['REQUEST_URI']);
              echo '<script type="text/javascript">
                function doConfirm(id,id_pertanyaan) 
                {
                  if(confirm("Apakah anda yakin ingin menghapus jawaban ini?"))
                  {
                    window.location.href = "deletequery.php?id=" + id + "&id_pertanyaan=" + id_pertanyaan + "&location='.$loc.'&aksi=jawaban";
                  }
                }
              </script>';
          ?>
          <script type="text/javascript">
            $('form').submit(function () {
                window.onbeforeunload = null;
            });
            window.onbeforeunload = function()
            {
              if (document.getElementById("jawab").value != "")
              {
                return 'Komentar belum dipublikasi. Isian akan hilang jika anda beralih dari halaman ini.';
              }
            };
            function addLink()
            {
              var x = document.getElementById("link").value;
              var urlRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
              if(!urlRegExp.test(x))
              {
                alert("URL tidak valid. Silahkan isi dengan benar.");
              }
              else
              {
                var y = '<a href="' + x + '">' + x + '</a>';
                document.getElementById("jawab").value += y;
                $('#modalLink').modal('hide');
              }
            }
            function addGambar()
            {
              var x = document.getElementById("urlimg").value;
              var img = new Image();
              img.src = x;
              img.onerror = function()
              {
                alert("URL gambar tidak valid atau tidak bisa dimuat. Silahkan isi dengan benar.");
              };
              img.onload = function()
              {
                var y = '<img src="' + x + '">';
                document.getElementById("jawab").value += y;
                $('#modalGambar').modal('hide');
              };
            }
            function addElement(operation)
            {
              var textarea = document.getElementById("jawab");
              //alert(textarea);
              if ('selectionStart' in textarea)
              {
                  // check whether some text is selected in the textarea
                  if (textarea.selectionStart != textarea.selectionEnd)
                  {
                    if(operation === "Bold")
                    {
                      var newText = textarea.value.substring (0, textarea.selectionStart) + 
                          '<b>' + textarea.value.substring  (textarea.selectionStart, textarea.selectionEnd) + '</b>' +
                          textarea.value.substring (textarea.selectionEnd);
                      textarea.value = newText;
                    }
                    else if(operation === "Link")
                    {
                      var x = document.getElementById("link").value;
                      var urlRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
                      if(!urlRegExp.test(x))
                      {
                        alert("URL tidak valid. Silahkan isi dengan benar.");
                      }
                      else
                      {
                        var newText = textarea.value.substring (0, textarea.selectionStart) + 
                          '<a href="' + x + '">' + textarea.value.substring  (textarea.selectionStart, textarea.selectionEnd) + '</a>' +
                          textarea.value.substring (textarea.selectionEnd);
                        textarea.value = newText;
                        $('#modalLink').modal('hide');
                      }
                    }
                    else if(operation === "Italic")
                    {
                      var newText = textarea.value.substring (0, textarea.selectionStart) + 
                          '<i>' + textarea.value.substring  (textarea.selectionStart, textarea.selectionEnd) + '</i>' +
                          textarea.value.substring (textarea.selectionEnd);
                      textarea.value = newText;
                    }
                    else if(operation === "Underline")
                    {
                      var newText = textarea.value.substring (0, textarea.selectionStart) + 
                          '<u>' + textarea.value.substring  (textarea.selectionStart, textarea.selectionEnd) + '</u>' +
                          textarea.value.substring (textarea.selectionEnd);
                      textarea.value = newText;
                    }
                    else if(operation === "Quote")
                    {
                      var newText = textarea.value.substring (0, textarea.selectionStart) + 
                          '<blockquote>' + textarea.value.substring  (textarea.selectionStart, textarea.selectionEnd) + '</blockquote>' +
                          textarea.value.substring (textarea.selectionEnd);
                      textarea.value = newText;
                    }
                  }
                  else
                  {
                    if(operation === "Bold")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<b>Masukkan teks cetak tebal disini</b>';
                    }
                    else if(operation === "Link")
                    {
                      var lk = document.getElementById("link").value;
                      var urlRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
                      if(!urlRegExp.test(lk))
                      {
                        alert("URL tidak valid. Silahkan isi dengan benar.");
                      }
                      else
                      {
                        var x = document.getElementById("jawab").value;
                        var y = '<a href="' + lk + '">' + lk + '</a>';
                        document.getElementById("jawab").value = x + y;
                        $('#modalLink').modal('hide');
                      }
                    }
                    else if(operation === "Italic")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<i>Masukkan teks cetak miring disini</i>';
                    }
                    else if(operation === "Underline")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<u>Masukkan teks bergaris bawah disini</u>';
                    }
                    else if(operation === "Quote")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<blockquote>Masukkan teks kutipan disini</blockquote>';
                    }
                  }
              }
              else 
              {
                  var textRange = document.selection.createRange ();
                  var rangeParent = textRange.parentElement ();
                  if (rangeParent === textarea)
                  {
                    if(operation === "Bold")
                    {
                      textRange.text = "<b>" + textRange.text + "</b>";
                    }
                    else if(operation === "Link")
                    {
                      var x = document.getElementById("link").value;
                      var urlRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
                      if(!urlRegExp.test(x))
                      {
                        alert("URL tidak valid. Silahkan isi dengan benar.");
                      }
                      else
                      {
                        textRange.text = '<a href="' + x + '">' + textRange.text + "</a>";
                        $('#modalLink').modal('hide');
                      }
                    }
                    else if(operation === "Italic")
                    {
                      textRange.text = "<i>" + textRange.text + "</i>";
                    }
                    else if(operation === "Underline")
                    {
                      textRange.text = "<u>" + textRange.text + "</u>";
                    }
                    else if(operation === "Quote")
                    {
                      textRange.text = "<blockquote>" + textRange.text + "</blockquote>";
                    }
                  }
                  else
                  {
                    if(operation === "Bold")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<b>Masukkan teks cetak tebal disini</b>';
                    }
                    else if(operation === "Link")
                    {
                      var lk = document.getElementById("link").value;
                      var urlRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
                      if(!urlRegExp.test(lk))
                      {
                        alert("URL tidak valid. Silahkan isi dengan benar.");
                      }
                      else
                      {
                        var x = document.getElementById("jawab").value;
                        var y = '<a href="' + lk + '">' + lk + '</a>';
                        document.getElementById("jawab").value = x + y;
                        $('#modalLink').modal('hide');
                      }
                    }
                    else if(operation === "Italic")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<i>Masukkan teks cetak miring disini</i>';
                    }
                    else if(operation === "Underline")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<u>Masukkan teks bergaris bawah disini</u>';
                    }
                    else if(operation === "Quote")
                    {
                      var x = document.getElementById("jawab").value;
                      document.getElementById("jawab").value = x + '<blockquote>Masukkan teks kutipan disini</blockquote>';
                    }
                  }
              }
            }
            </script>
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
<!doctype html>

<html>
<head>
  <title>Kotak Masuk | IT Corner - Forum IT Terkini!</title>
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
    <a id="top"></a>
    <div class="navbar navbar-fixed-top navbar-inverse outer-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="padding:0px;margin:0px;" href="#"><img src="it_corner.png" style="padding-top:1px"></a>
        </div>
        <!--List navigation-->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
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
        <button type="button" class="btn btn-primary" onclick="addLink()">Lanjutkan</button>
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
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-envelope"></span> Kotak Masuk</p>
        </div>
          <div class="panel-body">
    <?php
    include ('connection/connect_to_oracle.php');
    $kategori = $tanggal = $nama = $isi = $judul = "";
    if(isset($_GET['status']) && $_GET['status']=="terkirim")
    {
      echo "<div class='col-md-12'>
            <div class='alert alert-dismissable alert-success fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            Pesan berhasil dikirim
            </div>
            </div>";
    }
    
    $kode = $_SESSION['username'];
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
              Komentar berhasil dimasukkan</div>';
      }
      elseif($_GET['status'] == 'hapus')
      {
        echo '<div class="alert alert-success alert-dismissable fade in">
              <a class="close" data-dismiss="alert" href="#">&times;</a>
              Komentar berhasil dihapus</div>';
      }
      elseif($_GET['status'] == 'kunci')
      {
        echo '<div class="alert alert-success alert-dismissable fade in">
              <a class="close" data-dismiss="alert" href="#">&times;</a>
              Artikel berhasil dikunci</div>';
      }
      elseif($_GET['status'] == 'lepas')
      {
        echo '<div class="alert alert-success alert-dismissable fade in">
              <a class="close" data-dismiss="alert" href="#">&times;</a>
              Kunci Artikel berhasil dilepas</div>';
      }
    }
    
            //pagination initialization
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $numContent = 5;
            $startAt = $numContent * ($page - 1);
            //Pagination//
            $que = "SELECT COUNT(*) as count FROM pesan WHERE username='$kode'";
            if($result=mysql_query($que))
            {
              $obj=mysql_fetch_object($result);
              $jml = $obj->count;
            }
            $query = mysql_query("update user set pesan_flag=".$jml." where username='".$_SESSION['username']."'");
            $totalpage = ceil($jml / $numContent);
            if($jml == 0)
            {
              if(isset($_SESSION['nama']))
              {
                  echo '<p align="center"><img src="comment.png" align="center"></p>';
                  echo '<h2 align="center">Tidak ada pesan dalam kotak masuk</h2>';
              }
            }
            else
            {
              echo '
              <div class="row">
                <div class="col-sm-5">
                <div class="text-left">Halaman '.$page.' dari '.$totalpage.'</div>
                </div>
                <div class="col-sm-7">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
              ';
              if($page > 5)
              {
                echo '<li><a href="pesan.php?id='.$kode.'&page=1" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
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
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
            }

          $result = mysql_query("SELECT u.username, u.gambar, p.subyek, p.isi_pesan, u.nama, DATE_FORMAT(p.waktu, '%d-%m-%Y - %H:%i') AS tanggal FROM pesan as p, user as u WHERE p.username_sender=u.username AND p.username='".$kode."' LIMIT $startAt, $numContent");
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
            $loc = urlencode($_SERVER['REQUEST_URI']);
            echo '    
                  <div class="col-md-11" style="padding-left:0px">
                    <h4 style="margin-top: 7px;">';
                    if($row["nama"] == 'Admin')
                    {
                      echo ''.$row["nama"].'';
                    }
                    else
                    {
                      echo ''.$row["nama"].' <a href="profil.php?location='.$loc.'&user='.$row["username"].'"><button class="btn btn-info btn-xs">Lihat profil</button></a>
                      <a href="tulis_pesan.php?location='.$loc.'&user='.$row["username"].'"><button class="btn btn-info btn-xs">Tulis pesan</button></a>';
                    }
                    echo '<h4>
                    <h5 style="margin-top: -4px;">'.$format_tanggal.'</h5>
                  </div>
                </div>
              </div>
             </div>
                <div class="panel-body-response">
                  <h4>'.$row["subyek"].'</h4>
                  <p>'.$row["isi_pesan"].'</p>';
            echo '
                </div>
              </div>
            </div>
            ';
          }
        if($jml != 0)
        {
        echo '
              <div class="row">
              <div class="col-sm-5">
                <div class="text-left">Halaman '.$page.' dari '.$totalpage.'</div>
                </div>
                <div class="col-sm-7">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
              ';
              if($page > 5)
              {
                echo '<li><a href="pesan.php?id='.$kode.'&page=1" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
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
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
          }
        ?>
          </div>
        </div>
      </div>
      <div class="col-md-12">
      <a name="terkirim"></a> 
        <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-check"></span> Pesan Terkirim</p>
        </div>
          <div class="panel-body">
    <?php
    include ('connection/connect_to_oracle.php');
    $kategori = $tanggal = $nama = $isi = $judul = "";
    $kode = $_SESSION['username'];
    $loc = urlencode($_SERVER['REQUEST_URI']);
    
            //pagination initialization
            $pageterkirim = (isset($_GET['pageterkirim'])) ? (int)$_GET['pageterkirim'] : 1;
            $numContentterkirim = 5;
            $startAtterkirim = $numContentterkirim * ($pageterkirim - 1);
            //Pagination//
            $que = "SELECT COUNT(*) as count FROM pesan WHERE username_sender='$kode'";
            if($result=mysql_query($que))
            {
              $obj=mysql_fetch_object($result);
              $jmlterkirim = $obj->count;
            }
            $totalpageterkirim = ceil($jmlterkirim / $numContentterkirim);
            if($jmlterkirim == 0)
            {
              if(isset($_SESSION['nama']))
              {
                  echo '<p align="center"><img src="comment.png" align="center"></p>';
                  echo '<h2 align="center">Tidak ada pesan dalam kotak masuk</h2>';
              }
            }
            else
            {
              echo '
              <div class="row">
                <div class="col-sm-5">
                <div class="text-left">Halaman '.$pageterkirim.' dari '.$totalpageterkirim.'</div>
                </div>
                <div class="col-sm-7">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
              ';
              if($pageterkirim > 5)
              {
                echo '<li><a href="pesan.php?id='.$kode.'&pageterkirim=1#terkirim" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($pageterkirim != 1)
              {
                $beforeterkirim = ($pageterkirim - 1);
                echo '<li><a href="pesan.php?id='.$kode.'&pageterkirim='.$beforeterkirim.'#terkirim" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
              $iterkirim=1;
              if($pageterkirim <= 5 && $totalpageterkirim > 5)
              {
                $totalshowterkirim = $pageterkirim + 4;
                  for ($iterkirim = 1; $iterkirim <= $totalpageterkirim; $iterkirim++)
                  {
                      if($iterkirim == $totalshowterkirim)
                      {
                        break;
                      }
                      else if($iterkirim != $pageterkirim)
                      {
                        echo "<li><a href='pesan.php?id=".$kode."&pageterkirim=".$iterkirim."#terkirim'>$iterkirim<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a href='#0'>".$pageterkirim."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                }
                elseif($pageterkirim > 5 && $totalpageterkirim > 5)
                {
                  $totalshowterkirim = $pageterkirim + 4;
                  $iterkirim = $pageterkirim - 3;
                  for ($iterkirim; $iterkirim <= $totalpageterkirim; $iterkirim++)
                  {
                      if($iterkirim == $totalshowterkirim)
                      {
                        break;
                      }
                      else if($iterkirim != $pageterkirim)
                      {
                        echo "<li><a href='pesan.php?id=".$kode."&pageterkirim=".$iterkirim."#terkirim'>$iterkirim<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a>".$pageterkirim."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                  }
                  else
                  {
                    for ($iterkirim = 1; $iterkirim <= $totalpageterkirim; $iterkirim++)
                    {
                      if($iterkirim != $pageterkirim)
                      {
                        echo "<li><a href='pesan.php?id=".$kode."&pageterkirim=".$iterkirim."#terkirim'>$iterkirim<span class='sr-only'>(current)</span></a></li>";
                      }
                      else
                      {
                        echo "<li class='active'><a>".$pageterkirim."<span class='sr-only'>(current)</span></a></li>";
                      }
                    }
                  }

              if($pageterkirim != $totalpageterkirim)
              {
                $afterterkirim = ($pageterkirim + 1);
                echo '<li><a href="pesan.php?id='.$kode.'&pageterkirim='.$afterterkirim.'#terkirim" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="pesan.php?id='.$kode.'&pageterkirim='.$totalpageterkirim.'#terkirim" aria-label="Previous"><span aria-hidden="true">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
            }

          $result = mysql_query("SELECT u.username, u.gambar, p.username_sender, p.subyek, p.isi_pesan, u.nama, DATE_FORMAT(p.waktu, '%d-%m-%Y - %H:%i') AS tanggal FROM pesan as p, user as u WHERE p.username=u.username AND p.username_sender='".$_SESSION['username']."' LIMIT $startAtterkirim, $numContentterkirim");
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
              <div class="panel-title-response" style="color:black">
              <p style="font-size:14px;font-style:italic">Dikirim '.$format_tanggal.'</p>';
            }
            else
            {
              echo '<div class="panel-heading-response">
              <div class="panel-title-response">
              <p style="font-size:14px;font-style:italic">Dikirim '.$format_tanggal.'</p>';;
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
            $loc = urlencode($_SERVER['REQUEST_URI']);
            echo '
                  <div class="col-md-11" style="padding-left:0px">
                    <h4 style="margin-top: 7px;">';
                    if($row["nama"] == 'Admin')
                    {
                      echo ''.$row["nama"].'';
                    }
                    else
                    {
                      echo '<p>'.$row["nama"].'</p>
                      <p><a href="profil.php?location='.$loc.'&user='.$row["username"].'"><button class="btn btn-info btn-xs">Lihat profil</button></a>
                      <a href="tulis_pesan.php?location='.$loc.'&user='.$row["username"].'"><button class="btn btn-info btn-xs">Tulis pesan</button></a></p>';
                    }
                    echo '<h4>
                  </div>
                </div>
              </div>
             </div>
                <div class="panel-body-response">
                  <h4>'.$row["subyek"].'</h4>
                  <p>'.$row["isi_pesan"].'</p>';
            echo '
                </div>
              </div>
            </div>
            ';
          }
        if($jml != 0)
        {
        echo '
              <div class="row">
              <div class="col-sm-5">
                <div class="text-left">Halaman '.$page.' dari '.$totalpage.'</div>
                </div>
                <div class="col-sm-7">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
              ';
              if($page > 5)
              {
                echo '<li><a href="pesan.php?id='.$kode.'&page=1" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='pesan.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
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
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="pesan.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
          }
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
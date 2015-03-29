<!doctype html>

<html>
<head>
  <title>IT Corner - Forum IT Terkini!</title>
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
          <div class="panel-body">
          <h2 align="center">Hasil pencarian</h2>

          <div class="row">
            <div class="col-md-5">
            <form id="cariForm" action="cari.php" method="GET">
                <h4 align="left">Cari artikel atau pertanyaan</h4>
                    <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                      <input type="text" class="form-control" id="cari" name="search" placeholder="Masukkan kata pencarian disini...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Cari</button>
                      </span>
                    </div>
                    <p class="fade in" id="errormsg" align="left" style="display:none;color:red"></p>
            </form>
            </div>

            <div class="col-md-4 col-md-offset-3" style="padding-top:40px">
              <p align="right"><a href="home.php" <button type="button" class="btn btn-primary">Kembali ke beranda</button></a></p>
            </div>
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

                  <br>
                  <?php
                  if(isset($_GET['search']) && $_GET['search'] != '')
                  {
                      echo '<div class="alert alert-info">
                          Mencari artikel dan pertanyaan dengan kata pencarian <b>'.$_GET['search'].'</b>. Klik tabulasi untuk melihat hasil pencarian.</div>';
                  }
                  if(isset($_GET['pertanyaan']))
                  {
                  echo '<script type="text/javascript">
                        $(function () {
                          $(\'#myTab a[href="#profile"]\').tab(\'show\')
                        })
                        </script>';
                  }
                  ?>
          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="myTab">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Artikel</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pertanyaan</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home">
            <?php 
            include ('connection/connect_to_oracle.php');

            //pagination initialization
            $pageArtikel = (isset($_GET['artikel'])) ? (int)$_GET['artikel'] : 1;
            $numContentArtikel = 5;
            $startAtArtikel = $numContentArtikel * ($pageArtikel - 1);

            $que = "SELECT COUNT(*) as count from artikel as a,user as u where (a.isi_artikel LIKE '%".$_GET['search']."%' OR a.judul_artikel LIKE '%".$_GET['search']."%') AND a.status='1' AND a.username=u.username order by a.id_artikel desc";
              if($result=mysql_query($que))
              {
                $obj=mysql_fetch_object($result);
                $countArtikel = $obj->count;
              }
              $totalpageArtikel = ceil($countArtikel / $numContentArtikel);

            if($countArtikel != 0)
            {
              echo '<br><div class="pull-left"><p>'.$countArtikel.' konten ditemukan</p></div>';
              echo '<div class="pull-right"><p>Halaman '.$pageArtikel.' dari '.$totalpageArtikel.'</p></div><br>';
            }

            $a=0;
            $query="select a.id_artikel, a.judul_artikel, a.kategori_artikel, DATE_FORMAT(a.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, a.isi_artikel from artikel as a,user as u where (a.isi_artikel LIKE '%".$_GET['search']."%' OR a.judul_artikel LIKE '%".$_GET['search']."%') AND a.status='1' AND a.username=u.username order by a.id_artikel desc LIMIT $startAtArtikel, $numContentArtikel";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
            $kode = $row['id_artikel'];
            $potong_artikel = substr($row['isi_artikel'],0,160);
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
              <input type="submit" value="Baca selengkapnya" class="btn btn-success">
                  <input class="form-control" type="hidden" name="id" value="'.$kode.'">
              </label>
              </form>
              
              <hr>';
              $a++;
          }
          if($a==0)
          {
            echo '<h2 align="center">- Tidak ada artikel yang ditemukan -</h2>';
          }
          else
          {
            //Pagination//
              echo '
                <p align="center">Navigasi</p>
                  <div class="text-center">
                    <ul class="pagination">
              ';
              if($pageArtikel == 1)
              {
                echo '<li class="disabled"><a href="#0" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
              else
              {
                $before = ($pageArtikel - 1);
                echo '<li><a href="cari.php?search='.$_GET['search'].'&artikel='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
                  
              for ($i = 1; $i <= $totalpageArtikel; $i++)
              {
                if($i != $pageArtikel)
                {
                  echo "<li><a href='cari.php?search=".$_GET['search']."&artikel=$i'>$i<span class='sr-only'>(current)</span></a></li>";
                }
                else
                {
                  echo "<li class='active'><a href='#0'>".$pageArtikel."<span class='sr-only'>(current)</span></a></li>";
                }
              }

              if($pageArtikel == $totalpageArtikel)
              {
                echo '<li class="disabled"><a href="#0" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
              }
              else
              {
                $after = ($pageArtikel + 1);
                echo '<li><a href="cari.php?search='.$_GET['search'].'&artikel='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }
              echo '</ul>
                 </div>';
              //- end of pagination -//
          }
        ?>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="profile">
             <?php
            //pagination initialization
            $pagePertanyaan = (isset($_GET['pertanyaan'])) ? (int)$_GET['pertanyaan'] : 1;
            $numContentPertanyaan = 5;
            $startAtPertanyaan = $numContentPertanyaan * ($pagePertanyaan - 1);

            $quep = "SELECT COUNT(*) as count from pertanyaan as p,user as u where (p.isi_pertanyaan LIKE '%".$_GET['search']."%' OR p.judul_pertanyaan LIKE '%".$_GET['search']."%') AND p.status='1' AND p.username=u.username order by p.id_pertanyaan desc";
            if($result=mysql_query($quep))
            {
              $obj=mysql_fetch_object($result);
              $countPertanyaan = $obj->count;
            }
            $totalpagePertanyaan = ceil($countPertanyaan / $numContentPertanyaan);

            if($countPertanyaan != 0)
            {
            echo '<br><div class="pull-left"><p>'.$countPertanyaan.' konten ditemukan</p></div>';
            echo '<div class="pull-right"><p>Halaman '.$pagePertanyaan.' dari '.$totalpagePertanyaan.'</p></div><br>';
            }

            $a=0;
            $query="select p.id_pertanyaan, p.judul_pertanyaan, p.kategori_pertanyaan, DATE_FORMAT(p.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, p.isi_pertanyaan from pertanyaan as p,user as u where (p.isi_pertanyaan LIKE '%".$_GET['search']."%' OR p.judul_pertanyaan LIKE '%".$_GET['search']."%') && p.username=u.username && p.status='1' order by p.id_pertanyaan desc LIMIT $startAtPertanyaan, $numContentPertanyaan";
            $rows=mysql_query($query);
            while($row=mysql_fetch_assoc($rows))
            {
              $kode = $row['id_pertanyaan'];
              $potong_pertanyaan = substr($row['isi_pertanyaan'],0,160);
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
                <input type="submit" value="Baca selengkapnya" class="btn btn-success">
                    <input class="form-control" type="hidden" name="id" value="'.$kode.'">
                </label>
                </form>
                <hr>';
                $a++;
            }
            if($a==0)
            {
              echo '<h2 align="center">- Tidak ada pertanyaan yang ditemukan -</h2>';
            }
            else
            {
              //Pagination//
              echo '
                <p align="center">Navigasi</p>
                  <div class="text-center">
                    <ul class="pagination">
              ';
              if($pagePertanyaan == 1)
              {
                echo '<li class="disabled"><a href="#0" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
              else
              {
                $before = ($pagePertanyaan - 1);
                echo '<li><a href="cari.php?search='.$_GET['search'].'&pertanyaan='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
                  
              for ($i = 1; $i <= $totalpagePertanyaan; $i++)
              {
                if($i != $pagePertanyaan)
                {
                  echo "<li><a href='cari.php?search=".$_GET['search']."&pertanyaan=$i'>$i<span class='sr-only'>(current)</span></a></li>";
                }
                else
                {
                  echo "<li class='active'><a href='#0'>".$pagePertanyaan."<span class='sr-only'>(current)</span></a></li>";
                }
              }

              if($pagePertanyaan == $totalpagePertanyaan)
              {
                echo '<li class="disabled"><a href="#0" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
              }
              else
              {
                $after = ($pagePertanyaan + 1);
                echo '<li><a href="cari.php?search='.$_GET['search'].'&pertanyaan='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }
            echo '</ul>
               </div>';
            //- end of pagination -//
            }
            ?>
              </div>
              
              </div>

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
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
            <li >
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
    <div class="row" style="padding-top:80px;">

    <div class="col-md-5 col-md-offset-7">
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
          <div class="panel-body">
            <h3 align="left">Kategori: Hardware</h3>
            <p align="left">
              <ul class="nav navbar-nav">
                <li style="margin-right: 5px;">
                <a href="list_pertanyaan_hardware.php"><img src="ram.png" width="70" height="70" title="Hardware (Perangkat Keras)"></a>
                </li>
                <li style="margin-right: 5px;">
                <a href="list_pertanyaan_software.php"><img src="software.png" width="70" height="70" title="Software (Perangkat Lunak)"></a>
                </li>              
                
</ul>
              <br><br><br><br>
            </p>
            <p><a href="list_pertanyaan.php">&larr; Kembali ke semua daftar pertanyaan</a></p>
            <h3 align="left">Pertanyaan Terbaru</h3>
            <hr>
            <?php 
            $a=0;
            include ('connection/connect_to_oracle.php');

            //pagination initialization
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $numContent = 5;
            $startAt = $numContent * ($page - 1);

            $que = "SELECT COUNT(*) as count FROM `pertanyaan` WHERE status='1' AND kategori_pertanyaan='Hardware'";
            if($result=mysql_query($que))
            {
              $obj=mysql_fetch_object($result);
              $count = $obj->count;
            }
            $totalpage = ceil($count / $numContent);

            if($count != 0)
            {
            echo '<p>Halaman '.$page.' dari '.$totalpage.'</p>';
            }

            $query="select p.id_pertanyaan, p.judul_pertanyaan, p.kategori_pertanyaan, u.nama, DATE_FORMAT(p.tanggal, '%d-%m-%Y - %H:%i') AS tanggal , u.nama, p.isi_pertanyaan from pertanyaan as p,user as u where p.username=u.username && p.status='1' && p.kategori_pertanyaan='Hardware' order by p.id_pertanyaan desc LIMIT $startAt, $numContent";
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
            <input type="submit" value="Baca selengkapnya" class="btn btn-success">';

                if(isset($_SESSION['nama']) && $_SESSION['nama'] == "Admin")
                {
                  echo '&nbsp<a onclick="doConfirmPertanyaan(\''.$kode.'\')"> <button type="button" class="btn btn-danger">Hapus pertanyaan</button></a>';
                }

                echo '<input class="form-control" type="hidden" name="id" value="'.$kode.'">';

                echo '<script type="text/javascript">
                function doConfirmPertanyaan(id) 
                {
                  if(confirm("Apakah anda yakin ingin menghapus pertanyaan ini?"))
                  {
                    window.location.href = "deletequery.php?id=" + id + "&location=home.php&aksi=pertanyaan";
                  }
                }
              </script>';

                echo '</label>
                </form>
                <hr>'
                ;
            $a++;
        }
        if($a==0)
        {
          echo '<h2 align="center">- Tidak ada pertanyaan yang ditemukan pada kategori hardware -</h2>';
          echo '<h4 align="center"><a href="list_pertanyaan.php">Kembali ke semua daftar pertanyaan</a></h4>';
        }
        else
            {
              //Pagination//
              echo '
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
                echo '<li><a href="list_pertanyaan.php?page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
              }
                  
              for ($i = 1; $i <= $totalpage; $i++)
              {
                if($i != $page)
                {
                  echo "<li><a href='list_pertanyaan.php?page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
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
                echo '<li><a href="list_pertanyaan.php?page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
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
    
       <!--Footer-->
 </div> 
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
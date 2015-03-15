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
          <h2 align="center">Riwayat Member</h2>
          <title>Pilih bulan</title>Filter konten
            <form method="get" action="riwayat.php">
            <select name="bulan" data-toggle="tooltip" data-placement="top" title="Pilih bulan">
                    <option value="01">Januari</option>     
                     <option value="02">Februari</option>
                     <option value="03">Maret</option>
                     <option value="04">April</option>
                     <option value="05">Mei</option>
                     <option value="06">Juni</option>
                     <option value="07">Juli</option>
                     <option value="08">Agustus</option>
                     <option value="09">September</option>
                     <option value="10">Oktober</option>
                     <option value="11">November</option>
                     <option value="12">Desember</option>
                  </select>
                  <select name="tahun" data-toggle="tooltip" data-placement="top" title="Pilih tahun">
                    <option value="2015">2015</option>     
                     <option value="2014">2014</option>
                     <option value="2013">2013</option>
                  </select>  
                  <button type="submit" class="btn btn-success" id="bulan" >Pilih</button>
                  <a href="riwayat.php?aksi=semua"> <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Menampilkan semua artikel dan pertanyaan yang telah dipublikasikan">Tampilkan semua</button></a>
                  </form>
                  <br>
                  <?php
                  if(isset($_GET['bulan']))
                  {
                    $coba = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
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
                      echo '<div class="alert alert-info">
                          Mencari artikel dan pertanyaan pada bulan <b>'.$coba.'</b> dan tahun <b>'.$tahun.'</b>. Klik tabulasi untuk melihat hasil pencarian.</div>';
                  }

                  if(isset($_GET['aksi']))
                  {
                    echo '<div class="alert alert-info">
                          Menampilkan semua artikel dan pertanyaan. Klik tabulasi untuk melihat hasil.</div>';
                  }
                  
                  ?>
          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Riwayat artikel</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Riwayat pertanyaan</a></li>
              <li role="presentation"><a href="#moderasi" aria-controls="profile" role="tab" data-toggle="tab">Konten dalam konfirmasi</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home">
                <h3 align="center">RIWAYAT ARTIKEL</h3>
            <br>
            
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;width:50px">NO</th>
                  <th style="text-align:center;">JUDUL ARTIKEL</th>
                  <th style="text-align:center;width:200px">KATEGORI ARTIKEL</th>
                  <th style="text-align:center;width:180px">WAKTU</th>
                  
                </tr>

              </thead>
                             <?php
                include ('connection/connect_to_oracle.php');
                $n = $_SESSION['username'];
                if(!empty($_GET['bulan'])){
                 $x = $_GET['bulan'];
                 $t = $_GET['tahun'];
                  $a=0;
                       $query="SELECT id_artikel, judul_artikel, kategori_artikel, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from artikel where status='1' and username='$n' and substr(tanggal,6,2)='$x' and substr(tanggal,1,4)='$t' order by tanggal desc";
                              $rows=mysql_query($query);
                             while($row = mysql_fetch_assoc($rows)){
                              $a++;
                              $id = $row['id_artikel'];
                                echo "<tr>";
                                echo "<td><p align='center'>" . $a."</p></td>";
                                echo '<td><a href="isi_artikel.php?id='.$id.'">' . $row['judul_artikel'] . "</a></td>";
                                echo "<td><p align='center'>" . $row['kategori_artikel'] . "</p></td>";
                                echo "<td>" . $row['tanggal'] . "</td>";
                                echo " </tr>";

                             }
                             echo "</table>";
                           }

                          else{
                            $query="SELECT id_artikel, judul_artikel, kategori_artikel, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from artikel where status='1' and username='$n' order by tanggal desc";
                              $rows=mysql_query($query);
                       $a=0;
                             while($row = mysql_fetch_assoc($rows)){
                              $a++;
                              $id = $row['id_artikel'];
                                echo "<tr>";
                                echo "<td><p align='center'>" . $a."</p></td>";
                                echo '<td><a href="isi_artikel.php?id='.$id.'">' . $row['judul_artikel'] . "</a></td>";
                                echo "<td><p align='center'>" . $row['kategori_artikel'] . "</p></td>";
                                echo "<td>" . $row['tanggal'] . "</td>";
                                echo " </tr>";

                             }
                             echo "</table>";

                          
}

                            if($a==0){
                            echo "<h3 align='center'>- Tidak ada artikel yang ditemukan -</h3>";
                            
                          }
?>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="profile">
                <h3 align="center">RIWAYAT PERTANYAAN</h3>
            <br>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;width:50px">NO</th>
                  <th style="text-align:center;">JUDUL PERTANYAAN</th>
                  <th style="text-align:center;width:200px">KATEGORI PERTANYAAN</th>
                  <th style="text-align:center;width:180px">WAKTU</th>
                </tr>

              </thead>
             <?php

$n = $_SESSION['username'];
if(!empty($_GET['bulan']))
{
 $y = $_GET['bulan'];
$t = $_GET['tahun'];
                       $query="SELECT id_pertanyaan, judul_pertanyaan, kategori_pertanyaan, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from pertanyaan where status='1' and username='$n' and substr(tanggal,6,2)='$y' and substr(tanggal,1,4)='$t' order by tanggal desc";
                        $rows=mysql_query($query);
                       $b=0;
                             while($row = mysql_fetch_assoc($rows)){
                              $b++;
                              $id=$row['id_pertanyaan'];
                                echo "<tr>";
                                echo "<td><p align='center'>" . $b."</p></td>";
                                echo '<td><a href="isi_pertanyaan.php?id='.$id.'">' . $row['judul_pertanyaan'] . "</a></td>";
                                echo "<td><p align='center'>" . $row['kategori_pertanyaan'] . "</p></td>";
                                echo "<td>" . $row['tanggal'] . "</td>";
                                echo " </tr>";

                             }
                             echo "</table>";
                           }

                          else{
                            $query="SELECT id_pertanyaan, judul_pertanyaan, kategori_pertanyaan, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from pertanyaan where status='1' and username='$n' order by tanggal desc";
                              $rows=mysql_query($query);
                       $b=0;
                             while($row = mysql_fetch_assoc($rows)){
                              $b++;
                              $id=$row['id_pertanyaan'];
                                echo "<tr>";
                                echo "<td><p align='center'>" . $b."</p></td>";
                                echo '<td><a href="isi_pertanyaan.php?id='.$id.'">' . $row['judul_pertanyaan'] . "</a></td>";
                                echo "<td><p align='center'>" . $row['kategori_pertanyaan'] . "</p></td>";
                                echo "<td>" . $row['tanggal'] . "</td>";
                                echo " </tr>";

                             }
                             echo "</table>";
                            
}
                             if($b==0){
                            echo "<h3 align='center'>- Tidak ada pertanyaan yang ditemukan -</h3>";
                            
                            
                          }
?>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="moderasi">
              <br>
              <a href="#yok"></a>
              <div class="alert alert-info">
               Memuat semua artikel dan pertanyaan yang telah dibuat namun belum dikonfirmasi oleh admin. Jika anda tidak menemukan
                konten yang anda cari, mungkin konten telah dikonfirmasi (cek tabulasi riwayat artikel atau pertanyaan) atau konten telah
                 dihapus oleh admin.</div>
              <h3 align="left">ARTIKEL DALAM KONFIRMASI</h3>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;width:50px" class="">NO</th>
                  <th style="text-align:center;">JUDUL ARTIKEL</th>
                  <th style="text-align:center;width:200px">KATEGORI ARTIKEL</th>
                  <th style="text-align:center;width:180px">WAKTU</th>
                </tr>

              </thead>
             <?php

            $n = $_SESSION['username'];
            $query="SELECT id_artikel, judul_artikel, kategori_artikel, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal FROM artikel WHERE username='$n' AND status='0' order by tanggal desc";
            $rows=mysql_query($query);
            $b=0;
            while($row = mysql_fetch_assoc($rows))
            {
              $b++;
              $id=$row['id_artikel'];
              echo "<tr>";
              echo "<td><p align='center'>" . $b."</p></td>";
              echo '<td>' . $row['judul_artikel'] . "</td>";
              echo "<td><p align='center'>" . $row['kategori_artikel'] . "</p></td>";
              echo "<td>" . $row['tanggal'] . "</td>";
              echo " </tr>";
            }
            echo "</table>";
            if($b==0)
            {
              echo "<h4 align='center'>- Tidak ada artikel dalam konfirmasi -</h4>";
            }
            ?>
            <hr>
            <h3 align="left">PERTANYAAN DALAM KONFIRMASI</h3>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;width:50px">NO</th>
                  <th style="text-align:center;">JUDUL PERTANYAAN</th>
                  <th style="text-align:center;width:200px">KATEGORI PERTANYAAN</th>
                  <th style="text-align:center;width:180px">WAKTU</th>
                </tr>

              </thead>
             <?php

                $n = $_SESSION['username'];
                $query="SELECT id_pertanyaan, judul_pertanyaan, kategori_pertanyaan, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from pertanyaan where status='0' and username='$n' order by tanggal desc";
                $rows=mysql_query($query);
                $b=0;
                while($row = mysql_fetch_assoc($rows))
                {
                  $b++;
                  $id=$row['id_pertanyaan'];
                  echo "<tr>";
                  echo "<td><p align='center'>" . $b."</p></td>";
                  echo '<td>' . $row['judul_pertanyaan'] . "</td>";
                  echo "<td><p align='center'>" . $row['kategori_pertanyaan'] . "</p></td>";
                  echo "<td>" . $row['tanggal'] . "</td>";
                  echo " </tr>";
                }
                echo "</table>";
                if($b==0)
                {
                  echo "<h4 align='center'>- Tidak ada pertanyaan dalam konfirmasi -</h4>";
                }
              ?>
              </div>

            </div>

          </div>
            
            </table>
          </div>
        </div>
      </div>
      </table>
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
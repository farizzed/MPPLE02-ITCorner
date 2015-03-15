<!doctype html>

<html>
<head>
	<title>IT Corner - Forum IT Terkini!</title>
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
          <h2 align="center">Konfirmasi Konten</h2>
          <?php
            if(isset($_GET['status_artikel']) && $_GET['status_artikel']=="ok")
               {
                echo "<div class='alert alert-dismissable alert-success fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Berhasil!</b> Artikel berhasil dikonfirmasi...
                </div>";
               }
               else if(isset($_GET['status_artikel']) && $_GET['status_artikel']=="gagal"){
                echo "<div class='alert alert-dismissable alert-danger fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Gagal!</b> Artikel gagal dikonfirmasi...
                </div>";
             }
             else if(isset($_GET['status_delartikel']) && $_GET['status_delartikel']=="ok"){
                echo "<div class='alert alert-dismissable alert-success fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Berhasil!</b> Artikel berhasil dihapus...
                </div>";
             }
             else if(isset($_GET['status_delrtikel']) && $_GET['status_delartikel']=="gagal"){
                echo "<div class='alert alert-dismissable alert-danger fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Gagal!</b> Artikel gagal dihapus...
                </div>";
             }
             elseif(isset($_GET['status_pertanyaan']) && $_GET['status_pertanyaan']=="ok")
              {
                echo "<div class='alert alert-dismissable alert-success fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Berhasil!</b> Pertanyaan berhasil dikonfirmasi...
                </div>";
               }
               else if(isset($_GET['status_pertanyaan']) && $_GET['status_pertanyaan']=="gagal"){
                echo "<div class='alert alert-dismissable alert-danger fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Gagal!</b> Pertanyaan gagal dikonfirmasi...
                </div>";
             }
             else if(isset($_GET['status_delpertanyaan']) && $_GET['status_delpertanyaan']=="ok"){
                echo "<div class='alert alert-dismissable alert-success fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Berhasil!</b> Pertanyaan berhasil dihapus...
                </div>";
             }
             else if(isset($_GET['status_delpertanyaan']) && $_GET['status_delpertanyaan']=="gagal"){
                echo "<div class='alert alert-dismissable alert-danger fade in'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <b>Gagal!</b> Pertanyaan gagal dihapus...
                </div>";
             }
             ?>
            <div role="tabpanel">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Konfirmasi artikel</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Konfirmasi pertanyaan</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home">
                <?php
            ?>
            <h4 align="left"> Artikel dalam konfirmasi</h4>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">NO</th>
                  <th style="text-align:center;">JUDUL ARTIKEL</th>
                  <th style="text-align:center;">KATEGORI ARTIKEL</th>
                  <th style="text-align:center;">TANGGAL</th>
                </tr>

              </thead>
              <tbody>
                <?php 
                include ('connection/connect_to_oracle.php');
                  $query = "select id_artikel, judul_artikel, kategori_artikel, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from artikel where status = '0'";
                  //echo "lala";
                  $hasil = mysql_query($query, $koneksi);
                  //echo "lala";
                  //$hmm = mysqli_execute($hasil);
                  //$idapa = 0;
                  $a=0;
                  while ($row = mysql_fetch_array($hasil)) 
                  {
                    $id = $row['id_artikel'];
                    $judul = $row['judul_artikel'];
                    $kategori = $row['kategori_artikel'];
                    $tanggal = $row['tanggal'];
                    $a++;
                    echo "<tr><td style='text-align:center;'>".$a."</td>";
                    echo "<td style='text-align:center;'><a href='konfirmasi_artikel.php?id=".$id."'>".$judul."</a></td>";
                    echo "<td style='text-align:center;'>"."$kategori"."</td>";
                    echo "<td style='text-align:center;'>"."$tanggal"."</td></tr>";
                  }
                  echo '</tbody>
                      </table>';
                  if($a==0)
                  {
                      echo "<h4 align='center'>- Tidak ada artikel dalam konfirmasi -</h4>";
                  }
                  //mysqli_bind_result($hasil);
                  ?>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="profile">
          <h4 align="left"> Pertanyaan dalam konfirmasi</h4>
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align:center;">NO</th>
                  <th style="text-align:center;">JUDUL PERTANYAAN</th>
                  <th style="text-align:center;">KATEGORI PERTANYAAN</th>
                  <th style="text-align:center;">TANGGAL</th>
                </tr>

              </thead>
              <tbody>
                <?php
                  $query1 = "select id_pertanyaan, judul_pertanyaan, kategori_pertanyaan, DATE_FORMAT(tanggal, '%d-%m-%Y - %H:%i') AS tanggal from pertanyaan where status = '0'";
                  //echo "lala";
                  $result = mysql_query($query1, $koneksi);
                  //echo "lala";
                  //$hmm = mysqli_execute($hasil);
                  $b=0;
                  while ($baris = mysql_fetch_array($result)) 
                  {
                    $idper = $baris['id_pertanyaan'];
                    $judulper = $baris['judul_pertanyaan'];
                    $kategoriper = $baris['kategori_pertanyaan'];
                    $tanggalper = $baris['tanggal'];
                    $b++;
                    echo "<tr><td style='text-align:center;'>"."$b"."</td>";
                    echo "<td style='text-align:center;'><a href='konfirmasi_pertanyaan.php?id=".$idper."'>".$judulper."</td>";
                    echo "<td style='text-align:center;'>"."$kategoriper"."</td>";
                    echo "<td style='text-align:center;'>"."$tanggalper"."</td></tr>";
                  }
                  echo '</tbody>
                      </table>';
                  if($b==0)
                  {
                      echo "<h4 align='center'>- Tidak ada pertanyaan dalam konfirmasi -</h4>";
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

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
<!doctype html>

<html>
<head>
  <title>Ubah Profil | IT Corner - Forum IT Terkini!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/datepicker.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap-datepicker.js" type="text/javascript"></script>
  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  })
  </script>
  <script type="text/javascript">
  // When the document is ready
  $(document).ready(function () {
  $('#example1').datepicker
  ({
      format: "dd/mm/yyyy"
  });  
  });
  </script>
</head>
<body>
  <div class="container">
    <!--Header-->
    <div class="navbar navbar-fixed-top navbar-inverse outer-navbar">
    <p class="visible-sm" align="center" style="padding:0px;margin:0px;"><a href="#"><img src="it_corner.png" style="padding-top:1px"></a></p>
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-sm" style="padding:0px;margin:0px;" href="#"><img src="it_corner.png" style="padding-top:1px"></a>

        </div>
        <!--List navigation-->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
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
    <br class="visible-sm"><br class="visible-sm">
    <!--Header-->

    <?php
      if(empty($_SESSION['nama']))
      {
        header("Location:index.php");
      }
      elseif($_SESSION['nama'] == "Admin")
      {
        header("location:index.php");
      }
    ?>
    
    <div class="row" style="padding-top:100px;">
      <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-pencil"></span> Ubah Profil</p>
        </div>
          <div class="panel-body">
            <?php
            include ('connection/connect_to_oracle.php');
            $n = $_SESSION['username'];
            if(isset($_GET['aksi']) && $_GET['aksi']=="daftar")
            {
              echo "<div class='alert alert-info'>
              Asyik, anda sudah terdaftar sebagai member! Hampir sampai, isi profil anda agar anda dapat dikenal oleh member lain.
              </div>";
            }
            if(isset($_POST['user']))
            {
              $n = $_POST['user'];
              $query="SELECT nama, email, gambar, DATE_FORMAT(tanggal_masuk, '%d-%m-%Y') AS tanggal, deskripsi, tanggal_lahir, tempat_tinggal from user where username='$n'";
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
                $nama = $row['nama'];
                echo "<div class='row'>";
                echo "<div class='col-sm-3'>";
                //Untuk gambar
                if($row['gambar'] == NULL)
                {
                  echo "<p align='center'><img src='anon.jpg' width='200px' height='200px'></p></div>";
                }
                else
                {
                  echo "<p align='center'><img src='".$row['gambar']."' width='200px' height='200px'></p></div>";
                }
                
                //Profil member lengkap
                echo "<div class='col-sm-9'>";
                echo "<p style='font-size:30px;font-style:bold;'>" .$nama."</p>";
                echo "<h4>Member sejak</h4>
                " . $format_tanggal . "";

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
                if($row['tanggal_lahir'] == NULL)
                {
                  echo '<br><br><h4>Tanggal Lahir</h4>
                  - Member ini malu-malu ketika ditanya tanggal lahirnya -';
                }
                else
                {
                  echo '<br><br><h4>Tanggal Lahir</h4>
                  ' . $row['tanggal_lahir'] . '';
                }
              }
              echo "</div>";
            }
            else
            {
              echo'
              <div class="row">
                <div class="col-sm-3">
                  <form id="upload" action="file_upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label">Foto profil</label>';

                      $n = $_SESSION['username'];
                      $query="SELECT gambar from user where username='$n'";
                      $rows=mysql_query($query);
                      while($row = mysql_fetch_assoc($rows))
                      {
                        echo '<br>';
                        //Untuk gambar
                        if($row['gambar'] == NULL)
                        {
                          echo "<p><img src='anon.jpg' width='250px' height='250px'></p>";
                        }
                        else
                        {
                          echo "<p><img src='".$row['gambar']."' width='250px' height='250px'></p>";
                        }
                      }

                  echo'
                      <div class="controls">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                      </div>
                    </div>
                    <p class="fade in" id="errormsg" style="display:none;color:red"></p>';
                    
                    //Jika member setelah mendaftar
                    if(isset($_GET['location']))
                    {
                      echo '<input type="hidden" name="location" value="';
                      echo htmlspecialchars($_GET['location']);
                      echo '" />';
                    }

                  echo '
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Unggah gambar</button>
                  </form>
                </div>
                <script type="text/javascript">';

                echo "
                function getExtension(filename)
                {
                  var parts = filename.split('.');
                  return parts[parts.length - 1];
                }

                function isImage(filename)
                {
                  var ext = getExtension(filename);
                  switch (ext.toLowerCase())
                  {
                    case 'jpg':
                    case 'gif':
                    case 'png':
                    case 'jpeg':
                      //etc
                      return true;
                  }
                  return false;
                }

                $('#upload').on('submit', function(e)
                {
                  var file = $('#fileToUpload');

                  if ($('#fileToUpload').val()=='')
                  {
                    e.preventDefault();
                    $('#errormsg').text('- Anda belum memilih berkas foto. Silahkan pilih berkas foto yang akan anda unggah -').show();
                  }
                  else if(!isImage(file.val()))
                  {
                    e.preventDefault();
                    $('#errormsg').text('- Berkas yang dipilih tidak sesuai ketentuan. Hanya foto berekstensi .jpg, .jpeg, .png, .gif, dan .bmp diperbolehkan -').show();
                  }
                  else if(!($('#fileToUpload')[0].files[0].size < 2000000))
                  {
                      //Prevent default and display error
                      e.preventDefault();
                      $('#errormsg').text('- kebesaran -').show();
                  }
                });";
                
                $n = $_SESSION['username'];
                $query="SELECT deskripsi, DATE_FORMAT(tanggal_lahir, '%d/%m/%Y') AS tanggal, tempat_tinggal from user where username='$n'";
                $rows=mysql_query($query);
                while($row = mysql_fetch_assoc($rows))
                {
                  echo '
                  </script>
                  <div class="col-sm-9" style="border-left:1px solid silver">
                    <form id="kirim" method="POST" action="queryprofil.php">
                      <div class="form-group">
                        <label class="control-label">Asal</label> - <i>Beritahu darimana asal anda</i>
                        <div class="controls">';

                          if($row['tempat_tinggal'] == NULL)
                          {
                            echo '<input id="judul" class="form-control" type="text" name="asal" placeholder="Tuliskan asal anda disini">';
                          }
                          else
                          {
                            echo '<input id="judul" class="form-control" type="text" name="asal" value="'.$row['tempat_tinggal'].'">';
                          }
                    
                    echo '
                        </div>
                      </div>
                      <div id="isiantanggal" class="form-group">
                        <label class="control-label">Tanggal lahir</label> - <i>Format: dd/mm/yyyy</i>
                        <div class="controls">';

                          if($row['tanggal'] == NULL)
                          {
                            echo '<input type="text" name="tanggal" class="form-control" placeholder="Klik untuk melanjutkan" id="example1">';
                          }
                          else
                          {
                            echo '<input id="example1" class="form-control" type="text" name="tanggal" value="'.$row['tanggal'].'">';
                          }

                    echo '<span class="fade in" id="errormsgtgl" style="display:none;color:red;font-style:italic;font-size:16px;"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Biografi</label> - <i>Tuliskan deskripsi singkat tentang diri anda (maksimal 1000 karakter)</i>
                        ';
                          if($row['deskripsi'] == NULL)
                          {
                            echo '<textarea id="isi" class="form-control" name="bio" rows="10" placeholder="Tuliskan deskripsi singkat tentang anda disini"></textarea>';
                          }
                          else
                          {
                            echo '<textarea id="isi" class="form-control" name="bio" rows="10">'.$row['deskripsi'].'</textarea>';
                          }

                    echo '
                        <div class="pull-right"><br>';
                    if(isset($_GET['aksi']) && $_GET['aksi'] == 'daftar')
                    {
                      echo '<a href="'.$_GET['location'].'"><button class="btn btn-primary">Tidak, terima kasih - Saya akan ubah profil saya nanti</button></a>';
                    }
                    elseif(isset($_GET['location']))
                    {
                      echo '<a href="'.$_GET['location'].'" <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Batalkan</button></a>';
                    }

                    //Jika member setelah mendaftar
                    if(isset($_GET['location']))
                    {
                      echo '<input type="hidden" name="location" value="';
                      echo htmlspecialchars($_GET['location']);
                      echo '" />';
                    }
                    echo '
                          <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>';
              }
            }
            echo "</div>";
          ?>
          </div>
          </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
<script type="text/javascript">
  $('#kirim').on('submit', function(e)
  {
    var isError;
    var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
    if(isDate($('#example1').val()))
    {
      
    }
    else
    {
      e.preventDefault();
      document.getElementById('isiantanggal').className += ' has-error';
      $('#errormsgtgl').text('Format tanggal salah. Format tanggal adalah "hari/bulan/tahun".').show();
    }
            
    /*if (!$('#example1').val()=='')
    {
      document.getElementById('isianjudul').className += ' has-error';
      isError = true;
    }
    if ($('#isi').val()=='')
    {
      document.getElementById('isian').className += ' has-error';
      isError = true;
    }
    if(isError == true)
    {
      e.preventDefault();
      $('#errormsg').text('Isian tidak boleh kosong').show();
    }*/
  });

  function isDate(txtDate)
  {
    var currVal = txtDate;
    if(currVal == '')
        return true;

    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Declare Regex
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    
    if (dtArray == null) 
        return false;
    
    //Checks for mm/dd/yyyy format.
    dtDay= dtArray[1];
    dtMonth = dtArray[3];
    dtYear = dtArray[5];        
    
    if (dtMonth < 1 || dtMonth > 12) 
        return false;
    else if (dtDay < 1 || dtDay> 31) 
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
        return false;
    else if (dtMonth == 2) 
    {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                return false;
    }
    return true;
  }
</script>
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
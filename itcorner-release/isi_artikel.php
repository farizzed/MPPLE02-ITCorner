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
        $loc = urlencode($_SERVER['REQUEST_URI']);
        echo '<div class="alert alert-info">
                <h4>Kelola artikel - Administrator</h4>
                <p>Apa yang akan anda lakukan terhadap artikel ini?</p>
                <h5><a href="home.php"> <button type="button" class="btn btn-info">Kembali ke beranda</button></a>
                &nbsp;
                <a href="list_artikel.php"> <button type="button" class="btn btn-info">Kembali ke daftar artikel</button></a>
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

            //pagination initialization
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $numContent = 5;
            $startAt = $numContent * ($page - 1);
            //Pagination//
            $que = "SELECT COUNT(*) as count FROM komentar WHERE id_artikel='$kode'";
            if($result=mysql_query($que))
            {
              $obj=mysql_fetch_object($result);
              $jml = $obj->count;
            }
            $totalpage = ceil($jml / $numContent);
            if($jml == 0)
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
            else
            {
              echo '
              <div class="row">
                <div class="col-sm-5">
                <div class="text-left">'.$jml.' komentar</div>
                </div>
                <div class="col-sm-7">
                <div class="text-right">
                  <ul class="pagination pagination-sm">
                  <li><a href="#komen">Halaman '.$page.' dari '.$totalpage.'</a></li>
              ';
              if($page > 5)
              {
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page=1" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                        echo "<li><a href='isi_artikel.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='isi_artikel.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='isi_artikel.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
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
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
            }

          $result = mysql_query("SELECT k.id_komentar, k.isi_komentar, k.nama, DATE_FORMAT(k.tanggal, '%d-%m-%Y - %H:%i') AS tanggal FROM komentar as k WHERE k.id_artikel=".$kode." LIMIT $startAt, $numContent;");
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
                  <h4>'.$row["nama"].'</h4>
                  <h5>'.$format_tanggal.'</h5>
                  <p>'.$row["isi_komentar"].'</p>';
                  if(isset($_SESSION['nama']))
                  {
                    if($_SESSION['nama'] == "Admin" || $_SESSION['nama'] == $row["nama"])
                    {
                      $kodekomen = $row["id_komentar"];
                      echo '<a onclick="doConfirm(\''.$kodekomen.'\')"> <button type="button" class="btn btn-danger">Hapus komentar</button></a></h5>';
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
                  <li><a href="#komen">Halaman '.$page.' dari '.$totalpage.'</a></li>
              ';
              if($page > 5)
              {
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page=1" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
              }

              if($page != 1)
              {
                $before = ($page - 1);
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page='.$before.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
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
                        echo "<li><a href='isi_artikel.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='isi_artikel.php?id=".$kode."&page=".$i."'>$i<span class='sr-only'>(current)</span></a></li>";
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
                        echo "<li><a href='isi_artikel.php?id=".$kode."&page=$i'>$i<span class='sr-only'>(current)</span></a></li>";
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
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page='.$after.'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>';
              }

              if(($totalpage - $page >= 4))
              {
                echo '<li><a href="isi_artikel.php?id='.$kode.'&page='.$totalpage.'" aria-label="Previous"><span aria-hidden="true">&rarr;</span></a></li>';
              }
              echo '</ul>
                 </div></div></div>';
              //- end of pagination -//
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
                echo '
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                    <p>Kakas bantu</p>
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
                echo '<form method="post" action="tambah_konten.php?location='.$d.'&id='.$_GET['id'].'&aksi=komentar">
                          <p align="left"><textarea id="komen" class="form-control" name="komentar" rows="4" cols="136"></textarea></p>
                          <input class="btn btn-success" type="submit" value="Tambahkan"/>
                        </form>';
                echo '
                    </div>
                </div>';
                //Fungsi yang satu ini hidden dan akan melakukan passing jika tombol login ditekan
                //Isi yang dipassing ada lokasi halaman terakhir sebelum login
              }
              $loc = urlencode($_SERVER['REQUEST_URI']);
              echo '<script type="text/javascript">
                function doConfirm(id) 
                {
                  if(confirm("Apakah anda yakin ingin menghapus komentar ini?"))
                  {
                    window.location.href = "deletequery.php?id=" + id + "&location='.$loc.'&aksi=komentar";
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
              if (document.getElementById("komen").value != "")
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
                document.getElementById("komen").value += y;
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
                document.getElementById("komen").value += y;
                $('#modalGambar').modal('hide');
              };
            }
            function addElement(operation)
            {
              var textarea = document.getElementById("komen");
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
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<b>Masukkan teks cetak tebal disini</b>';
                    }
                    else if(operation === "Italic")
                    {
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<i>Masukkan teks cetak miring disini</i>';
                    }
                    else if(operation === "Underline")
                    {
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<u>Masukkan teks bergaris bawah disini</u>';
                    }
                    else if(operation === "Quote")
                    {
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<blockquote>Masukkan teks kutipan disini</blockquote>';
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
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<b>Masukkan teks cetak tebal disini</b>';
                    }
                    else if(operation === "Italic")
                    {
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<i>Masukkan teks cetak miring disini</i>';
                    }
                    else if(operation === "Underline")
                    {
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<u>Masukkan teks bergaris bawah disini</u>';
                    }
                    else if(operation === "Quote")
                    {
                      var x = document.getElementById("komen").value;
                      document.getElementById("komen").value = x + '<blockquote>Masukkan teks kutipan disini</blockquote>';
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
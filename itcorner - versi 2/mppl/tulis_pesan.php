<!doctype html>
<?php
session_start();
?>
<html>
<head>
	<title>Kirim Pesan | IT Corner - Forum IT Terkini!</title>
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
            <?php include 'header.php'; ?>
        </div>
        <!--List navigation-->
      </div>
    </div>
    <!--Header-->

<div class="row" style="padding-top:100px;">
      <div class="col-md-12 ">
        <div class="panel panel-default">
        <div class="panel-heading">
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-envelope"></span> Tulis pesan</p>
        </div>
          <div class="panel-body">
          <?php
           if(isset($_GET['status']) && $_GET['status']=="kosong")
           {
            echo "<div class='alert alert-dismissable alert-danger fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            Isian tidak boleh kosong
            </div>";
           }
           else if(isset($_GET['status']) && $_GET['status']=="gagal"){
            echo "<div class='alert alert-dismissable alert-danger fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <b>Gagal!</b> Artikel anda gagal dimasukkan
            </div>";
           }

          include ('connection/connect_to_oracle.php');

          $loc = urlencode($_SERVER['REQUEST_URI']);
          $n = $_GET['user'];
          $query="SELECT username,nama, gambar from user where username='$n'";
          $rows=mysql_query($query);
          while($row = mysql_fetch_assoc($rows))
          {
            if(isset($_GET['location']))
            {
                echo '<a href="'.$_GET['location'].'" <button type="button" class="btn btn-primary">&larr; Kembali</button></a><br><br>';
            }
            echo '<i>Menulis pesan kepada:</i><br>';
            echo '<div class="row">
                  <div class="col-md-2">';
            if($row["gambar"] == NULL)
            {
              echo '<img align="left" style="width: 160px; height: 160px;margin-top: 2px" title="'.$row["nama"].' avatar" src="anon.jpg">
                  </div>';
            }
            else
            {
              echo '<img align="left" style="width: 160px; height: 160px;margin-top: 2px" src="'.$row["gambar"].'">
                  </div>';
            }
            echo '    
                  <div class="col-md-10" style="padding-left:0px">
                    <h1 style="margin-top: 7px;">';
                    echo ''.$row["nama"].'<br><a href="profil.php?location='.$loc.'&user='.$row["username"].'" <button type="button" class="btn btn-info">Lihat Profil</button></a>';
                    echo '<h1>
                  </div>
              </div><br>';
          }

           ?>
          <form id="kirim" action="kirim_pesan.php" method="POST">
			       <div id="isianjudul" class="form-group">
                <label class="control-label">Subyek/Judul Pesan</label>
                <div class="controls">
                  <input id="subyek" class="form-control" type="text" name="subyek">
                </div>
              </div> 
            
            <div id="isian" class="form-group">
              <label class="control-label">Isi Pesan</label> <p class="fade in" id="errormsgisi" style="display:none;color:red"></p>
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                    <p style="font-style:italic">Anda bisa gunakan kakas bantu</p>
                      <div class="btn-group">
                    <button type="button" title="Bold (Teks tebal)" class="btn btn-default" aria-label="Left Align" onclick="addElement('Bold')">
                      <img src="bold.png" width="18px" height="18px">
                    </button>
                    <button type="button" class="btn btn-default" aria-label="Left Align" title="Italic (Teks miring)" onclick="addElement('Italic')">
                      <img src="italic.png" width="18px" height="18px">
                    </button>
                    <button type="button" class="btn btn-default" aria-label="Left Align" title="Underline (Teks bergaris bawah)" onclick="addElement('Underline')">
                      <img src="underline.png" width="18px" height="18px">
                    </button>
                    </div>
                    &nbsp;
                    <div class="btn-group">
                    <button type="button" title="Tambah kutipan (Quote)" class="btn btn-default" aria-label="Left Align" onclick="addElement('Quote')">
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
              <textarea id="isi" class="form-control" name="isi" rows="10"></textarea>
              <div class="pull-right">
              <?php echo '<input type="hidden" name="user" value="'.$n.'">';
              echo '<input type="hidden" name="location" value="'.$_GET['location'].'">';?>
                  <br><span class="fade in" id="errormsg" style="display:none;color:red;font-style:italic;font-size:16px;"></span> <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Kirim</button>
                </div>
              </div>
              </div>
              </div>
              </form>
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
  if ($('#subyek').val()=='')
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
  }
});

$('form').submit(function () {
    window.onbeforeunload = null;
});
  window.onbeforeunload = function()
  {
    if (document.getElementById("isi").value != "" || document.getElementById("subyek").value != "")
    {
      return 'Pesan belum dikirim. Isian akan hilang jika anda beralih dari halaman ini.'
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
      document.getElementById("isi").value += y;
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
        document.getElementById("isi").value += y;
        $('#modalGambar').modal('hide');
      };
    }
    function addElement(operation)
    {
      var textarea = document.getElementById("isi");
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
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<b>Masukkan teks cetak tebal disini</b>';
            }
            else if(operation === "Italic")
            {
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<i>Masukkan teks cetak miring disini</i>';
            }
            else if(operation === "Underline")
            {
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<u>Masukkan teks bergaris bawah disini</u>';
            }
            else if(operation === "Quote")
            {
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<blockquote>Masukkan teks kutipan disini</blockquote>';
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
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<b>Masukkan teks cetak tebal disini</b>';
            }
            else if(operation === "Italic")
            {
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<i>Masukkan teks cetak miring disini</i>';
            }
            else if(operation === "Underline")
            {
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<u>Masukkan teks bergaris bawah disini</u>';
            }
            else if(operation === "Quote")
            {
              var x = document.getElementById("isi").value;
              document.getElementById("isi").value = x + '<blockquote>Masukkan teks kutipan disini</blockquote>';
            }
          }
        }
      }
  </script>

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
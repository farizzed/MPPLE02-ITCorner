<!doctype html>
<?php
session_start();
?>
<html>
<head>
	<title>Tambah Artikel | IT Corner - Forum IT Terkini!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <script src="assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/bodyotstrap/js/editor.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(".alert").fadeOut(3000);
  </script>
</head>
<body onLoad="iFrameOn();">

<!-- Modal Link-->
<div class="modal fade" id="modalLink" tabindex="-1" role="dialog" aria-labelledby="modalLinkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="center" class="modal-title" id="modalLinkLabelLabel">Tambah Link URL (Pranala luar)</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="link" class="control-label">Masukkan link URL:</label>
            <input type="text" class="form-control" value="http://" id="link">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" onclick="iLink()">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalGambar" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="center" class="modal-title" id="modalGambarLabel">Tambah URL Gambar</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="link" class="control-label">Masukkan URL gambar yang valid:</label>
            <input type="text" class="form-control" value="http://" id="urlimg">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
        <button type="button" class="btn btn-primary" onclick="iImage()">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>

  <div id="container" class="container">
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
            <li class="dropdown-split-left active">
              <a href="list_artikel.php" class="caret-before">Artikel</a>
            </li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle caret-after" data-toggle="dropdown">
                <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a href="../icons/"><i class="fa fa-flag fa-fw"></i>&nbsp; All Icons</a></li>
                <li class="divider"></li>
                <li><a href="../icons/#new"><i class="fa fa-diamond fa-fw"></i>&nbsp; New Icons in 4.3</a></li>
                <li><a href="../icons/#web-application"><i class="fa fa-camera-retro fa-fw"></i>&nbsp; Web Application Icons</a></li>
                <li><a href="../icons/#transportation"><i class="fa fa-ship fa-fw"></i>&nbsp; Transportation Icons</a></li>
                <li><a href="../icons/#file-type"><i class="fa fa-file-image-o fa-fw"></i>&nbsp; File Type Icons</a></li>
                <li><a href="../icons/#spinner"><i class="fa fa-spinner fa-fw"></i>&nbsp; Spinner Icons</a></li>
                <li><a href="../icons/#form-control"><i class="fa fa-check-square fa-fw"></i>&nbsp; Form Control Icons</a></li>
                <li><a href="../icons/#payment"><i class="fa fa-credit-card fa-fw"></i>&nbsp; Payment Icons</a></li>
                <li><a href="../icons/#chart"><i class="fa fa-pie-chart fa-fw"></i>&nbsp; Chart Icons</a></li>
                <li><a href="../icons/#currency"><i class="fa fa-won fa-fw"></i>&nbsp; Currency Icons</a></li>
                <li><a href="../icons/#text-editor"><i class="fa fa-file-text-o fa-fw"></i>&nbsp; Text Editor Icons</a></li>
                <li><a href="../icons/#directional"><i class="fa fa-hand-o-right fa-fw"></i>&nbsp; Directional Icons</a></li>
                <li><a href="../icons/#video-player"><i class="fa fa-play-circle fa-fw"></i>&nbsp; Video Player Icons</a></li>
                <li><a href="../icons/#brand"><i class="fa fa-github fa-fw"></i>&nbsp; Brand Icons</a></li>
                <li><a href="../icons/#medical"><i class="fa fa-medkit fa-fw"></i>&nbsp; Medical Icons</a></li>
              </ul>
            </li>

            <li class="dropdown-split-left">
              <a href="list_pertanyaan.php" class="caret-before">Pertanyaan</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle caret-after" data-toggle="dropdown">
                <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li><a href="../icons/"><i class="fa fa-flag fa-fw"></i>&nbsp; All Icons</a></li>
                <li class="divider"></li>
                <li><a href="../icons/#new"><i class="fa fa-diamond fa-fw"></i>&nbsp; New Icons in 4.3</a></li>
                <li><a href="../icons/#web-application"><i class="fa fa-camera-retro fa-fw"></i>&nbsp; Web Application Icons</a></li>
                <li><a href="../icons/#transportation"><i class="fa fa-ship fa-fw"></i>&nbsp; Transportation Icons</a></li>
                <li><a href="../icons/#file-type"><i class="fa fa-file-image-o fa-fw"></i>&nbsp; File Type Icons</a></li>
                <li><a href="../icons/#spinner"><i class="fa fa-spinner fa-fw"></i>&nbsp; Spinner Icons</a></li>
                <li><a href="../icons/#form-control"><i class="fa fa-check-square fa-fw"></i>&nbsp; Form Control Icons</a></li>
                <li><a href="../icons/#payment"><i class="fa fa-credit-card fa-fw"></i>&nbsp; Payment Icons</a></li>
                <li><a href="../icons/#chart"><i class="fa fa-pie-chart fa-fw"></i>&nbsp; Chart Icons</a></li>
                <li><a href="../icons/#currency"><i class="fa fa-won fa-fw"></i>&nbsp; Currency Icons</a></li>
                <li><a href="../icons/#text-editor"><i class="fa fa-file-text-o fa-fw"></i>&nbsp; Text Editor Icons</a></li>
                <li><a href="../icons/#directional"><i class="fa fa-hand-o-right fa-fw"></i>&nbsp; Directional Icons</a></li>
                <li><a href="../icons/#video-player"><i class="fa fa-play-circle fa-fw"></i>&nbsp; Video Player Icons</a></li>
                <li><a href="../icons/#brand"><i class="fa fa-github fa-fw"></i>&nbsp; Brand Icons</a></li>
                <li><a href="../icons/#medical"><i class="fa fa-medkit fa-fw"></i>&nbsp; Medical Icons</a></li>
              </ul>
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
          <p class="panel-title" style="font-size:18px"><span class="glyphicon glyphicon-plus"></span> Tambah Artikel</p>
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
           ?>
          <form id="kirim" action="tambah_artikelquery.php" method="POST">
			       <div id="isianjudul" class="form-group">
                <label class="control-label">Judul Artikel</label>
                <div class="controls">
                  <input id="judul" class="form-control" type="text" name="judul">
                </div>
              </div>
            <div class="form-group">
              <label class="control-label">Kategori</label>
              <div class="controls">
                <select class="form-control" name= "kategori">
                    <option value="Software"> Software </option>
                    <option value="Hardware"> Hardware </option>
                  </select>
              </div>
            </div>  
            
            <div id="isian" class="form-group">
              <label class="control-label">Isi Artikel</label>
              <div id="panel" class="panel panel-default" style="border:0px;webkit-box-shadow: 0 0 0;box-shadow: 0 0 0;">
                  <div class="panel-heading">
                    <h3 class="panel-title">

                              <select id="ukuran" class="option-control" name="bulan" title="Ukuran tulisan dalam pixel" onchange="iFontSize(this[this.selectedIndex].value)">
                                <option value="1">10px</option>
                                <option value="2">13px</option>
                                <option value="3">16px</option>
                                <option value="4" selected>18px</option>
                                <option value="5">24px</option>
                                <option value="6">32px</option>
                                <option value="7">48px</option>
                              </select>

                              <input type="color" class="option-control">

                            <div class="btn-group" data-toggle="buttons">
                            <label id="align-left" title="Rata kiri (Align left)" class="btn btn-default active">
                              <input type="checkbox" autocomplete="off" onchange="iAlignLeft()">
                              <span class="fa fa-align-left"></span>
                            </label>
                            <label id="align-center" title="Rata tengah (Align center)" class="btn btn-default">
                            <input type="checkbox" autocomplete="off" onchange="iAlignCenter()">
                              <span class="fa fa-align-center"></span>
                            </label>
                            <label id="align-right" title="Rata kanan (Align right)" class="btn btn-default">
                              <input type="checkbox" autocomplete="off" onchange="iAlignRight()">
                              <span class="fa fa-align-right"></span>
                            </label>
                          </div>

                          <div class="btn-group" data-toggle="buttons">
                            <label id="bold" title="Cetak tebal (Bold)" class="btn btn-default">
                            <input type="checkbox" autocomplete="off" onchange="iBold()">
                                <span class="fa fa-bold"></span>
                            </label>
                            <label id="italic" title="Cetak miring (Italic)" class="btn btn-default">
                              <input type="checkbox" autocomplete="off" onchange="iItalic()">
                                <span class="fa fa-italic"></span>
                            </label>
                            <label id="underline" title="Cetak garis bawah (Underline)" class="btn btn-default">
                              <input type="checkbox" autocomplete="off" onchange="iUnderline()">
                                <span class="fa fa-underline"></span>
                            </label>
                          </div>

                          <div class="btn-group" data-toggle="buttons">
                            <label id="ordered" title="Ordered list" class="btn btn-default">
                            <input type="checkbox" autocomplete="off" onchange="iOrderedList()">
                                <span class="fa fa-list-ol"></span>
                            </label>
                            <label id="unordered" title="Unordered list" class="btn btn-default">
                              <input type="checkbox" autocomplete="off" onchange="iUnorderedList()">
                                <span class="fa fa-list-ul"></span>
                            </label>
                          </div>

                          <div class="btn-group">
                              <button type="button" class="btn btn-default" title="Tambah pranala luar (Hyperlink)" autocomplete="off" data-toggle="modal" data-target="#modalLink">
                                <span class="fa fa-link"></span>
                              </button>
                              <button type="button" class="btn btn-default" title="Putus pranala terkait (Unlink hyperlink)" autocomplete="off" onclick="iUnLink()">
                                <span class="fa fa-chain-broken"></span>
                              </button>
                              <button type="button" class="btn btn-default" title="Masukkan gambar URL" autocomplete="off" data-toggle="modal" data-target="#modalGambar">
                                <span class="fa fa-file-image-o"></span>
                              </button>
                          </div>

                    </h3>
                  </div>
                <div class="panel-body" style="padding:0px;">
                    
                  <textarea style="display:none;" id="isi" class="form-control" name="isi" cols="100" rows="14"></textarea>
                    <iframe class="editor" name="richTextField" id="richTextField" onfocus="editorFocus()" onblur="editorBlur()"></iframe>
                
                </div>
              </div>
              <div class="pull-right">
                  <span class="fade in" id="errormsg" style="display:none;color:red;font-style:italic;font-size:16px;"></span> <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Publikasikan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  /*oDoc = document.getElementById("richTextField");
  oDoc.contentWindow.document.onpaste = function ()
  {
    var before = window.frames['richTextField'].document.body.innerHTML;

    setTimeout(function(){
        var after = window.frames['richTextField'].document.body.innerHTML;
        var pos1 = -1;
        var pos2 = -1;
        for (var i=0; i<after.length; i++) {
            if (pos1 == -1 && before.substr(i, 1) != after.substr(i, 1)) pos1 = i;
            if (pos2 == -1 && before.substr(before.length-i-1, 1) != after.substr(after.length-i-1, 1)) pos2 = i;
        }
        var pasted = after.substr(pos1, after.length-pos2-pos1);
        var replace = pasted.replace(/<[^>]+>/g, '');
        var replaced = after.substr(0, pos1)+replace+after.substr(pos1+pasted.length);

        window.frames['richTextField'].document.body.innerHTML = replaced;
    }, 0);
  }*/
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
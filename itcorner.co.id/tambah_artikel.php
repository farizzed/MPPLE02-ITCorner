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
    <div class="navbar navbar-fixed-top navbar-inverse outer-navbar">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          
        </div>
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			<li>
			<img src="it_corner.png" style="padding-top:1px">
			</li>
            <li >
              <a href="home_user.php">Beranda</a>
            </li>
            <li class="active">
              <a href="list_artikel_user.php">Artikel</a>
            </li>
            <li>
              <a href="list_pertanyaan_user.php">Pertanyaan</a>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="home_user.php" style="color:#FFFFFF">Fariz Aulia Pradipta</a>
            </li>
            <li>
              <a href="riwayat.php">Riwayat</a>
            </li>
			      
            <li>
              <a href="logout.php">Keluar</a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
<div class="row" style="padding-top:100px;">
      <div class="col-md-12 ">
        <div class="panel panel-default">
          <div class="panel-body">
          <form method="POST">
		  <h2> Tambah Artikel </h2>
			<div class="form-group">
              <label class="control-label">Judul Artikel</label>
              <div class="controls">
                <input class="form-control" type="text" name="judul">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Kategori</label>
              <div class="controls">
                <select class="form-control" name= "kategori">
                    <option value="S3"> Software </option>
                    <option value="S4"> Hardware </option>
                  </select>
              </div>
            </div>
         
            <div class="form-group">
              <label class="control-label">Isi Artikel</label>
              <textarea class="form-control" name="isi"></textarea>
            </div>
                <div class="pull-right">
                  <a class="btn btn-success">Publikasikan</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
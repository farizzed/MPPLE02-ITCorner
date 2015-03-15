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
<body background="backhome.jpg" style="background-position:center;background-attachment:fixed">
  <div class="container">
    <div class="navbar navbar-fixed-top navbar-white" style="box-shadow: 0px 1px 5px #888888;">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          
        </div>
		
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			<li>
			<img src="itcorner-hitam.png" style="padding-top:1px">
			</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
                $a = urlencode($_SERVER['REQUEST_URI']);
                $b = 'login.php?location=' .$a;
                $c = 'daftar.php?location=' .$a;
            echo '<li>
              <a href="'.$b.'" style="color:black">Masuk</a>
            </li>
            <li>
              <a href="'.$c.'" style="color:black">Daftar</a>
            </li>';
          ?>
          </ul>
        </div>
      </div>
    </div>
</div>
    
 <div class="row" style="padding-top:50px;">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="fill"><img src="it2.jpg" alt="..."></div>
      <div class="carousel-caption">
          <h3><b>Forum IT Terkini!</b><br></h3>
      </div>
    </div>
    <div class="item">
      <div class="fill"><img src="indo.jpg" alt="..."></div>
      <div class="carousel-caption">
          <h3>Bergabunglah dengan seluruh anak IT di Indonesia</h3>
      </div>
    </div>
    <div class="item">
      <div class="fill"><img src="know.jpg" alt="..."></div>
      <div class="carousel-caption">
          <h3>Ingin menanyakan sesuatu? Ingin menambah ilmu? <br> ayo gabung sekarang!</h3>
      </div>
    </div>
  </div>
<!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
        </a>

</div>
</div>
<script>
  $('.carousel').carousel({
  interval: 3000
})
  </script>

<div class="container">
    <div class="row" style="padding-top:10px;padding-left:20px">
    <div class="col-md-6 ">
    <h3 style="color:white">Selamat datang di IT Corner!</h3>
    <p align="left" style="color:white">
                IT corner adalah sebuah forum yang membahas informasi, pertanyaan, berita seputar teknologi informasi. Anda bisa bertukar ilmu,
                 bertanya terkait dengan IT, membahas teknologi terbaru di dunia IT, dan saling bertukar pendapat. Ayo gabung sekarang! Dapatkan 
                 konten IT up-to-date hanya di IT Corner!
    </p>
        </div>
        <div class="col-md-6 ">
        <a href="home.php">
        <div id="buttonholder2">
        <h3>Tamu</h3>
        <p>Masuk sebagai tamu, anda dapat melihat artikel dan pertanyaan pada forum</p>
        </div>
        </a>

        <a href="login.php">
        <div id="buttonholder3">
         <h3>Member</h3>
        <p>Masuk sebagai member, anda akan mendapatkan akses penuh forum</p>
        </div>
        </a>
        </div>
     </div>
     

            <table class="table table-hover table-bordered table-striped">
              <thead>
              </thead>
              <tbody>
              </tbody>
            </table>
</div>

<div class="navbar">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <p align="center" style="color:white">MPPL E02 | Fariz Aulia Pradipta - Claudia Primasiwi - Nicko Rahmadhano - Atika Faradina Randa - Uti Solichah - Biandina Meidyani</p>
        </div>
      </div>
    </div>
</div>

  </body>
  </html>
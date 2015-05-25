<?php     
include ('connection/connect_to_oracle.php');
echo '<script type="text/javascript">
$(function ()
    {
      $(\'[data-toggle="tooltip"]\').tooltip()
    }) 
</script>';

            //echo $_SESSION['nama'];
            if(!empty($_SESSION['nama']))
            {
              if ($_SESSION['nama'] == 'Admin')
              {
                if(isset($_SERVER['REQUEST_URI']))
                {
                  $laman = explode('?', $_SERVER['REQUEST_URI']);
                  $laman1 = $laman[0];
                }
                $que = "SELECT COUNT(*) as count FROM artikel WHERE status='0'";
                if($result=mysql_query($que))
                {
                  $obj=mysql_fetch_object($result);
                  $jmlartikel = $obj->count;
                }
                $que = "SELECT COUNT(*) as count FROM pertanyaan WHERE status='0'";
                if($result=mysql_query($que))
                {
                  $obj=mysql_fetch_object($result);
                  $jmlpertanyaan = $obj->count;
                }
                $jml = $jmlartikel + $jmlpertanyaan;
                if($laman1 == '/mppl/konfirmasi.php')
                {
                  if($jml==0)
                  {
                    echo '
                          <li class="active">
                            <a>Konfirmasi</a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                            <a href="" style="color:#FFFFFF"> Halo, '; 
                   echo $_SESSION['nama'];
                   echo '</a>
                          </li>
                          <li>
                            <a href="logout.php">Keluar</a>
                          </li>
                          <li>
                        </ul>
                        ';
                  }
                  else
                  {
                    echo '
                          <li class="active">
                            <a href="konfirmasi.php" data-toggle="tooltip" data-placement="bottom" title="'.$jml.' konten dalam konfirmasi">Konfirmasi <span class="badge">'.$jml.'</span></a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                            <a href="" style="color:#FFFFFF"> Halo, '; 
                   echo $_SESSION['nama'];
                   echo '</a>
                          </li>
                          <li>
                            <a href="logout.php">Keluar</a>
                          </li>
                          <li>
                        </ul>
                        ';
                  }
                }
                else if($laman1 == '/mppl/konfirmasi_artikel.php' || $laman1 == '/mppl/konfirmasi_pertanyaan.php')
                {
                  if($jml==0)
                  {
                    echo '
                          <li class="active">
                            <a>Konfirmasi</a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                            <a href="" style="color:#FFFFFF"> Halo, '; 
                   echo $_SESSION['nama'];
                   echo '</a>
                          </li>
                          <li>
                            <a href="logout.php">Keluar</a>
                          </li>
                          <li>
                        </ul>
                        ';
                  }
                  else
                  {
                    echo '
                          <li class="active">
                            <a href="konfirmasi.php" data-toggle="tooltip" data-placement="bottom" title="'.$jml.' konten dalam konfirmasi">Konfirmasi <span class="badge">'.$jml.'</span></a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                            <a href="" style="color:#FFFFFF"> Halo, '; 
                   echo $_SESSION['nama'];
                   echo '</a>
                          </li>
                          <li>
                            <a href="logout.php">Keluar</a>
                          </li>
                          <li>
                        </ul>
                        ';
                  }
                }
                else
                {
                  if($jml==0)
                  {
                    echo '
                          <li>
                            <a href="konfirmasi.php">Konfirmasi</a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                            <a href="" style="color:#FFFFFF"> Halo, '; 
                   echo $_SESSION['nama'];
                   echo '</a>
                          </li>
                          <li>
                            <a href="logout.php">Keluar</a>
                          </li>
                          <li>
                        </ul>
                        ';
                  }
                  else
                  {
                    echo '
                          <li>
                            <a href="konfirmasi.php" data-toggle="tooltip" data-placement="bottom" title="'.$jml.' konten dalam konfirmasi">Konfirmasi <span class="badge">'.$jml.'</span></a>
                          </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                            <a href="" style="color:#FFFFFF"> Halo, '; 
                   echo $_SESSION['nama'];
                   echo '</a>
                          </li>
                          <li>
                            <a href="logout.php">Keluar</a>
                          </li>
                          <li>
                        </ul>
                        ';
                  }
                }
              }
              else if (isset($_SESSION['nama']))
              {
                $pecah = explode('?',trim($_SERVER['REQUEST_URI']));
                if($pecah[0] == '/mppl/riwayat.php')
                {
                $arr = explode(' ',trim($_SESSION['nama']));
                 echo '
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a style="color:#FFFFFF" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Halo, ';
                  echo $arr[0];
                  $que = "SELECT COUNT(*) as count FROM pesan WHERE username='".$_SESSION['username']."'";
                  if($result=mysql_query($que))
                  {
                    $obj=mysql_fetch_object($result);
                    $jmlPesan = $obj->count;
                  }
                  $que = "SELECT pesan_flag as flag FROM user WHERE username='".$_SESSION['username']."'";
                  if($result=mysql_query($que))
                  {
                    $obj=mysql_fetch_object($result);
                    $pesanTerbaca = $obj->flag;
                  }
                  if($jmlPesan > $pesanTerbaca)
                  {
                    $pesanBaru = $jmlPesan-$pesanTerbaca;
                    echo ' <span class="badge"><span class="glyphicon glyphicon-envelope"></span> '.$pesanBaru.'</span>';
                  }
                  echo '</a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="profil.php?user='.$_SESSION['username'].'">Lihat profil</a></li>
                          <li><a href="edit_profil.php?location='.urlencode($_SERVER['REQUEST_URI']).'">Edit profil</a></li>
                          <li role="presentation" class="divider"></li>';
                          if(isset($pesanBaru) && $pesanBaru > 0)
                          {
                            echo '<li role="presentation" class="dropdown-header"><span class="glyphicon glyphicon-envelope"></span> '.$pesanBaru.' pesan baru</li>';
                          }
                          echo '<li><a href="pesan.php">Kotak masuk</a></li>
                        </ul>
                      </li>
                        <li class="active">
                          <a href="riwayat.php">Riwayat</a>
                        </li>
                        <li>
                          <a href="logout.php">Keluar</a>
                        </li>
                      </ul>
                      ';
                }
                else
                {
                  $arr = explode(' ',trim($_SESSION['nama']));
                  echo '
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <a style="color:#FFFFFF" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Halo, ';
                  echo $arr[0];
                  $que = "SELECT COUNT(*) as count FROM pesan WHERE username='".$_SESSION['username']."'";
                  if($result=mysql_query($que))
                  {
                    $obj=mysql_fetch_object($result);
                    $jmlPesan = $obj->count;
                  }
                  $que = "SELECT pesan_flag as flag FROM user WHERE username='".$_SESSION['username']."'";
                  if($result=mysql_query($que))
                  {
                    $obj=mysql_fetch_object($result);
                    $pesanTerbaca = $obj->flag;
                  }
                  if($jmlPesan > $pesanTerbaca)
                  {
                    $pesanBaru = $jmlPesan-$pesanTerbaca;
                    echo ' <span class="badge"><span class="glyphicon glyphicon-envelope"></span> '.$pesanBaru.'</span>';
                  }
                  echo '</a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="profil.php?user='.$_SESSION['username'].'">Lihat profil</a></li>
                          <li><a href="edit_profil.php?location='.urlencode($_SERVER['REQUEST_URI']).'">Edit profil</a></li>
                          <li role="presentation" class="divider"></li>';
                          if(isset($pesanBaru) && $pesanBaru > 0)
                          {
                            echo '<li role="presentation" class="dropdown-header"><span class="glyphicon glyphicon-envelope"></span> '.$pesanBaru.' pesan baru</li>';
                          }
                          echo '<li><a href="pesan.php">Kotak masuk</a></li>
                        </ul>
                      </li>
                        <li>
                          <a href="riwayat.php">Riwayat</a>
                        </li>
                        <li>
                          <a href="logout.php">Keluar</a>
                        </li>
                      </ul>
                      ';
                }
              }
            }
            else
            {
                $a = urlencode($_SERVER['REQUEST_URI']);
                $b = 'login.php?location=' .$a;
                $c = 'daftar.php?location=' .$a;
                echo '
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li>
                        <a href="'. $b .'">Masuk</a>
                      </li>
                      <li>
                        <a href="'. $c .'">Daftar</a>
                      </li>
                    </ul>
                ';
            }
?>
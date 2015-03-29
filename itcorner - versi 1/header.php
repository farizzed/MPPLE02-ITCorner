<?php            
            //echo $_SESSION['nama'];
            if(!empty($_SESSION['nama']))
            {
              if ($_SESSION['nama'] == 'Admin')
              {
                if($_SERVER['REQUEST_URI'] == '/mppl/konfirmasi.php')
                {
                  echo '
                          <li class="active">
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
              }
              else if (isset($_SESSION['nama']))
              {
                if($_SERVER['REQUEST_URI'] == '/mppl/riwayat.php')
                {
                 echo '
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li>
                          <a href="" style="color:#FFFFFF"> Halo, '; 
                  echo $_SESSION['nama'];;
                  echo '</a>
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
                  echo '
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li>
                          <a href="" style="color:#FFFFFF"> Halo, '; 
                  echo $_SESSION['nama'];;
                  echo '</a>
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
<?php
include ('connection/connect_to_oracle.php');
session_start();
echo $_POST['location'];
//Cek apakah halaman login sebelumnya menyimpan lokasi halaman terakhir
if($_POST['location'] != '')
{
  if($_POST['location'] == "/mppl/index.php")
  {
   $redirect = "/mppl/home.php";
   echo $redirect;
  }
  else
  {
    $redirect = $_POST['location'];
  }
}
else
{
  $redirect = NULL;
}

$user = $_POST['username'];
$pass = $_POST['password'];
$capt = $_POST['captcha'];

if ($user == "" || $pass == "" || $capt == "")
{
  //Passing p=1 jika semuanya kosong, maka akan diredirect ke halaman login dengan passing url p
  //dan location yang sudah disimpan
  $url = 'login.php?p=1';
  if(isset($redirect))
  {
     $url .= '&location=' . urlencode($redirect) . '&user=' . $user;
  }
  header("Location: " . $url);
  exit();
}
elseif ($capt != "3JYP4")
{
  //Passing p=2 jika captchanya salah, maka akan diredirect ke halaman login dengan passing url p
  //dan location yang sudah disimpan
  $url = 'login.php?p=2';
  if(isset($redirect))
  {
     $url .= '&location=' . urlencode($redirect) . '&user=' . $user;
  }
  header("Location: " . $url);
  exit();
}
elseif($user == "admin" && $pass == "admin" && $capt == "3JYP4")
{
  $admin = "Admin";
  $_SESSION['nama'] = $admin;
  if(isset($redirect))
  {
    header("Location:". $redirect);
  }
  exit();
}
else 
{
  $row = mysql_query("select nama,password,username from user where username='$user' AND password='$pass'");
    $nama = mysql_fetch_object($row);
    //$password = $nama->password;
    if ($nama != NULL)
    {
      $_SESSION['nama'] = $nama->nama;
      $_SESSION['username'] = $nama->username;
      if(isset($redirect))
      {
        header("Location:". $redirect);
      }
      exit();
    }
    else
    {
      //Passing p=3 jika captchanya benar namun username sama pass salah, maka akan diredirect ke halaman login dengan passing url p
      //dan location yang sudah disimpan
      $url = 'login.php?p=3';
      if(isset($redirect))
      {
         $url .= '&location=' . urlencode($redirect) . '&user=' . $user;
      }
      header("Location: " . $url);
      exit();
    }
  }
?>
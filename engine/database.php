<?php
    $servername='localhost';
    $username='seunolul_admin';
    $password='test14820!';
    $dbname = "seunolul_Webresponse";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

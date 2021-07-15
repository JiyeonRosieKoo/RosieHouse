<?php
function db_init($host, $duser, $dpw, $dname){
$conn = mysqli_connect($host, $duser, $dpw); //php에 내장되어있는 mysqli_connect() API를 사용하여 mysql과 열기
mysqli_select_db($conn, $dname); //db에 접근
return $conn;
}
 ?>

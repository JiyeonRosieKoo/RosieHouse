<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
  $sql = "SELECT * FROM login WHERE userName='".$_POST['userName']."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if($row['pw']===$_POST['pw'])
  {
    header('Location: http://ec2-3-35-207-50.ap-northeast-2.compute.amazonaws.com/rosiehouse/index.php?id='.$row['id']);
  }echo "비밀번호 오류입니다.";
 ?>

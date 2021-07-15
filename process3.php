<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
  $sql = "SELECT id FROM login ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
 header('Location: http://ec2-3-35-207-50.ap-northeast-2.compute.amazonaws.com/rosiehouse/index.php?id='.$row['id']);
 ?>

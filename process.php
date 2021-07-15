<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
 $sql = "INSERT INTO book (userName, title, description, created) VALUES('".$_POST['userName']."','".$_POST['title']."','".$_POST['description']."',now())";
 $result = mysqli_query($conn, $sql);
 header('Location: http://ec2-3-35-207-50.ap-northeast-2.compute.amazonaws.com/rosiehouse/app.php?id=1');
 ?>

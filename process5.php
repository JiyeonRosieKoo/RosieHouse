<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
  $sql = "INSERT INTO comment (userName, writtenTime, comment) VALUES('".$_POST['userName']."',now(),'".$_POST['comment']."')";
  $result = mysqli_query($conn, $sql);
 header('Location: http://ec2-3-35-207-50.ap-northeast-2.compute.amazonaws.com/rosiehouse/project.php');
 ?>

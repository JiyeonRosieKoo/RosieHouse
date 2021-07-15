<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
$result = mysqli_query($conn, "SELECT * from book");
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rosie's House</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Fira+Sans:ital,wght@1,700&family=Yellowtail&display=swap');
    </style>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./form.css">
    <link rel="stylesheet" href="./style5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="node_modules/toastify-js/src/toastify.js" charset="utf-8"></script>
    <script src="node_modules/axios/dist/axios.js" charset="utf-8"></script>
    <script>
    UPLOADCARE_PUBLIC_KEY = '32211a8360febc247b1c';
    </script>
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" charset="utf-8"></script>
    </script>
  </head>

  <body>
    <!-- Baneer -->
    <header>
      <div class="Banner">
        <div id="quote">Being creative & quickly-witted</div>
        <audio controls loop id="music">
          <source src="https://github.com/JiyeonRosieKoo/htdocs/blob/05/28/Rosie/resources/SellBuyMusic.mp3?raw=true" type="audio/mp3" />
        </audio>
      </div>
      <div class="menu" style="height: 42px">
        <!-- menu icon -->
        <div class="menu-bar" onclick="myFunction(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
        <!-- menu list -->
        <div class="menu-content">
          <ul class="menu-contents hidden" id="menu">
            <li><a class="ma" href="./games.php">Games</a></li>
            <li><a class="ma" href="./project.php?id=1">Project</a></li>
            <li><a class="ma" href="./app.php?id=1">App</a></li>
            <li><a class="ma" href="./api.php">API</a></li>
            <li><a class="ma" href="./trade.php">TCA (R)</a></li>
            <li><a class="ma" href="./todo.php">Todo List</a></li>
          </ul>
        </div>
        <div class="logging">
          <?php
          error_reporting(0);
          if(empty($_GET['id'] == false)){
            $sql = "SELECT * FROM loginTrack ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<p class='result'>".$row['userName']."</p>"; //img 태그만 허용!! escaping
          }
           ?>
          <button type="button" class="btn btn-outline-light login" onclick="gotoMain(this)">
          </button>
          <script>
            function myFunction(x) {
                x.classList.toggle("change");
            }
            function gotoMain(t){
              location.href="./index.php";
              alert("메인 페이지에서 다시 로그인해 주세요.");
            }
          </script>
        </div>
      </div>
    </header>

    <!-- Main -->
    <div class="main">
      <a name="up"></a>
      <a href="./index.php"><h1 class="logo"></h1></a>
    </div>
    <div class="main-content">
      <ul class="main-contents">
        <li class="main-contents-3"><a class="ma" href="./games.php">Games</a></li><span>|</span>
        <li class="main-contents-1"><a class="ma" href="./project.php?id=1">Project</a></li><span>|</span>
        <li class="main-contents-4"><a class="ma" href="./app.php?id=1">App</a></li><span>|</span>
        <li class="main-contents-5"><a class="ma" href="./api.php">API</a></li><span>|</span>
        <li class="main-contents-6"><a class="ma" href="./trade.php">TCA (R)</a></li><span>|</span>
        <li class="main-contents-2"><a class="ma" href="./todo.php">Todo List</a></li>
      </ul>
      <style type="text/css">
        .ma:link{color: black; text-decoration: none;}
        .ma:visited{color: black; text-decoration: none;}
        .ma:hover{color: black; text-decoration: underline;}
      </style>
    </div>
    <div class="space2">
      <p></p>
    </div>

    <div class="form_wrapper">
      <div class="form-des">
        <h2>What is JavaScript</h2>
        <ul class="list-group list-group-flush form-des-list">
          <?php
          while($row = mysqli_fetch_assoc($result)){
            echo "<a class='target5' href='http://ec2-3-35-207-50.ap-northeast-2.compute.amazonaws.com/rosiehouse/app.php?id=".$row['id']."'><li>".htmlspecialchars($row['title'])."</li></a>";
          }
          ?>
          <a class="btn btn-secondary" href="http://ec2-3-35-207-50.ap-northeast-2.compute.amazonaws.com/rosiehouse/app.php?id=1">Back</a>
        </ul>
        <style type="text/css">
          .target5:link{color: black; text-decoration: none;}
          .target5:visited{color: black; text-decoration: none;}
          .target5:hover{color: black; text-decoration: underline;}
        </style>
      </div>

      <div class="form-main">
        <h2 id="newJ">New JavaScript</h2>
        <div class="write-des">
          <form action="process.php" method="POST">
            <h6>작성자 이름</h6>
            <div class="input-group mb-3" id="ip1">
              <span class="input-group-text" id="basic-addon1">@</span>
              <input type="text" name="userName" class="form-control" placeholder="userName" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <h6>제목</h6>
            <div class="input-group mb-3" id="ip2">
              <span class="input-group-text" id="basic-addon1">Title: </span>
              <input type="text" name="title" class="form-control" placeholder="title" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <h6>설명</h6>
            <div class="input-group" id="ip3">
              <span class="input-group-text">Write</span>
              <textarea class="form-control" name="description" aria-label="With textarea" id="description1"></textarea>
            </div>
            <div class="form-group" id="ip4">
              <label for="exampleInputFile">Upload File or Image: </label>
              <input type="hidden" role="uploadcare-uploader" name="my_file">
              <br />
              <input type="submit" class="btn btn-warning" value="Write">
            </div>
          </form>
        </div>
        <script>
            var singleWidget = uploadcare.SingleWidget('[role=uploadcare-uploader]'); //업로드 케어 서비스 '서버'에 upload된 사진을 사용하는 것.
              singleWidget.onUploadComplete(function(info){
              document.getElementById('description1').value = document.getElementById('description1').value+'<img class="inputImg" src="'+info.cdnUrl+'">';
              //'<img src="'+info.cdnUrl+'">';
             singleWidget.value();// 실행
            });
        </script>
        <a href="#up"><button id="upButton" type="button">∧</button></a>
      </div>
    </div>
    <footer class="footer">
      <div class="footer_wrapper">
        <div class="footer_info_top">
          <span><a href=""></a></span>
        </div>
        <div class="footer_info_bottom">
          <span>개발자: 구지연</span><br />
          <span>전화번호: 010-2040-6856</span><span>|</span><span>주소: 서울시 서초구 방배로 06553</span><br />
          <span>개인정보보호책임자: 구지연</span><span>|</span><span>이메일: kooji6856@gmail.com</span><br />
        </div>
      </div>
      <div class="footer_right_wrapper">
        <div class="privacyLink">
          <a class="pl" href="https://blog.naver.com/kooji6856" style="background: #2DB400; color: #fff;">
            <i id="Blog">N</i>
          </a>
          <a class="pl" href="https://www.instagram.com/gucci_bbbang/" style="background: linear-gradient(#833ab4, #fd1d1d, #fcb045); color: #fff;">
            <i id="Instagram">I</i>
          </a>
          <a class="pl" href="https://github.com/JiyeonRosieKoo" style="background: black; color: #fff;">
            <i id="Github">G</i>
          </a>
          <style type="text/css">
            .pl:link{text-decoration: none;}
            .pl:visited{text-decoration: none;}
            .pl:hover{text-decoration: underline;}
          </style>
        </div>
        <div class="DesLink">
          공식사이트
        </div>
      </div>
    </footer>
    <script src="./main.js" charset="utf-8"></script>
          <!--Start of Tawk.to Script-->
      <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/6098f2b2185beb22b30bc5e0/1f5an82ui';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
      <!--End of Tawk.to Script-->
  </body>
</html>

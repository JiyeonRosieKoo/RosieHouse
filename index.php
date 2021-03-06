<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
$result = mysqli_query($conn, "SELECT * from login");
while($row = mysqli_fetch_array($result)){
  $lastRow = $row;
}
$dbuserName = $lastRow['userName'];
?>

<!-- login update -->
<?php
error_reporting(0);
if(empty($_GET['id'] == false)){
  $sql = "INSERT INTO loginTrack (userName) VALUES('".$dbuserName."')";
  $result = mysqli_query($conn, $sql);
}
 ?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rosie House</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Fira+Sans:ital,wght@1,700&family=Yellowtail&display=swap');
    </style>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="node_modules/toastify-js/src/toastify.js" charset="utf-8"></script>
    <script async src="./main.js" charset="utf-8"></script>

    <script language="JavaScript">
    function getCookie(name){
      var cookie = document.cookie;
      if(document.cookie != ""){
        var cookie_array = cookie.split("; ");
        for(var index in cookie_array){
          var cookie_name = cookie_array[index].split("=");
          if(cookie_name[0] == "popupYN"){
            return cookie_name[1];
          }
        }
      }return;
    }

    function openPopup(url){
      var cookieCheck = getCookie("popupYN");
      if(cookieCheck != "N"){
        window.open(url, '', 'width=400px, height=650px, top=100,left=100')
      }
    }
    </script>
  </head>
  <body onload='javascript:openPopup("./popup.html")'>
    <!-- Baneer -->
    <header>
      <div class="Banner">
        <div id="quote">Being creative & quickly-witted</div>
        <audio controls loop id="music">
          <source src="./resources/SellBuyMusic.mp3" type="audio/mp3" />
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
            echo "<p class='result'>".$row['userName']."</p>"; //img ????????? ??????!! escaping
          }
           ?>
          <button type="button" class="btn btn-outline-light login" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          </button>
          <script>
          function myFunction(x) {
              x.classList.toggle("change");
            }
          </script>
        </div>
      </div>
    </header>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-2" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Guest LogIn</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="process4.php" method="post" name="sendForm">
            <div class="modal-body">
              <div class="form1">
                <p>???????????? ???????????? ?????? ????????? & ?????? ?????? ?????????</p>
                <p>???????????? ????????? Business info ????????? ???????????? ????????? ?????????!</p>
              </div>
              <hr>
              <p>ID??? Password??? ??????????????????.</p>
              <p>ID &nbsp;&nbsp;: <input type="text" name="userName" class="userId"></p>
              <p>PW : <input type="text" name="pw"></p>
            </div>
            <div class="modal-footer">
              <a href="./login.php"><button type="button" class="btn btn-warning">Sign In Page??? ??????</button></a>
              <button type="submit" class="btn btn-success">LogIn</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Main -->
    <div class="main">
      <a name="up"></a>
      <a href="./index.php"><h2 class="logo"></h2></a>
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
    <div class="space">
      <p></p>
    </div>

    <!-- Body -->
    <div id="wrapper">
      <div class="maincover">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./resources/intro/001.png" loading="eager" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./resources/intro/002.png" loading="lazy" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./resources/intro/003.png" loading="lazy" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./resources/intro/004.png" loading="lazy" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./resources/intro/005.png" loading="lazy" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="./resources/intro/006.png" loading="lazy" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="space4">
        <p></p>
      </div>
    </div>
    <div class="main-profile">
      <div class="main-profile-p">
        <h3>JIYEON KOO</h3>
        <div id="me">
          <!--Image-->
        </div>
        <div class="education">
          <h3>Education</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">20.06??? ILAC Language School Lv.13</li>
            <li class="list-group-item">2??? Bachelor's degree of software</li>
            <li class="list-group-item">2??? IELTS Overall 6.5</li>
            <li class="list-group-item">4??? Participate in BOHO.Inc ArtRoom Project</li>
          </ul>
        </div>
    </div>
    <div class="profile-details">
      <h2>"Just do it"</h2>
      <h6>?????? ????????? ????????? ????????? ?????? ??? ?????????.</h6>
      <h6>????????? ?????? ????????? ???????????? ?????? ????????? ????????? ???, ????????? ?????? ?????? ???????????? ???????????? ??? ?????? ???????????????.</h6>
      <h6>??? ????????? ?????????????????? back-end ????????? ?????? ???????????? </h6>
      <h6>????????????, ?????? ???????????? ?????? ?????? ????????? front-end ????????? ???/??? ????????? ?????? ???????????? ???????????? ?????? ?????????</h6>
      <h6>?????? HTML, CSS??? ????????? JS ???????????? ??????????????? ?????????????????????.</h6>
      <h6>?????? ?????? ????????? ??? ????????? ??????????????? ????????? ???????????? ???????????? ?????? ????????? ?????? ???????????? ?????? ??????????????? ?????? ??? ??????????????? ????????????</h6>
      <h6>AWS ????????? ???????????? ?????? IP??? ???????????? ?????? ???????????? ?????????????????????.</h6>
      <h6>?????? ?????? ????????? ??????????????? ???????????? ?????? ?????? ????????? ???????????? ?????????????????? ????????? ?????? ????????? ????????? ??? ?????? ???????????????.</h6>
      <h6>?????? ???????????? ???????????? ?????? ????????? ????????? ??????????????? ????????? ????????? ??????????????????. ???????????????.</h6>
      <div class="directory">
        <div class="certifications">
          <h6>?????? ?????????</h6><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/%E1%84%85%E1%85%B5%E1%84%82%E1%85%AE%E1%86%A8%E1%84%89%E1%85%B3%E1%84%86%E1%85%A1%E1%84%89%E1%85%B3%E1%84%90%E1%85%A52%E1%84%80%E1%85%B3%E1%86%B8.png?raw=true">??????????????????2???</a></span><span>|</span><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/%E1%84%8C%E1%85%A5%E1%86%BC%E1%84%87%E1%85%A9%E1%84%8E%E1%85%A5%E1%84%85%E1%85%B5%E1%84%80%E1%85%B5%E1%84%89%E1%85%A1%E1%84%8C%E1%85%A1%E1%84%80%E1%85%A7%E1%86%A8%E1%84%8C%E1%85%B3%E1%86%BC.png?raw=true">??????????????????</a></span><span>|</span><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/IELTS%20score.png?raw=true">IELTS 6.5</a></span>
          <h6>?????????</h6><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/SPRINGBOOT&JPAapplication.png?raw=true">????????? ????????? JPA ??????1 - ??? ?????????????????? ??????</a></span><span>|</span><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/JAVAORM.png?raw=true">?????? ORM ?????? JPA ??????????????? - ?????????</a></span><span>|</span><span><a class="holy" href="https://raw.githubusercontent.com/JiyeonRosieKoo/htdocs/master/certification/THE%20%E1%84%8C%E1%85%A1%E1%84%87%E1%85%A1%2C%20JAVA%208.png">THE ??????, JAVA 8</a></span>
          <style type="text/css">
            .holy:link{color: gray; text-decoration: none;}
            .holy:visited{color: gray; text-decoration: none;}
            .holy:hover{color: gray; text-decoration: underline;}
          </style>
        </div>
      </div>
      <a href="#up"><button id="upButton" type="button">???</button></a>
    </div>
  </div>

  <footer class="footer">
    <div class="footer_wrapper">
      <div class="footer_info_top">
        <span><a href=""></a></span>
      </div>
      <div class="footer_info_bottom">
        <span>?????????: ?????????</span><br />
        <span>????????????: 010-2040-6856</span><span>|</span><span>??????: ????????? ????????? ????????? 06553</span><br />
        <span>???????????????????????????: ?????????</span><span>|</span><span>?????????: kooji6856@gmail.com</span><br />
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
        ???????????????
      </div>
    </div>
  </footer>
  <script src="./login.js" charset="utf-8"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!--End of Tawk.to Script-->
  </body>
</html>

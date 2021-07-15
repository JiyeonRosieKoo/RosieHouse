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
            echo "<p class='result'>".$row['userName']."</p>"; //img 태그만 허용!! escaping
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
                <p>사이트를 이용하는 동안 게시글 & 덧글 등의 기능을</p>
                <p>사용하기 위하여 Business info 상태로 로그인을 유지해 주세요!</p>
              </div>
              <hr>
              <p>ID와 Password를 입력해주세요.</p>
              <p>ID &nbsp;&nbsp;: <input type="text" name="userName" class="userId"></p>
              <p>PW : <input type="text" name="pw"></p>
            </div>
            <div class="modal-footer">
              <a href="./login.php"><button type="button" class="btn btn-warning">Sign In Page로 이동</button></a>
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
            <li class="list-group-item">20.06月 ILAC Language School Lv.13</li>
            <li class="list-group-item">2月 Bachelor's degree of software</li>
            <li class="list-group-item">2月 IELTS Overall 6.5</li>
            <li class="list-group-item">4月 Participate in BOHO.Inc ArtRoom Project</li>
          </ul>
        </div>
    </div>
    <div class="profile-details">
      <h2>"Just do it"</h2>
      <h6>모든 성과는 요령을 피우지 않을 때 생긴다.</h6>
      <h6>주어진 어떤 일에도 책임감을 갖고 최선을 다하는 것, 이것은 제가 가장 중요하게 생각하는 제 삶의 모토입니다.</h6>
      <h6>제 전공은 소프트웨어로 back-end 개발을 주로 배웠지만 </h6>
      <h6>졸업작품, 외부 프로젝트 참여 등을 하면서 front-end 분야는 웹/앱 개발에 매우 필수적인 요소라는 것을 깨닫고</h6>
      <h6>필수 HTML, CSS와 더불어 JS 기능들을 추가적으로 공부하였습니다.</h6>
      <h6>이를 통해 글로만 제 자신을 보여드리는 것보단 실질적인 사이트에 제가 그동안 해온 기록들을 직접 보여드리는 것이 더 적절하다고 판단하여</h6>
      <h6>AWS 서버를 사용하여 공공 IP를 부여받아 해당 사이트를 제작하였습니다.</h6>
      <h6>모든 것이 준비된 사람이라고 자만하는 것이 아닌 저만의 사이트를 만들어보면서 오히려 저의 부족한 부분에 더 알게 되었습니다.</h6>
      <h6>해당 회사에서 일하면서 저의 미숙한 부분을 채워나가는 겸손한 자세로 임하겠습니다. 감사합니다.</h6>
      <div class="directory">
        <div class="certifications">
          <h6>보유 자격증</h6><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/%E1%84%85%E1%85%B5%E1%84%82%E1%85%AE%E1%86%A8%E1%84%89%E1%85%B3%E1%84%86%E1%85%A1%E1%84%89%E1%85%B3%E1%84%90%E1%85%A52%E1%84%80%E1%85%B3%E1%86%B8.png?raw=true">리눅스마스터2급</a></span><span>|</span><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/%E1%84%8C%E1%85%A5%E1%86%BC%E1%84%87%E1%85%A9%E1%84%8E%E1%85%A5%E1%84%85%E1%85%B5%E1%84%80%E1%85%B5%E1%84%89%E1%85%A1%E1%84%8C%E1%85%A1%E1%84%80%E1%85%A7%E1%86%A8%E1%84%8C%E1%85%B3%E1%86%BC.png?raw=true">정보처리기사</a></span><span>|</span><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/IELTS%20score.png?raw=true">IELTS 6.5</a></span>
          <h6>수료증</h6><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/SPRINGBOOT&JPAapplication.png?raw=true">스프링 부트와 JPA 활용1 - 웹 애플리케이션 개발</a></span><span>|</span><span><a class="holy" href="https://github.com/JiyeonRosieKoo/htdocs/blob/master/certification/JAVAORM.png?raw=true">자바 ORM 표준 JPA 프로그래밍 - 기본편</a></span><span>|</span><span><a class="holy" href="https://raw.githubusercontent.com/JiyeonRosieKoo/htdocs/master/certification/THE%20%E1%84%8C%E1%85%A1%E1%84%87%E1%85%A1%2C%20JAVA%208.png">THE 자바, JAVA 8</a></span>
          <style type="text/css">
            .holy:link{color: gray; text-decoration: none;}
            .holy:visited{color: gray; text-decoration: none;}
            .holy:hover{color: gray; text-decoration: underline;}
          </style>
        </div>
      </div>
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

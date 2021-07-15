<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
$result = mysqli_query($conn, "SELECT * from comment");
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
    <link rel="stylesheet" href="./form.css">
    <link rel="stylesheet" href="./style6.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="node_modules/toastify-js/src/toastify.js" charset="utf-8"></script>
    <script src="node_modules/axios/dist/axios.js" charset="utf-8"></script>
  </head>

  <body>
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
        <h2 id="mTitle1">스마트 IoT</h2>
        <h2 id="mTitle2">임산부 배려좌석</h2>
        <ul class="list-group list-group-flush form-des-list">
          <li class="first-contents" >○ 개발 목표
            <ul class="first-content hidden" id="firstHidden">
              <a class="target6" href="#target1"><li>프로젝트 주제</li></a>
              <a class="target6" href="#target2"><li>제작 동기</li></a>
              <a class="target6" href="#target3"><li>기존 시스템과의 차별성</li></a>

            </ul>
          </li>
          <li class="second-contents" >○ 개발 환경
            <ul class="second-content hidden" id="secondHidden">
              <a class="target6" href="#target4"><li>setting</li></a>
            </ul>
          </li>
          <li class="third-contents" >○ 설계
            <ul class="third-content hidden" id="thirdHidden">
              <a class="target6" href="#target5"><li>하드웨어</li></a>
            </ul>
          </li>
          <li class="forth-contents" >○ 구현
            <ul class="forth-content hidden" id="forthHidden">
              <a class="target6" href="#target6"><li>앱 화면 구성</li></a>
            </ul>
          </li>
          <li class="fifth-contents" >○ 실행
            <ul class="fifth-content hidden" id="fifthHidden">
              <a class="target6" href="#target7"><li>실행 화면</li></a>
            </ul>
          </li>
          <li class="sixth-contents" >○ 기대효과
            <ul class="sixth-content hidden" id="sixthHidden">
              <a class="target6" href="#target8"><li>평가 및 미래 지향점</li></a>
            </ul>
          </li>
          <li class="seventh-contents" >○ Comments
            <ul class="seventh-content hidden" id="seventhHidden">
              <a class="target6" href="#target9"><li>댓글 작성</li></a>
            </ul>
          </li>
        </ul>
        <style type="text/css">
          .target6:link{color: #A4A4A4; text-decoration: none;}
          .target6:visited{color: #A4A4A4; text-decoration: none;}
          .target6:hover{color: #A4A4A4; text-decoration: underline;}
        </style>
      </div>

      <div class="form-main">
        <div class="project-header">
          <h3 class="project-title1">2020년 졸업 작품 프로젝트</h2>
          <h2 class="project-title2"> - 스마트 IoT 임산부 배려좌석 - </h2>
          <h6 class="project-details"> 대중교통 이용 시 공공서비스인 임산부 배려석을 효율적으로 이용하기 위하여 고안된 (안드로이드용) Mobile Application 작품입니다.</h6>
          <iframe id="ptvideo" src="./resources/ptvideo.MP4" width="800px" height="500px"></iframe>
          <p style="font-size: 12px; color: #A4A4A4;">9:46초 부터 시연 영상 시작됩니다.</p>
        </div>
        <div class="space4">
          <p></p>
        </div>
        <div class="form-main">
          <h2>1. 개발 목표</h2>
          <h3 class="h" style="color: red;">1) 프로젝트 주제</h3>
          <a name="target1"></a>
          <div class="ppt">
            <img src="./resources/ppt/ppt1.jpeg" alt="1">
            <div class="ppt-des">
              <p>졸업 프로젝트 주제 선정 시 가장 사회적으로 대두화되었던</p>
              <p>대중교통 임산부 배려 좌석에 대하여</p>
              <p>어떻게 하면 일반인과 임산부 모두 편리한 대중교통을 이용할 수 있을까 고민하였습니다.</p>
              <p>따라서, 제가 속한 팀에서는 이 주제를 가지고</p>
              <p>임산부가 지하철 탑승하여 자리에 앉아야 하는 경우 이 앱을 통해 배려 좌석에 led 등이 켜지게 하여</p>
              <p>일반인과 임산부 모두가 효율적으로 대중시설을 이용할 수 있는 방안을 고안하였습니다.</p>
            </div>
          </div>
          <div class="space5">
            <p></p>
          </div>
          <h3 class="h">2) 제작 동기</h3>
          <a name="target2"></a>
          <div class="ppt">
            <img src="./resources/ppt/ppt2.jpeg" alt="1">
          </div>
          <div class="space5">
            <p></p>
          </div>
          <h3 class="h">3) 기존 시스템과 차별성</h3>
          <a name="target3"></a>
          <div class="ppt">
              <p></p>
            <div class="ppt-des">
              <br />
              <h5 style="text-align: center;"><부산 핑크라이트 제도></h5>
              <br />
              <p>부산에서 2018년도부터 실시하고 있는 핑크라이트 제도는</p>
              <p>비콘을 사용하여 임산부가 지하철에 탑승하면</p>
              <p>해당 열차 칸의 배려 좌석에 led등이 켜지며 알리는 시스템입니다.</p>
              <p>하지만, 열차 칸 내부의 여부 좌석이 있던지 아니면 임산부가 사용하고 싶지 않을 경우에 대한</p>
              <p>돌발 상황에 대비가 부족한 반면, 저희가 개발한 프로그램은</p>
              <p>이와 같은 상황에 임산부가 직접 제어할 수 있도록 대비하여 설계하였습니다.</p>
            </div>
          </div>
          <div class="space4">
            <p></p>
          </div>
          <h2>2. 개발 환경</h2>
          <h3 class="h" style="color: red;"> - Setting</h3>
          <a name="target4"></a>
          <div class="ppt2">
            <img src="./resources/ppt/ppt3.jpeg" alt="1">
            <br />
            <div class="ppt-des2">
              <h5 style="color: #FACC2E;">개발 언어</h5>
              <p>Java 8</p>
              <p>MySQL (Database)</p>
              <p>PHP (Server)</p>
              <p>Arduino (사물)</p>
              <br />
              <h5 style="color: #FACC2E;">개발 프로그램</h5>
              <p>Android Studio</p>
              <p>Arduino Sketch</p>
              <p>PHPMyAdmin</p>
            </div>
          </div>
          <div class="space4">
            <p></p>
          </div>
          <h2>3. 설계</h2>
          <h3 class="h">하드웨어</h3>
          <a name="target5"></a>
          <div class="ppt">
            <img src="./resources/ppt/ppt4.jpeg" alt="1">
            <img src="./resources/ppt/ppt5.jpeg" alt="1">
          </div>
          <div class="space4">
            <p></p>
          </div>
          <h2>4. 구현</h2>
          <h3 class="h" style="color: red;"> - 앱 화면 구성</h3>
          <a name="target6"></a>
          <div class="ppt2">
            <button type="button" class="btn btn-light" id="bt1"> &lt </button>
            <img id='ptimg' src="./resources/ppt/ppt6.jpeg" alt="1">
            <button type="button" class="btn btn-light" id="bt2"> &gt </button>
          </div>
          <div class="space4">
            <p></p>
          </div>
          <h2>5. 실행</h2>
          <h3 class="h" style="color: red;"> - 실행 화면</h3>
          <a name="target7"></a>
          <div class="ppt">
            <iframe id="ptvideo" src="./resources/simulation.mp4" width="800px" height="500px"></iframe>
          </div>
          <div class="space4">
            <p></p>
          </div>
          <h2>6. 기대효과</h2>
          <h3 class="h"> - 평가 및 미래 지향점</h3>
          <a name="target8"></a>
          <div class="ppt">
            <img src="./resources/ppt/ppt15.jpeg" alt="1">
            <br />
            <div class="ppt-des">
              <p>1. 임산부 배려 좌석으로 인한 승객들간의 불편함이 해소될 것이다.</p>
              <p>2. 임산부 뱃지를 항상 소지하지 않아도 핸드폰으로 임산부 배려 좌석 이용이 가능하다.</p>
              <p>3. 향후 실제 지하철 칸 번호를 사용하여 상용화 된다면 임산부들의 지하철 이용이 지금보다 더 늘어날 수 있을 것이다.</p>
              <p>4. 임산부 배려 좌석의 회전율을 더욱 더 실용적이게 할 수 있다.</p>
              <p>5. 일반 승객이 임산부 배려 좌석을 이용 중 일 때 다른 대화 없이 스피커 음성과 led 조명만을 보고 자리를 양보할 수 있기에 양보를 부탁하는 껄끄러운 대화가 불필요해질 수 있다.</p>
            </div>
          </div>
          <div class="space4">
            <p></p>
          </div>
          <h2>7. Comments</h2>
          <a name="target9"></a>
          <form class="w-comments" action="process5.php" method="post">
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping">@</span>
              <input id='commentID' type="text" class="form-control" placeholder="userName" aria-label="Username" aria-describedby="addon-wrapping" name="userName">
            </div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comment" style="height: 100px"></textarea>
              <label for="floatingTextarea2">Comments</label>
            </div>
            <button type="submit" class="btn btn-secondary" name="button">작성</button>
          </form>
          <div class="infoHidden hidden" id='hide'>

          </div>
          <div class="s-info">
            <!-- user's comments -->
            <?php
            error_reporting(0);
  			    while($row = mysqli_fetch_assoc($result)){
  			      echo "<div class='s-comments'><div class='info'><p id='uname'>".$row['userName']."</p><p>".$row['writtenTime']."</p></div><p>".$row['comment']."</p></div>";
  			    }
            ?>
          </div>
          <a href="#up"><button id="upButton" type="button">∧</button></a>
        </div>
        <div class="form-footer">

        </div>
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
    <script src="./project.js" charset="utf-8"></script>

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

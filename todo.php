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
    <link rel="stylesheet" href="./style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <h2>Todo-List</h2>
        <ul class="list-group list-group-flush form-des-list">
          <a class="target" href="#target1"><li >중요도 표시</li></a>
          <a class="target" href="#target2"><li>완료 체크 표시</li></a>
          <a class="target" href="#target3"><li>삭제 기능</li></a>
          <a class="target" href="#target4"><li>Keycode.13 활성화</li></a>
        </ul>
        <style type="text/css">
          .target:link{color: black; text-decoration: none;}
          .target:visited{color: black; text-decoration: none;}
          .target:hover{color: black; text-decoration: underline;}
        </style>
      </div>
      <div class="form-main">
        <div class="todo-header">
          <h1>TODO</h1>
          <div class="input-box">
            <label for="todo-input">Todo: </label>
            <input type="text" id="todo-input" class="inputput" placeholder="make a list">
          </div>
        </div>
        <section class="section">
          <div class="option">
            <span class="option-like">Priority</span>
            <span class="option-item">Toto List</span>
            <span class="option-manage">Check</span>
          </div>
          <ul class="todo-list">
            <li>
              <span class="todo-like">
                <i class="material-icons like">favorite_border</i>
              </span>
              <span class="todo-item">6시 기상</span>
              <span class="todo-manage">
                <i class="material-icons check">check</i>
                <i class="material-icons clear">clear</i>
              </span>
            </li>
            <li>
              <span class="todo-like">
                <i class="material-icons like">favorite</i>
              </span>
              <span class="todo-item">Rosie's house 완성시키기</span>
              <span class="todo-manage">
                <i class="material-icons check" id="check2">check</i>
                <i class="material-icons clear" id="clear2">clear</i>
              </span>
            </li>
          </ul>
        </section>
        <button type="button" id="allClear">전체삭제</button>
        <div class="space3">
          <p></p>
        </div>
        <div class="todo-details">
          <a name="target1"></a>
          <h3>1. 중요도 표시 기능</h3>
          <div class="todo-text">
            <h6>"<i class="material-icons like">favorite_border</i> 모양의 표시 변화"</h6>
            <h6>매일 할 일을 작성하고 <i class="material-icons like">favorite_border</i>버튼을 클릭해 일의 우선순위를 한눈에 보기 쉽게 정리할 수 있다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>설정된 <i class="material-icons like">favorite_border</i> icon에 변화를 주기 위해</h6>
              <h6>span 태그 안에 구현된 icon 태그에 addEventListener onClick 효과를 추가해주었다.</h6>
              <h6>icon이 클릭되었을 때 innerText값을 "favorite", "favorite_border"으로 구분하여 변화될 수 있도록</h6>
              <h6>addEventListener onClick 효과를 추가해주었다.</h6>
            </div>
          </div>

          <a name="target2"></a>
          <h3>2. 완료된 리스트 표시 기능</h3>
          <div class="todo-text">
            <h6>"<i class="material-icons check">check</i> 버튼을 클릭하여 완료 표시 가능"</h6>
            <h6>해당 할 일의 밑줄과 텍스트 색상에 변화를 주어 완료한 것을 사용자가 식별할 수 있도록 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6><i class="material-icons check">check</i> 아이콘에 addEventListener속성을 추가하여</h6>
              <h6>click 이벤트가 발생하였을 경우 해당 노드의 부모 노드(li)를 찾아 해당 리스트에 완료 표시가 적용될 수 있도록</h6>
              <h6>className에 done 속성을 부과하였다.</h6>
            </div>
          </div>

          <a name="target3"></a>
          <h3>3. 리스트 삭제 기능</h3>
          <div class="todo-text">
            <h6>"<i class="material-icons clear">clear</i> 버튼을 클릭하여 삭제 기능 사용"</h6>
            <h6>총 2가지의 삭제(단일 삭제, 전체삭제) 기능을 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>1) 단일 삭제 기능</h6>
              <h6><i class="material-icons clear">clear</i> 아이콘을 클릭하면 이벤트가 발생한 객체의</h6>
              <h6>부모 노드(li)를 찾아 child 객체를 삭제한다.</h6>
              <h6>2) 전체 삭제 기능</h6>
              <h6>Todo-List에 child노드가 존재하는 모든 경우</h6>
              <h6>while문을 통해 리스트에 모든 child 노드가 없어질 때 까지 삭제를 진행한다.</h6>
            </div>
          </div>

          <a name="target4"></a>
          <h3>4. 엔터키 기능 활성화</h3>
          <div class="todo-text">
            <h6>"↵ 엔터키를 활성화 시키기 위하여 keyCode 13을 사용"</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>사용자가 Input창에 할 일을 기입하고 엔터키를 누르면</h6>
              <h6>눌려진 keyCode 값이 13번인지 확인하고</h6>
              <h6>자동으로 새로운 List가 생성되도록 선언해주었다.</h6>
            </div>
          </div>

          <a href="#up"><button id="upButton" type="button">∧</button></a>
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
    <script src="./todo.js" charset="utf-8"></script>
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

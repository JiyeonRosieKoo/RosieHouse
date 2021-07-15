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
    <link rel="stylesheet" href="./style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="node_modules/toastify-js/src/toastify.js" charset="utf-8"></script>
    <script src="node_modules/axios/dist/axios.js" charset="utf-8"></script>
    <script defer src="./main.js" charset="utf-8"></script>
    <script defer src="./games.js" charset="utf-8"></script>
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
        <h2>Games & ETC </h2>
        <ul class="list-group list-group-flush form-des-list">
          <li class="first-contents" >▼ Party (끝말잇기)
            <ul class="first-content hidden" id="firstHidden">
              <a class="target" href="#target1"><li>참여자 체크 기능</li></a>
              <a class="target" href="#target2"><li>Hidden 기능</li></a>
              <a class="target" href="#target3"><li>알맞은 단어 체크</li></a>
              <a class="target" href="#target4"><li>보완해야 할 부분</li></a>
            </ul>
          </li>
          <li class="second-contents" >▼ Typing Master
            <ul class="second-content hidden" id="secondHidden">
              <a class="target" href="#target5"><li>NPM 라이브러리 추가</li></a>
              <a class="target" href="#target6"><li>로딩 완료</li></a>
              <a class="target" href="#target7"><li>난이도 조절</li></a>
              <a class="target" href="#target8"><li>점수 배정</li></a>
            </ul>
          </li>
          <li class="third-contents" >▼ Puzzle
            <ul class="third-content hidden" id="thirdHidden">
              <a class="target" href="#target9"><li>Shuffle 기능</li></a>
              <a class="target" href="#target10"><li>Dragged 기능</li></a>
              <a class="target" href="#target11"><li>Dropped 기능</li></a>
              <a class="target" href="#target12"><li>Cheat 기능</li></a>
            </ul>
          </li>
          <li class="forth-contents" >▼Weather
            <ul class="forth-content hidden" id="forthHidden">
              <a class="target" href="#target13"><li>현재 날씨 보기</li></a>
            </ul>
          </li>

        </ul>
        <style type="text/css">
          .target:link{color: black; text-decoration: none;}
          .target:visited{color: black; text-decoration: none;}
          .target:hover{color: black; text-decoration: underline;}
        </style>
      </div>

      <div class="form-main">
        <div class="games-header">
          <div class="party">
            <h2>끝말잇기 게임</h2>
            <div class="party_main" id="partyMain">
              <input class="form-control"  id="textForm2" type="text" placeholder="참가자는 총 몇 명입니까?" />
              <button type="button" id="startButton" class="btn btn-warning">Game Start</button>
            </div>
            <div class="party_input hidden2" id="partyInput">
              <div>
                순서: <span id="order">1</span>번째 참가자
              </div>
              <div>
                제시어: <span id="word">________</span>
              </div>
              <div>
                <input class="form-control" id="textForm" placeholder="Text input" onkeypress="if( event.keyCode == 13 ){onClickButton();}"></input>
                <span><input type="button" id="button_1" class="btn btn-default" value="↵" /></span>
              </div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            </div>
          </div>
        </div>
        <div class="space3">
          <p></p>
        </div>

        <div class="form-details">
          <a name="target1"></a>
          <h3>1. 참여자 체크 기능</h3>
          <div class="form-text">
            <h6>"게임 시작 전 참여할 인원수를 체크"</h6>
            <h6>게임이 종료될 때까지 참여자 인원수에 맞추어 순서가 번갈아 갈 수 있도록 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>input 태그 안에서 작성된 참여자 수를 parseInt 화 시키어 int로 형 변환한 뒤</h6>
              <h6>게임이 진행될 때마다 참여자 순서가 번갈아가면서 진행될 수 있도록 구현하였다.</h6>
            </div>
          </div>
          <a name="target2"></a>
          <h3>2. Hidden 기능</h3>
          <div class="form-text">
            <h6>"게임 시작 전과 후의 변화"</h6>
            <h6>참여자는 인원수를 정해야 본게임에 입장할 수 있도록 구현하였다.</h6>
            <div class="js-code">
              <h5 id="css-js-code">CSS & JS code</h5>
              <h6>게임 시작 전과 후의 UI 기능의 차별화를 위해</h6>
              <h6>css의 visuality 기능을 사용하여 </h6>
              <h6>클래스 명의 hidden을 toggle 화 해주었다.</h6>
              <h6>이를 통해 사용자는 게임 시작 전 참여자 인원수를 체크하고</h6>
              <h6>게임 시작 버튼을 누르면 본 게임이 (visualble) 눈에 보이게 된다.</h6>
              <div class="color-change">
                <h6>'''</h6>
                <h6>startButton.addEventListener('click', ()=>{</h6>
                <h6>  let partyMain = document.getElementById('partyMain');</h6>
                <h6>  let partyInput = document.getElementById("partyInput");</h6>
                <h6>  partyMain.classList.toggle("hidden2");</h6>
                <h6>  partyInput.classList.toggle("hidden2");</h6>
                <h6>  const firstNumber = document.getElementById('textForm2').value;</h6>
                <h6>  number = parseInt(firstNumber, 10);</h6>
                <h6>})</h6>
                <h6>'''</h6>
              </div>
            </div>
          </div>

          <a name="target3"></a>
          <h3>3. 알맞은 단어 체크</h3>
          <div class="form-text">
            <h6>"끝말잇기 게임에 적합하게 돌아갈 수 있도록 단어 체크 구현"</h6>
            <h6>제시어의 맨 끝 단어와 참여자가 작성한 맨 처음 단어가 일치하는지 확인하게 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>단어의 맨 끝 글자와 맨 첫 자를 가져오기 위해</h6>
              <h6>charAt() 기능을 사용하여 비교 연산자 (===)로 일치 여부를 확인하였다.</h6>
              <h6>만일 일치한다면, 다음 순서의 사람에게 차례가 넘어가게 끔 설계하였다.</h6>
            </div>
          </div>

          <a name="target4"></a>
          <h3>4. 보완해야 할 부분</h3>
          <div class="form-text">
            <h6>국어사전 외부 API를 가져와</h6>
            <h6>입력한 단어가 제시어와 일치하는지와 함께</h6>
            <h6>국어사전에도 등재가 되어있는 의미 있는 단어인지 확인하는 절차를 보완해야 한다.</h6>
            <br />
            <br />
          </div>
        </div>
        <div class="space2">
          <p></p>
        </div>
        <!-- start new -->
        <div class="typingMaster">
          <div class="t-section">
            <div class="word-display">
              <h2>타자 게임</h2>
              HELLO
            </div>
            <div class="word-input-box">
              <input type="text" class="word-input">
            </div>
            <div class="game-info">
              <div>Timer: <span class="time">0</span></div>
              <div>Score: <span class="score">0</span></div>
            </div>
            <div class="button-info">
              <div class="button-level">
                <p class="text_area">TimeLimit: <span></span></p>
                <button class="level1">Level 1</button>
                <button class="level2">Level 2</button>
                <button class="level3">Level 3</button>
              </div>
              <button class="button loading">Loading . . .</button>
            </div>
          </div>

          <div class="d-section">
            <div class="game-guide">
              <h2>Game Guide</h2>
              <ul>
                <li>- 제한 시간에 따른 난이도를 설정한다
                  <ul>
                    <li>1단계 : 10초</li>
                    <li>2단계 : 8초</li>
                    <li>3단계 : 5초</li>
                  </ul>
                </li>
                <li id="list-1">- Loading이 끝나면 Game Start!</li>
                <li id="list-2">- 입력한 단어가 맞으면 자동으로 <br /> &nbsp;&nbsp; 점수가 10점씩 증가한다.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="space3">
          <p></p>
        </div>
        <div class="form-details">
          <a name="target5"></a>
          <h3>1. NPM(Node Packaged Manager) 라이브러리 추가</h3>
          <div class="form-text">
            <h6>Node.js로 만들어진 외부 모듈을 웹에서부터 받아와 사용</h6>
            <h6>적용한 외부 라이브러리로는 Toastify-js, axios를 설치하여 --save install 화하여 사용하였다.</h6>
            <div class="js-code">
              <h5>Axios 라이브러리</h5>
              <h6>"http 통신을 지원하는 라이브러리 패키지"</h6>
              <h6>타자 게임에 필요한 랜덤한 단어들이 지원되는 외부 사이트의 단어들을 사용하기 위해</h6>
              <h6>axios.get()을 적용하였다.</h6>
              <br />
              <h5>Toastify 라이브러리</h5>
              <h6>"이벤트로 인해 화면 하단에 작은 텍스트 상자가 나타나는 UI 기능"</h6>
              <h6>타이핑한 단어가 제시어와 일치하면 UI 환경을 통하여 직관적으로 보이도록 하기 위해 사용하였다.</h6>
              <h6>추가적인 css 파일 또한 연결해주어야 한다.</h6>
            </div>
          </div>
          <a name="target6"></a>
          <h3>2. 로딩 완료</h3>
          <div class="form-text">
            <h6>"Loading이 끝나고 Game Start 환경으로 변환되는 과정"</h6>
            <h6>axios로 외부에서 받아오는 단어가 선언해 준 filter화가 완료되면 셋팅이 완료된다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>랜덤한 단어 중 적절한 난이도를 배열하기 위하여</h6>
              <h6>Array.prototype.filter() 기능을 사용해 주었다.</h6>
              <h6>filter가 완료되면</h6>
              <h6>게임이 시작을 할 수 있는 상태로 변경해 주었다.</h6>
              <div class="color-change">
                <h6>'''</h6>
                <h6>const getWords2 = () => {</h6>
                <h6>  axios.get(URL).then(res => {</h6>
                <h6>    words = res.data.filter(word=>word.length < 8);</h6>
                <h6>    button.innerText = 'Restart';</h6>
                <h6>    isReady = true;</h6>
                <h6>    button.classList.remove('loading');</h6>
                <h6>  }).catch(err => console.log(err))</h6>
                <h6>}</h6>
                <h6>'''</h6>
              </div>
            </div>
          </div>
          <a name="target7"></a>
          <h3>3. 사용자 환경에 따른 난이도 조절 가능 버튼</h3>
          <div class="form-text">
            <h6>"시간제한에 따라 총 3단계로 난이도 배정"</h6>
            <h6>게임 시작 버튼을 누르기 전 게임에 난이도를 정할 수 있다.</h6>
            <h6>초기값은 10초 (1 단계)로 설정되어 있다.</h6>
          </div>
          <div class="js-code" style="border: none;">
          </div>
          <a name="target8"></a>
          <h3>4. 점수</h3>
          <div class="form-text">
            <h6>게임의 재미를 더하기 위해</h6>
            <h6>입력한 단어가 맞는 경우 10점씩 부과되게 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>Input 창에 입력된 단어가 제시어와 일치할 경우</h6>
              <h6>자동으로 다음 단어로 넘어가며</h6>
              <h6>점수가 부과된다.</h6>
            </div>
          </div>
          <a href="#up"><button id="upButton" type="button">∧</button></a>
        </div>
        <div class="space2">
          <p></p>
        </div>
        <div class="puzzle-game">
          <div class="puzzle-left">
            <h2>퍼즐 게임</h2>
            <p class="play-time">0</p>
            <div class="puzzle-button">
              <button id="start-button" class="btn btn-primary">Start</button>
              <button id="cheat-button" class="btn btn-warning">Cheat</button>
            </div>
            <p class="game-text">Are you ready?</p>
          </div>
          <div class="puzzle-right">
            <ul class="image-container" id="img">
              <li class="list0" data-type="0" draggable="true"></li>
              <li class="list1" data-type="1" draggable="true"></li>
              <li class="list2" data-type="2" draggable="true"></li>
              <li class="list3" data-type="3" draggable="true"></li>
              <li class="list4" data-type="4" draggable="true"></li>
              <li class="list5" data-type="5" draggable="true"></li>
              <li class="list6" data-type="6" draggable="true"></li>
              <li class="list7" data-type="7" draggable="true"></li>
              <li class="list8" data-type="8" draggable="true"></li>
              <li class="list9" data-type="9" draggable="true"></li>
              <li class="list10" data-type="10" draggable="true"></li>
              <li class="list11" data-type="11" draggable="true"></li>
              <li class="list12" data-type="12" draggable="true"></li>
              <li class="list13" data-type="13" draggable="true"></li>
              <li class="list14" data-type="14" draggable="true"></li>
              <li class="list15" data-type="15" draggable="true"></li>
            </ul>
          </div>
        </div>
        <div class="space3">
          <p></p>
        </div>
        <div class="form-details">
          <a name="target9"></a>
          <h3>1. Shuffle 기능</h3>
          <div class="form-text">
            <h6>한 개의 이미지를 16개의 list에 각각 나눠 담아두고</h6>
            <h6>Start 버튼을 누르면 이미지가 담긴 list 배열이 무작위로 섞이는 기능을 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>Math.random 함수를 사용하여 랜덤 수를 선언하고</h6>
              <h6>각 list에 랜덤 한 수를 부여하여 이미지가 뒤섞일 수 있도록 설계하였다.</h6>
              <div class="color-change">
                <h6>'''</h6>
                <h6>const randomIndex = Math.floor(Math.random() * (index + 1));</h6>
                <h6>[array[index], array[randomIndex]] = [array[randomIndex], array[index]];</h6>
                <h6>'''</h6>
              </div>
            </div>
          </div>
          <a name="target10"></a>
          <h3>2. Dragged</h3>
          <div class="form-text">
            <h6>이미지를 원본의 상태로 만들기 위해</h6>
            <h6>드래그를 시작한 index를 담는 객체를 선언해 준다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>드래그가 시작된 index 값을 읽어와서</h6>
              <h6>후에 dropped 되는 index 값으로 변경될 수 있도록 하기 위해</h6>
              <h6>window에서 지원하는 parentNode의 children 값에 접근하였다.</h6>
              <div class="color-change">
                <h6>'''</h6>
                <h6>const droppedIndex = [...obj.parentNode.children].indexOf(obj);</h6>
                <h6>if(dragged.index > droppedIndex){</h6>
                <h6>  obj.before(dragged.el);</h6>
                <h6>}else{</h6>
                <h6>  obj.after(dragged.el);</h6>
                <h6>}</h6>
                <h6>isLast ? originPlace.after(obj) : originPlace.before(obj);</h6>
                <h6>checkStatus();</h6>
                <h6>});</h6>
                <h6>'''</h6>
              </div>
            </div>
          </div>
          <a name="target11"></a>
          <h3>3. Dropped</h3>
          <div class="form-text">
            <h6>"드래그 해온 객체가 드롭되는 시점의 index값"</h6>
            <h6>드래그한 인덱스 값과 드롭되는 인덱스의 위치를 서로 뒤바꾸어 준다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>이 과정에서</h6>
              <h6>인덱스가 마지막 번호였을 때 발생하는 경우를 방지하기 위해</h6>
              <h6>드래그해 온 인덱스 뒤에 아무 인덱스도 존재하지 않는다면 (인덱스 15번),</h6>
              <h6>드래그해 온 값이 맨 앞이라고 정의되며 드랍되는 객체는 맨 앞 인덱스로 교차되게 된다.</h6>
            </div>
          </div>
          <a name="target12"></a>
          <h3>4. Cheat 힌트 기능</h3>
          <div class="form-text">
            <h6>게임이 너무 어려울 경우를 대비하여</h6>
            <h6>힌트 기능을 추가해 사용자가 힌트를 자유의지로  껐다 켤 수 있도록 구현하였다.</h6>
            <div class="js-code">
              <h5>JS code</h5>
              <h6>toggle 기능을 사용해 className에 cheat를 추가, 삭제 해 주어</h6>
              <h6>클래스 이름에 cheat가 들어간 경우 (즉, 홀수 번째 클릭한 경우)에만</h6>
              <h6>힌트를 볼 수 있도록 설계하였다.</h6>
              <div class="color-change">
                <h6>'''</h6>
                <h6>  const img = document.getElementById('img');</h6>
                <h6>  img.classList.toggle('cheat');</h6>
                <h6>  if(document.getElementById("img").className === "image-container cheat"){</h6>
                <h6>    [...container.children].forEach(child =>{</h6>
                <h6>      child.innerText = Number(child.getAttribute("data-type")) + 1;</h6>
                <h6>    })</h6>
                <h6>  }else{</h6>
                <h6>    [...container.children].forEach(child =>{</h6>
                <h6>      child.innerText = "";</h6>
                <h6>    })</h6>
                <h6>  }</h6>
                <h6>})</h6>
                <h6>'''</h6>
              </div>
            </div>
          </div>
          <a href="#up"><button id="upButton" type="button">∧</button></a>
        </div>
        <div class="space2">
          <p></p>
        </div>

        <div class="weather-etc">
          <div class="weahter-left">
            <div class="weather-header">
              <h1> Weather </h1>
              <select id="weather-select">
                <option value="Seoul">Seoul</option>
                <option value="London">London</option>
                <option value="Moscow">Moscow</option>
                <option value="Paris">Paris</option>
                <option value="Toronto">Toronto</option>
                <option value="Tokyo">Tokyo</option>
                <option value="Washington, D.C.">Washington, D.C.</option>
                <option value="Prague">Prague</option>
                <option value="Berlin">Berlin</option>
                <option value="Canberra">Canberra</option>
              </select>
            </div>
            <a name="target13"></a>
            <div class="weather-main">
              <div class="info">
                <p class="location">Seoul</p>
                <p class="temperature">
                  <span>3</span>&deg;C
                </p>
                <p class="weather">
                  <img src="https://placeimg.com/50/50/1" alt="1" />
                </p>
                <p class="details">
                  <span class="windchill">Windchill <span>7</span>&deg;C</span>
                  <span class="windspeed">Wind Speed <span>10</span>m/s</span>
                </p>
              </div>
              <img  id="spinner" src="https://placeimg.com/50/50/2" alt="2">
            </div>
          </div>
          <div class="weather-right">
            <div class="weather-guide">
              <h2>What is</h2>
              <h4>Weather Search</h2>
              <h6>공공 날씨 데이터</h6>
              <h6>https://api.openweathermap.org 사이트에서</h6>
              <h6>개인 API KEY를 부여받아 선택한 날씨에 맞게</h6>
              <h6>날씨와 풍속을 알려주는 서비스를 구현하였다.</h6>
            </div>
          </div>
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

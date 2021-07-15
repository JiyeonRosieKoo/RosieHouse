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
    <link rel="stylesheet" href="./style9.css">
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
        <h2>Transaction Cost Analysis</h2>
        <ul class="list-group list-group-flush form-des-list">
          <a class="target" href="#target1"><li >개요 & 분석목표</li></a>
          <a class="target" href="#target2"><li>1. 수출(Export) 부문</li></a>
          <a class="target" href="#target3"><li>2. 수입(Import) 부문</li></a>
          <a class="target" href="#target4"><li>3. 무역 수지를 활용한 결론 도출</li></a>
        </ul>
        <style type="text/css">
          .target:link{color: black; text-decoration: none;}
          .target:visited{color: black; text-decoration: none;}
          .target:hover{color: black; text-decoration: underline;}
        </style>
      </div>
      <div class="form-main">
        <h2 id='tradeTitleImg'></h2>
        <h2 id='tradeTitle'>국가별 수출입 실적 무역통계시스템</h2>
        <h6 id='tradeSmallTitle'>데이터 출처 : 관세청</h6>
        <div class="space4">
          <p></p>
        </div>
        <div class="trade-details">
          <h2>개요</h2>
          <h6>사전적 의미로 국민경제가 다른 나라와의 사이에서 행하는 화물의 교류에 관한 통계입니다.</h6>
          <h6> 일국의 경제영역으로 반입(수입)되거나 반출(수출)됨으로써 그 나라의 물적 자원을 증가 또는 감소시키는 모든 상품이 기록되며,</h6>
          <h6>단순히 한 나라를 통과하는 물품(통과물품)이나 일시적으로 반입 또는 반출되는 물품은 그 나라의 물적 자원량을 증가시키거나 감소시키지 않기 때문에 무역통계에 포함되어 있지 않습니다.</h6>
          <h6 class='tap'></h6>
          <div class="class-tap">
            <h6 id='rawData-des'>관세청에서 배포한 xlsx파일</h6>
            <a name='target1'></a>
            <h2 id=rawData></h2>
          </div>
          <h6 class='tap'></h6>
          <h2>분석 목표</h2>
          <h6>우리나라와 거래하는 국가들의 수출입 실적 데이터를 갖고 수입과 수출량에 따른 수입, 수출액을 비교하여</h6>
          <h6>2021년도 주요 거래 시장 분석과 효율적인 무역관계간의 상관관계를 시각화하여 무역에 대해 잘 알지 못하는 사용자들도 한눈에 현재 무역 상황을 알 수 있도록 구현하였고, </h6>
          <h6>포괄적으로는 사업자 또는 기업이 이 분석으로 통하여 효율적인 비즈니스 대안과 대책을 마련할 수 있도록 하는 목표와</h6>
          <h6>개인적으로는 재학시절 가장 관심이 있었던 데이터 분석에 대한 지식을 확장시켜 실제 비즈니스 모델에 적용해 보고자 하는 것이 목표입니다.</h6>
          <a name='target2'></a>
          <h6 class='tap'></h6>
          <div class="space5">
            <p></p>
          </div>
          <h2>1. 수출(Export) 부문</h2>
          <h6>- 수출량을 기준으로 0 ~ 9,999건 /10,000 ~ 99,999건 / 10,000 ~ 건을 'lowest','middle','largest'라는 이름으로 데이터를 분류하여 'sort'변수에 담아주었습니다.</h6>
          <h6>- 이와 같이 분류된 데이터를 활용하여 수출량이 가장 많은 국가들을 정렬해보며 국가 수출무역의 현황을 알아볼 수 있었습니다.</h6>
          <h2 id='exportRank'></h2>
          <h6>- 그 결과, 현재 일본 / 미국 / 중국 / 베트남 / 싱가포르 / 홍콩 / 대만 순으로 수출로 인한 이익을 많이 남긴 다는 것을 알 수 있었습니다.</h6>
          <h6 class='tap'></h6>
          <h6>- 한편, 수출량은 'middle' 분류에 속하지만 수출액은 'largest'분류에 해당되는 국가들보다 많은 수익을 남기는 국가들이 있다는 사실도 도출해 낼 수 있었습니다.</h6>
          <h2 id='exportResult'></h2>
          <h6>- 위에 그래프에서 얻게된 예외적인 상황을 중심적으로 살펴보아 수입 부문과 비교하였을 때</h6>
          <h6>&nbsp;&nbsp;&nbsp;단순히 숫자로만 접하게 되면 추측하기 힘들었던 기대 이상의 결과를 '분석 결과'의 부분에서 확인 할 수 있었습니다.</h6>
          <a name='target3'></a>
          <h6 class='tap'></h6>
          <div class="space5">
            <p></p>
          </div>
          <h2>2. 수입(Import) 부문</h2>
          <h6>- 수출량과 동일한 기준으로 수입량을 분류하여 'sort'변수에 담아주었습니다.</h6>
          <h6>- 분류된 데이터를 활용하여 수입량 가장 많은 국가들을 정렬해보니 다른 국가들 보다 미국에 많은 무역 의존도을 보인다는 것을 발견하였습니다.</h6>
          <h2 id='importRank'></h2>
          <h6 class='tap'></h6>
          <h6>- 이외에도, 이 그래프를 통하여 수입 건수가 많지 않아도 수입액이 큰 나라들(인도, 싱가폴, 멕시코 등)의 비율이 높은 것으로 보아</h6>
          <h6>- 천연자원이 나오지 않는 우리나라가 외부로 부터 값비싼 원료들을 수입한다는 가정을 세워보았고</h6>
          <h2 id='importResult'></h2>
          <h6>- 실제로 이 가정이 맞다는 사실을 '제약 산업 정보 포탈 - 아시아'분류에서 광물성 연료와 귀금속 수입액이 총 무역액의 20%이상 차지한다고 명시되어있기에</h6>
          <h6>- 가설이 의미있는 데이터로 까지 연관되었다는 사실을 발견할 수 있었습니다.</h6>
          <a name='target4'></a>
          <h6 class='tap'></h6>
          <div class="space5">
            <p></p>
          </div>
          <h2>3. 무역 수지를 활용한 결론 도출</h2>
          <h6>- 이번 분석은 무역에 대해 무지한 작성자가 과연 추출되는 그래프만을 갖고 어떤 가정과 결과를 내세울 수 있을지 확인해 보는 과정도 포함되어 있습니다.</h6>
          <h6>- 마지막으로 관세청에서 제공한 데이터 중 '무역수지' 부분을 활용하여 앞서 내세운 가정이 얼만큼 신뢰성을 갖고 있는지 확인해 보았습니다.</h6>
          <h2 id='highBalance'></h2>
          <h6>- 우리나라의 무역시장 입장에서는 홍콩이라는 나라에서 가장 많은 이윤을 남기고 있는 것을 확인해 볼 수 있었으며</h6>
          <h6>- 뒤이어 미국, 중국과의 거래 또한 많은 이윤을 남긴 다는 사실도 확인할 수 있었습니다.</h6>
          <h6>- 상대적으로 거래 소통량이 많은, 중국과 미국은 우리나라와 상호보완하며 많은 제품들을 교환하며 이윤을 남기는 바람직한 무역관계에 있다는 것을 알게 되었으며,</h6>
          <h6>- 마지막으로, 인도, 멕시코는 수입과 수출량 모두 많지 않지만 거래가격이 높다라는 것을 '무역수지'의 결과 값으로도 확인할 수 있었기에</h6>
          <h6>- 이 부분에 유념하여 국가간의 대비와 대책을 세워 더 높은 이윤을 얻을 수 있을 것이라 예상됩니다.</h6>
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

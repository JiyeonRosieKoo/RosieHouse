<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config['host'], $config['duser'],$config['dpw'],$config['dname']);
$result = mysqli_query($conn, "SELECT * from twenty ORDER BY ratio DESC");
$result2 = mysqli_query($conn, "SELECT * FROM thirthy ORDER BY ratio DESC");
$result3 = mysqli_query($conn, "SELECT * FROM multiple ORDER BY ratio DESC");
$number = 112;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./form.css">
    <link rel="stylesheet" href="./style8.css">
    <title>Online Shopping Trends Statistics</title>
  </head>
  <body>
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
            echo "<p class='result'>".$row['userName']."</p>"; //img ????????? ??????!! escaping
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
              alert("?????? ??????????????? ?????? ???????????? ?????????.");
            }
          </script>
        </div>
      </div>
    </header>

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
    <h2>Online Shopping Trends Statistics</h2>
    <div class="des">
      <span class="naver">????????? ????????? </span><span>????????? ?????? ????</span>
      <button type="button" class="btn btn-light" id='backButton'>Back</button>
      <script>
      const backButton = document.getElementById('backButton');
      backButton.addEventListener('click', ()=>{
        location.href="./api.php";
      })
      </script>
      <form method="post">
        <div class="end-menu">
          <button type="button" class="btn btn-outline-dark" id="searchAges">????????? ?????? ????????? ??????</button>
          <div class="last-menu">
            <div class="ages-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name='check1[]' id="inlineCheckbox2" value="1">
                <label class="form-check-label" for="inlineCheckbox2">20???</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox"  name='check1[]' id="inlineCheckbox3" value="2">
                <label class="form-check-label" for="inlineCheckbox3">30???</label>
              </div>
            </div>
            <div class="search">
                <input type="submit" class="btn btn-light" id="finish3" name="finish" value="??????">
            </div>
          </div>
          <div class="search2">
            <span>?????? ??????</span>
          </div>
        </div>
      </form>
      <div class="result">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">????????????</th>
              <th scope="col">?????????</th>
              <th scope="col">??????</th>
              <th scope="col">??????</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($_POST != null){
              $arr = $_POST['check1'];
              $number = "";
              foreach ($arr as $item) {
                $number .=$item. "\n";
              }
            }else{
              $number = 3;
            }
            if($number == 1){
              $title = 1;
              while($row = mysqli_fetch_assoc($result)){
                echo "<tr><th scope='row'>".$title."</th>";
                echo "<td>20???</td>";
                echo "<td>".$row['keyword']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['ratio']."</td>";
                echo "</tr>";
                $title ++;
              }
            }else if($number == 2){
              $title2 = 1;
              while($row2 = mysqli_fetch_assoc($result2)){
                echo "<tr><th scope='row'>".$title2."</th>";
                echo "<td>30???</td>";
                echo "<td>".$row2['keyword']."</td>";
                echo "<td>".$row2['date']."</td>";
                echo "<td>".$row2['ratio']."</td>";
                echo "</tr>";
                $title2 ++;
              }
            }else{
              $title3 = 1;
              while($row3 = mysqli_fetch_assoc($result3)){
                echo "<tr><th scope='row'>".$title3."</th>";
                echo "<td>".$row3['age']."???</td>";
                echo "<td>".$row3['keyword']."</td>";
                echo "<td>".$row3['date']."</td>";
                echo "<td>".$row3['ratio']."</td>";
                echo "</tr>";
                $title3 ++;
              }
            }
            ?>
          </tbody>
        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="./main.js" charset="utf-8"></script>
    <script src="./age.js" charset="utf-8"></script>
  </body>
</html>

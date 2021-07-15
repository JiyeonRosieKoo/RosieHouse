//background
const firstContents = document.querySelector(".first-contents")
const secondContents = document.querySelector(".second-contents")
const thirdContents = document.querySelector(".third-contents")
const forthContents = document.querySelector(".forth-contents")

//Party
const startButton1 = document.querySelector("#startButton");

let people = 1;
// const number = parseInt(prompt('몇 명이 참가하나요?'), 10); //뒤의 10은 10진법임음 알려주기 위해 작성
let number = 0;
const $w = document.querySelector('#textForm');

let word;    //제시어
let newWord; //새로 입력한 단어

let $people = document.getElementById('order');
let $givenWord = document.getElementById('word');
let confirm = false;

//Typing typingMaster

let SETTING_TIME = 10;
const URL = "https://random-word-api.herokuapp.com/word?number=100";
let words = [];
let time;
let isPlaying = false;
let isReady = false;
let score = 0;
let timeInterval2 = null;


const wordDisplay = document.querySelector(".word-display");
const wordInput = document.querySelector(".word-input");
const scoreDisplay = document.querySelector(".score");
const timeDisplay = document.querySelector(".time");
const button = document.querySelector(".button");
const level1 = document.querySelector(".level1");
const level2 = document.querySelector(".level2");
const level3 = document.querySelector(".level3");
const text_area = document.querySelector('.text_area > span');

//puzzle
const container = document.querySelector('.image-container');
const startButton2 = document.querySelector('#start-button');
const gameText = document.querySelector('.game-text');
const playTime = document.querySelector('.play-time');
const tiles = document.querySelectorAll(".image-container > li");
const cheat = document.querySelector('#cheat-button');

const dragged = {
  el: null,
  class: null,
  index: null,
};
let timeInterval3 = null;
let time2 = 0;
let isPlaying2 = false;
let num = 0;

//Weather
const API_KEY = '05f65b429bc2f61217f1bf2a34083316';

const windchill = document.querySelector(".windchill > span");
const windspeen = document.querySelector(".windspeed > span");
const weatherDisplay = document.querySelector(".weather > img");
const locationDisplay = document.querySelector(".location");
const temperatureDisplay = document.querySelector(".temperature > span");
const weatherSelect = document.querySelector("#weather-select");
const info = document.querySelector(".info");


//background
firstContents.addEventListener('click', ()=>{
  let form = document.getElementById('firstHidden');
  form.classList.toggle("hidden");
});

secondContents.addEventListener('click', ()=>{
  let form = document.getElementById('secondHidden');
  form.classList.toggle("hidden");
});

thirdContents.addEventListener('click', ()=>{
  let form = document.getElementById('thirdHidden');
  form.classList.toggle("hidden");
});

forthContents.addEventListener('click', ()=>{
  let form = document.getElementById('forthHidden');
  form.classList.toggle("hidden");
});

//Party
startButton1.addEventListener('click', ()=>{
  let partyMain = document.getElementById('partyMain');
  let partyInput = document.getElementById("partyInput");
  partyMain.classList.toggle("hidden2");
  partyInput.classList.toggle("hidden2");
  const firstNumber = document.getElementById('textForm2').value;
  number = parseInt(firstNumber, 10);

})

const onInput = (event) =>{
  newWord = event.target.value;
};


//초기화 함수
const reset = () =>{
  document.getElementById('textForm').value = "";
  newWord = "";
}

//참가자 번호
const participations = () => {
  if(people < number){
    people ++;
    $people.innerText = people;
  }else{
    people = 1;
    $people.innerText = people;
  }
}

//변수안에 클릭 함수 만들기
const onClickButton = () =>{
  if(!word){
    //값이 비어있다. == 입력한 단어(newWord)가 제시어가 된다.
    word = $w.value;
    $givenWord.innerText = word;
    participations();
    reset();
  }else{
    //값이 비어있지 않다.
    /** 입력한 단어가 올바른 단어인지 확인해야한다.*/
    if(word.charAt(word.length-1) === newWord.charAt(0))
    {
      word = newWord;
      console.log('다음 사람 진행 GOGO');
      $givenWord.innerText = word;
      participations();
      reset();

    }else{
      confirm = window.confirm('게임이 종료되었습니다. 다시 시작하시겠습니까?');
      if(confirm == true){
        window.location.reload();
      }
      console.log('게임 종료 lose');
    }
  }
};

document.getElementById('textForm').addEventListener('input', onInput);
document.getElementById('button_1').addEventListener('click', onClickButton);


//Typing typingMaster
runToast = (text) => {
  const option = {
    text : text,
    duration: 5000,
    destination: "https://github.com/apvarun/toastify-js",
    newWindow: true,
    close: true,
    offset: {
    x: 50,
    y: 120},
    position: "right",
    backgroundColor: "linear-gradient(to right, #FBD786, #f7797d)",
  }
  Toastify(option).showToast()
}

const getWords = () => {
  axios.get(URL).then(res => {
    words = res.data.filter(word=>word.length < 8);
    button.innerText = 'Game Start';
    isReady = true;
    button.classList.remove('loading');
  }).catch(err => console.log(err))
}

const getWords2 = () => {
  axios.get(URL).then(res => {
    words = res.data.filter(word=>word.length < 8);
    button.innerText = 'Restart';
    isReady = true;
    button.classList.remove('loading');
  }).catch(err => console.log(err))
}

const init = () => {
  time = SETTING_TIME;
  getWords();
}

const init2 = () => {
  time = SETTING_TIME;
  getWords2();
}

const countDown = () => {
  if(time > 0){
    time --;
    console.log(time);
  }else{
    clearInterval(timeInterval2);
    isPlaying = false;
    alert('Game Over', init2());
  }
  timeDisplay.innerText = time;
}


const checkMatch = () => {
  if(!isPlaying){
    return;
  }
  if(wordDisplay.innerText.toLowerCase() === wordInput.value){
    score += 10;
    runToast(wordDisplay.innerText);
    time = SETTING_TIME;
    wordInput.value = "";
    const randomIndex = Math.floor(Math.random() * words.length);
    wordDisplay.innerText = words[randomIndex];
  }else{
  }
  scoreDisplay.innerText = score;
}

//Event Handle

init();


wordInput.addEventListener("input", checkMatch);

button.addEventListener("click", () =>{
  clearInterval(timeInterval2);
  if(!isReady === false){
    timeInterval2 = setInterval(countDown, 1000);
    time = SETTING_TIME;
    isPlaying = true;
    wordInput.value = "";
    score = 0;
    scoreDisplay.innerText = score;
    button.innerText = 'Playing';
  }
})

level1.addEventListener("click", ()=> {
  if(!isPlaying === true){
    SETTING_TIME = 10;
    text_area.innerText ="10초";
  }
})

level2.addEventListener("click", ()=> {
  if(!isPlaying === true){
    SETTING_TIME = 8;
    text_area.innerText ="8초";
  }
})

level3.addEventListener("click", ()=> {
  if(!isPlaying === true){
    SETTING_TIME = 5;
    text_area.innerText ="5초";
  }
})

//Puzzle
function shuffle(array){
  let index = array.length -1;
  while (index > 0){
    const randomIndex = Math.floor(Math.random() * (index + 1));
    [array[index], array[randomIndex]] = [array[randomIndex], array[index]];
    index --;
    }
    return array;
}

function setGame(){
  timeInterval3 = setInterval(()=>{
    time2 ++;
    playTime.innerText = time2;
    gameText.innerText = "Enjoy the game :)"
    isPlaying2 = true;
  },1000);
  const gameTiles = shuffle([...tiles]);
  console.log(gameTiles);
  container.innerHTML = "";
  gameTiles.forEach(tile=>{
  container.appendChild(tile);
  })
}


function checkStatus(){
  const currentList = [...container.children];
  const unMatched = currentList.filter((list, index)=>{
    return Number(list.getAttribute("data-type")) !== index
  })
  if(unMatched.length == 0){
    isPlaying2 = false;
    clearInterval(timeInterval3);
  }
}

startButton2.addEventListener('click', ()=> {
  setGame();
});

//container-> drag selector
container.addEventListener('dragstart', (e)=>{
  const obj = e.target;
  //console.log({ obj });
  dragged.el = obj; //dragged 객체의 element에 obj 정보 모두 담기
  dragged.class = obj.className; //클릭했을 때 list 클래스 이름 받아오기
  //console.log(e);
  dragged.index = [...obj.parentNode.children].indexOf(obj);
});

//drag 중
container.addEventListener('dragover', (e)=>{
  e.preventDefault();
});

//drap 후
container.addEventListener('drop', e =>{
  const obj = e.target;
  let originPlace;
  let isLast = false;

  if(dragged.el.nextSibling){
    originPlace = dragged.el.nextSibling;
  }else{
    originPlace = dragged.el.previousSibling;
    isLast = true;
  }

  const droppedIndex = [...obj.parentNode.children].indexOf(obj);
  if(dragged.index > droppedIndex){
    obj.before(dragged.el);
  }else{
    obj.after(dragged.el);
  }
  isLast ? originPlace.after(obj) : originPlace.before(obj);
  checkStatus();
});

cheat.addEventListener('click', function(){
  const img = document.getElementById('img');
  img.classList.toggle('cheat');
  if(document.getElementById("img").className === "image-container cheat"){
    [...container.children].forEach(child =>{
      child.innerText = Number(child.getAttribute("data-type")) + 1;
    })
  }else{
    [...container.children].forEach(child =>{
      child.innerText = "";
    })
  }
})

//weather
const getWeather = async( city = "seoul" )=> {
  const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${API_KEY}`;
  const response = await axios.get(url);
  const {name, main, weather, wind} = response.data;
  locationDisplay.innerText = name;
  temperatureDisplay.innerText = transferTemperature(main.temp);
  weatherDisplay.setAttribute('src', `http://openweathermap.org/img/wn/${weather[0].icon}@2x.png`);
  windchill.innerText = transferTemperature(main.feels_like);
  windspeen.innerText = wind.speed;
  console.log(response, name);
}

//"http://openweathermap.org/img/wn/01n@2x.png"

const transferTemperature = (temp) => {
  return (temp-273.15).toFixed(1);
}

weatherSelect.addEventListener("change", (e) => {
  getWeather(e.target.value);
});

getWeather();

//Query variations
const quote = document.querySelector("#quote");
const menuBar = document.querySelector(".menu-bar");
const menuContents = document.querySelectorAll(".menu-contents, .hidden");
const modal = document.querySelector(".login");
// const cover = document.getElementById("visualId");
// const lButton = document.getElementById("left");
// const rButton = document.getElementById("right");

//let variations
let i = 0;
// let n = 0;
let scale = 0.8;

function zoom(){
  document.body.style.zoom = scale;
}
zoom();

let timeInterval = null;
// let timeInterval2 = null;

//const variations
const quotes = ['Peace is always beautiful','Side by side just breathing',"Some hearts aren't blessed to beat together","Don't let the world tame your wild", 'The brain is wider than the sky'];
// const coverImgUrl = ["url('https://github.com/JiyeonRosieKoo/htdocs/blob/05/28/Rosie/resources/Games.jpg?raw=true')","url('https://github.com/JiyeonRosieKoo/htdocs/blob/05/28/Rosie/resources/App2.jpg?raw=true')","url('https://github.com/JiyeonRosieKoo/htdocs/blob/05/28/Rosie/resources/UGTP2.png?raw=true')","url('https://github.com/JiyeonRosieKoo/htdocs/blob/05/28/Rosie/resources/Todo-list.jpg?raw=true')"];
//Banner
function timer(){
  timeInterval = setInterval(()=>{
    if(i >= 0 && i < quotes.length)
    {
      quote.innerText = quotes[i];
      i++;
    }else{
      i = 0;
      quote.innerText = quotes[i];
      i++;
    }

  },5000);
}

// function timer2(){
//   timeInterval2 = setInterval(()=>{
//     if(n >= 0 && n < 4){
//       cover.style.backgroundImage = coverImgUrl[n];
//       n++;
//     }else if(n === 4){
//       n = 0;
//       cover.style.backgroundImage = coverImgUrl[n];
//       n++;
//     }
//     console.log(n);
//   }, 8000);
// }

const timeControl = () =>{ timer(); };

//init();
timeControl();
// timer2();

menuBar.addEventListener('click', ()=>{
  console.log("hello");
  let menu = document.getElementById('menu');
  menu.classList.toggle("hidden");
});


// rButton.addEventListener('click', ()=>{
//   clearInterval(timeInterval2);
//   if(n >= 0 && n < 4){
//     cover.style.backgroundImage = coverImgUrl[n];
//     n++;
//   }else if(n === 4){
//     n = 0;
//     cover.style.backgroundImage = coverImgUrl[n];
//     n++;
//   }else{
//     n = 0;
//     cover.style.backgroundImage = coverImgUrl[n];
//   }
//   console.log(n);
// });
//
// lButton.addEventListener('click', ()=>{
//   clearInterval(timeInterval2);
//   if(n >= 0 && n < 4){
//     n--;
//     cover.style.backgroundImage = coverImgUrl[n];
//   }
//   else if(n === 4){
//     n = 3;
//     cover.style.backgroundImage = coverImgUrl[n];
//   }
//   else if(n < 0){
//     n = 3;
//     cover.style.backgroundImage = coverImgUrl[n];
//   }
//   console.log(n);
// })

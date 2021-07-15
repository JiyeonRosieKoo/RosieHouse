const firstContents = document.querySelector(".first-contents")
const secondContents = document.querySelector(".second-contents")
const thirdContents = document.querySelector(".third-contents")
const forthContents = document.querySelector(".forth-contents")
const fifthContents = document.querySelector(".fifth-contents")
const sixthContents = document.querySelector(".sixth-contents")
const seventhContents = document.querySelector(".seventh-contents")
const lButton = document.getElementById("bt1");
const rButton = document.getElementById("bt2");
const ptimg = document.getElementById('ptimg');
const pptImg = ['./resources/ppt/ppt7.jpeg','./resources/ppt/ppt8.jpeg','./resources/ppt/ppt9.jpeg','./resources/ppt/ppt10.jpeg','./resources/ppt/ppt11.jpeg','./resources/ppt/ppt12.jpeg','./resources/ppt/ppt13.jpeg','./resources/ppt/ppt14.jpeg','./resources/ppt/ppt6.jpeg'];
let n = 0;
const cId = document.getElementById('commentID');

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

fifthContents.addEventListener('click', ()=>{
  let form = document.getElementById('fifthHidden');
  form.classList.toggle("hidden");
});

sixthContents.addEventListener('click', ()=>{
  let form = document.getElementById('sixthHidden');
  form.classList.toggle("hidden");
});
seventhContents.addEventListener('click', ()=>{
  let form = document.getElementById('seventhHidden');
  form.classList.toggle("hidden");
});


rButton.addEventListener('click', ()=>{
  if(n >= 0 && n < 9){
    ptimg.src = pptImg[n];
    n++;
  }else if(n === 9){
    n = 0;
    ptimg.src = pptImg[n];
    n++;
  }else{
    n = 0;
    ptimg.src = pptImg[n];
  }
  console.log(n);
});

lButton.addEventListener('click', ()=>{
  if(n >= 0 && n < 9){
    n--;
    ptimg.src = pptImg[n];
  }
  else if(n === 9){
    n = 8;
    ptimg.src = pptImg[n];
  }
  else if(n < 0){
    n = 8;
    ptimg.src = pptImg[n];
  }
  console.log(n);
})

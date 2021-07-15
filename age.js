
const searchAges = document.getElementById('searchAges');
const agesGroup = document.querySelector('.ages-group');
const resultBar = document.querySelector('.search2');

const twenty = document.getElementById('inlineCheckbox2');
const thirthy = document.getElementById('inlineCheckbox3');

var count_twenty = 0;
var span_twenty;
var count_thirthy = 0;
var span_thirthy;


//Set properites
searchAges.addEventListener('click', ()=> {
  genderGroup.classList = "gender-group hidden";
  agesGroup.classList.toggle('hidden');
  searchAges.style.backgroundColor = "gray";
  searchAges.style.color = "#fff";
  searchGender.style.backgroundColor = "#fff";
  searchGender.style.color = "black";
  console.log("change");
});


twenty.addEventListener('click', ()=>{
  if(count_twenty % 2 === 0){
    span_twenty = document.createElement('span');
    resultBar.append(span_twenty);
    span_twenty.innerText = "#20대";
    count_twenty ++;
  }else{
    console.log('20대 태그 삭제');
    span_twenty.remove();
    count_twenty ++;
  }
});

thirthy.addEventListener('click', ()=>{
  if(count_thirthy % 2 === 0){
    span_thirthy = document.createElement('span');
    resultBar.append(span_thirthy);
    span_thirthy.innerText = "#30대";
    count_thirthy ++;
  }else{
    console.log('30대 태그 삭제');
    span_thirthy.remove();
    count_thirthy ++;
  }
});

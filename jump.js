const allButton = document.getElementById('allButton');
const genderButton = document.getElementById('genderButton');
const ageButton = document.getElementById('ageButton');


allButton.addEventListener('click', ()=> {
  location.href="./keyword.php";
});


genderButton.addEventListener('click', ()=> {
  location.href="./gender.php";
});

ageButton.addEventListener('click', ()=> {
  location.href="./age.php";
});

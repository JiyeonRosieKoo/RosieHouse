const userId = document.querySelector('.result');

runToast = (text) => {
  const option = {
    text : text,
    duration: 3000,
    destination: "https://github.com/apvarun/toastify-js",
    newWindow: true,
    close: true,
    offset: {
    x: 50,
    y: 120},
    position: "right",
    backgroundColor: "linear-gradient(to right, #232526, #414345)",
  }
  Toastify(option).showToast()
}

runToast(userId.innerText+"님 환영합니다.");

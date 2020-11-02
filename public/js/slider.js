let testimonies = document.getElementsByClassName("testimony");
let slide = 0;
let rightArr = document.getElementById("right-arr");
let leftArr = document.getElementById("left-arr");
testimonies[slide].style = "display: flex";
rightArr.addEventListener("click", rightSlide);
leftArr.addEventListener("click", leftSlide);

function rightSlide() {
  if (slide === testimonies.length - 1) {
    testimonies[slide].style = "display: none";
    slide = 0;
    testimonies[slide].style = "display: flex";
  } else {
    testimonies[slide].style = "display: none";
    slide = slide + 1;
    testimonies[slide].style = "display: flex";
  }
}

function leftSlide() {
  if (slide === 0) {
    testimonies[slide].style = "display: none";
    slide = testimonies.length - 1;
    testimonies[slide].style = "display: flex";
  } else {
    testimonies[slide].style = "display: none";
    slide = slide - 1;
    testimonies[slide].style = "display: flex";
  }
}
let timer = window.setInterval(rightSlide, 3000);

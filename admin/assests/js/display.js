let success = document.querySelectorAll(".success");
let i;
setTimeout(() => {
  //   success[0].style.display = "none";
  //   success[1].style.display = "none";
  for (i = 0; i < success.length; i++) {
    success[i].style.display = "none";
  }
}, 5000);
console.log(success);

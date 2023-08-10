let success = document.querySelectorAll(".success");
let i;
setTimeout(() => {
  for (i = 0; i < success.length; i++) {
    success[i].style.display = "none";
  }
}, 5000);
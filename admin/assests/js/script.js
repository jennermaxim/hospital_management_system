let success = document.querySelectorAll(".success");
let error = document.querySelectorAll(".error");
let i;
setTimeout(() => {
  for (i = 0; i < success.length; i++) {
    success[i].style.display = "none";
  }
  for (i = 0; i < error.length; i++) {
    error[i].style.display = "none";
  }
}, 5000);

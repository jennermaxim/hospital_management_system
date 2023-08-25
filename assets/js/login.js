let showpassword = document.querySelector(".main fieldset form .password img");
let password = document.querySelector(".main fieldset form .password input");

showpassword.onclick = () => {
  if (password.type == "password") {
    password.type = "text";
    showpassword.src = "images/hide.png";
  } else {
    password.type = "password";
    showpassword.src = "images/visible.png";
  }
};

let error = document.querySelector(".main fieldset .error");
setTimeout(() => {
  error.style.display = "none";
}, 10000);

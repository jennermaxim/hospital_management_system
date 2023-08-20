let success = document.querySelectorAll(".success");
let error = document.querySelectorAll(".error");
let i;
let sidebar = document.querySelector("#sidebar");
let messages = document.querySelectorAll(".contact-messages");
let contacts = document.querySelectorAll(".contacts");

let displayMenu = () => {
  sidebar.classList.toggle("show");

  for (i = 0; i < messages.length; i++) {
    messages[i].classList.toggle("hide");
  }

  for (i = 0; i < contacts.length; i++) {
    contacts[i].classList.toggle("size");
  }
};

setTimeout(() => {
  for (i = 0; i < success.length; i++) {
    success[i].style.display = "none";
  }
  for (i = 0; i < error.length; i++) {
    error[i].style.display = "none";
  }
}, 5000);

let displayPatient = () => {
  document.getElementById("subpatient").classList.toggle("show");
};

let displayAppoitment = () => {
  document.getElementById("subappoitment").classList.toggle("show");
};

let displayBloodGroup = () => {
  document.getElementById("subbloodgroup").classList.toggle("show");
};

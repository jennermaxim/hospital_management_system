let success = document.querySelectorAll(".success");
let error = document.querySelectorAll(".error");
let i;
let sidebar = document.querySelector("#sidebar");

let displayMenu = () => {
  sidebar.classList.toggle("show");
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
}

let displayAppoitment = () => {
  document.getElementById("subappoitment").classList.toggle("show");
}

let displayBloodGroup = () => {
  document.getElementById("subbloodgroup").classList.toggle("show");
}
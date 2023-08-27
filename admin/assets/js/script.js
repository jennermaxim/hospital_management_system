let success = document.querySelectorAll(".success");
let error = document.querySelectorAll(".error");
let i;
let sidebar = document.querySelector("#sidebar");
let profile = document.querySelector("#profile");
let profiledropdown = document.querySelector("#profiledropdown");

profile.onclick = () => {
  profiledropdown.classList.toggle("show");
};

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

let displayEmployee = () => {
  document.getElementById("subemployee").classList.toggle("show");
};

let displayLocation = () => {
  document.getElementById("sublocation").classList.toggle("show");
};

let displayDoctor = () => {
  document.getElementById("subdoctor").classList.toggle("show");
};

let displayDisease = () => {
  document.getElementById("subdisease").classList.toggle("show");
};

let displayPatient = () => {
  document.getElementById("subpatient").classList.toggle("show");
};

let displayStaff = () => {
  document.getElementById("substaff").classList.toggle("show");
};

let displayTitle = () => {
  document.getElementById("subtitle").classList.toggle("show");
};

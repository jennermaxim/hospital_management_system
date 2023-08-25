let userContact = document.querySelector(".chat .contacts .user-contact");

setInterval(() => {
  let xhrc = new XMLHttpRequest();
  xhrc.open("POST", "get-contact.php", true);
  xhrc.onload = () => {
    if (xhrc.readyState == XMLHttpRequest.DONE) {
      if (xhrc.status == 200) {
        let data = xhrc.response;
        userContact.innerHTML = data;
      }
    }
  };
  xhrc.send();
}, 500);

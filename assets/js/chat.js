let messagescroll = document.querySelector(".messages");
let chatBox = document.querySelector(".chat-box");
var height = 0;
var cancelScrool = false;

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        height = messagescroll.scrollHeight;
        if (!cancelScrool) {
          scrollFunction(height);
          cancelScrool = true;
        }
      }
    }
  };
  xhr.send();
}, 500);

let scrollFunction = (height) => {
  messagescroll.scrollTo(0, height);
};

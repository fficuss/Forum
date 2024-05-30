function openPhotoPopup() {
    var popup = document.getElementById("photo-popup");
    popup.style.display = "block";
}

function uploadPhoto() {
    var fileInput = document.getElementById("file-input");
    var selectedFile = fileInput.files[0];

    if (selectedFile) {

        console.log("Selected file:", selectedFile.name);

        var openPopupButton = document.querySelector(".open-popup-button");
        openPopupButton.innerHTML = ""; 
        var img = document.createElement("img");
        img.src = URL.createObjectURL(selectedFile);
        img.alt = "Chosen Photo";
        openPopupButton.appendChild(img);
    } else {
        console.log("No file selected.");
    }
    var popup = document.getElementById("photo-popup");
    popup.style.display = "none";
}

function displayChosenPhoto() {
    var fileInput = document.getElementById("file-input");
    var selectedFile = fileInput.files[0];

    if (selectedFile) {
    }
}

function sendMessage() {
    var messageInput = document.getElementById('msg');
    var messageText = messageInput.value.trim();
    
    if (messageText === '') {
      return;
    }
    
    var chatMessages = document.getElementById('chat-messages');
    var messageDiv = document.createElement('div');
    messageDiv.classList.add('message', 'sent');
    messageDiv.textContent = messageText;
    chatMessages.appendChild(messageDiv);
    

    messageInput.value = '';

  }
  




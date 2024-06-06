function searchPosts() {
  const query = document.getElementById('search-input').value;
  let url = `{{ url('/posts') }}?`;

  if (query.startsWith('@')) {
      const username = query.substring(1);
      url += `user=${username}`;
  } else {
      url += `title=${query}`;
  }

  fetch(url, {
      headers: {
          'X-Requested-With': 'XMLHttpRequest'
      }
  })
  .then(response => response.text())
  .then(data => {
      document.getElementById('posts-container').innerHTML = data;
  })
  .catch(error => console.error('Error fetching posts:', error));
}

function toggleFilter() {
  const filterContainer = document.getElementById('filter-container');
  filterContainer.classList.toggle('active');
}

function openPhotoPopup() {
    var popup = document.getElementById("photo-popup");
    popup.style.display = "block";
}

function displayChosenPhoto() {
    var fileInput = document.getElementById("file-input");
    var selectedFile = fileInput.files[0];

    if (selectedFile) {
        var openPopupButton = document.querySelector(".open-popup-button img");
        openPopupButton.src = URL.createObjectURL(selectedFile);
        openPopupButton.alt = "Chosen Photo";
    }
}


function uploadPhoto() {
    var popup = document.getElementById("photo-popup");
    popup.style.display = "none";
}

async function updateProfileIcon() {
    const fileInput = document.getElementById('file-input');
    const usernameInput = document.getElementById('nck');
  
    if (fileInput && fileInput.files.length > 0) {
      const file = fileInput.files[0];
      const reader = new FileReader();
  
      reader.onload = async function () {
        try {
          const imageData = reader.result;
          await updateProfileIconData(usernameInput.value, imageData);
        } catch (error) {
          console.error('Error processing image:', error);
          alert('An error occurred while processing the image.');
        }
      };
  
      reader.readAsDataURL(file);
    } else {
      alert('Please select a profile icon to upload.');
    }
  }
  
  async function updateProfileIconData(username, imageData) {
    const profileData = new FormData();
    profileData.append('username', username);
    profileData.append('profile_picture', imageData);
  
    try {
      const response = await fetch('{{ route("profile.update") }}', {
        method: 'POST',
        body: profileData,
      });
  
      const result = await response.json();
  
      if (response.ok) {
        alert('Profile icon updated successfully!');
        window.location.reload(); 
      } else {
        alert(`Error: ${result.error}`);
      }
    } catch (error) {
      console.error('Error updating profile icon:', error);
      alert('An error occurred while updating the profile icon.');
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
  




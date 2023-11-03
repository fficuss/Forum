function openPhotoPopup() {
    var popup = document.getElementById("photo-popup");
    popup.style.display = "block";
}

function uploadPhoto() {
    var fileInput = document.getElementById("file-input");
    var selectedFile = fileInput.files[0];

    if (selectedFile) {
        // You can handle the selected file, for example, upload it to the server.
        console.log("Selected file:", selectedFile.name);

        // Update the button with the chosen photo
        var openPopupButton = document.querySelector(".open-popup-button");
        openPopupButton.innerHTML = ""; // Clear previous content
        var img = document.createElement("img");
        img.src = URL.createObjectURL(selectedFile);
        img.alt = "Chosen Photo";
        openPopupButton.appendChild(img);
    } else {
        console.log("No file selected.");
    }

    // Close the popup after handling the file
    var popup = document.getElementById("photo-popup");
    popup.style.display = "none";
}

function displayChosenPhoto() {
    // This function is optional and can be used to preview the chosen photo if desired.
    var fileInput = document.getElementById("file-input");
    var selectedFile = fileInput.files[0];

    if (selectedFile) {
        // You can use this function to display a preview of the chosen photo.
        // For simplicity, it's left empty in this example.
    }
}






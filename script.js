let opened = false;

function ShowSide() {
    const catalog = document.getElementById("side"); 
    const menu = document.getElementById("menu_button");
    if (opened) {
        opened = false;
        catalog.style.left = "-100%"; // Move the catalog out of the viewport to the left
        menu.style.left = 0;
    } else {
        opened = true;
        catalog.style.left = "0%"; // Bring the catalog back into the viewport
        menu.style.left = "110px";
    }
}
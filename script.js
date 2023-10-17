let opened = false;

function ShowSide() {
    const catalog = document.getElementById("side"); 
    const menu = document.getElementById("menu_button");
    if (opened) {
        opened = false;
        catalog.style.left = "-100%";
        menu.style.left = 0;
    } else {
        opened = true;
        catalog.style.left = "0%";
        menu.style.left = "100%";
    }
}
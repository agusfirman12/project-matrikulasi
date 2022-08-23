let menu = document.querySelector("#menu-icon");
let content = document.querySelector(".content");
let sidebar = document.querySelector(".sidebar");
let items = document.querySelectorAll(".text-items");

menu.onclick = function () {
    sidebar.classList.toggle("active");
    content.classList.toggle("active");
    for (let i = 0; i < items.length; i++) {
        items[i].classList.toggle("hidden");
    }
}
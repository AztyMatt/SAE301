const links = document.querySelectorAll("nav ul li a");

function removeActive() {
    links.forEach(a => {
        a.classList.remove("active");
    });
}

links.forEach(a => {
    a.addEventListener("click", () => {
        removeActive();
        a.classList.add("active");
    });
});

let sidenav = document.getElementById("mySidenav");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

function openNav() {
    sidenav.classList.add("active");
}

function closeNav() {
    sidenav.classList.remove("active");
}
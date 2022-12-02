const links = document.querySelectorAll("nav li a");

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



var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
    sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    sidenav.classList.remove("active");
}
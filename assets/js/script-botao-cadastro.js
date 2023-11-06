document.addEventListener("click", function(event) {
    const userMenu = document.getElementById("user-menu");
    if (event.target !== userMenu && !userMenu.contains(event.target)) {
        userMenu.style.display = "none";
    }
});
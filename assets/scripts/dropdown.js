let dropdowns = document.querySelectorAll(".nav-option");

dropdowns.forEach(option => {
    option.addEventListener("mouseenter", () => {
        const menu = option.querySelector(".nav-dropdown-option");
        menu.style.display = "block";
    });

    option.addEventListener("mouseleave", () => {
        const menu = option.querySelector(".nav-dropdown-option");
        menu.style.display = "none";
    });
});
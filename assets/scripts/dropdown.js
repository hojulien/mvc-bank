let dropdowns = document.querySelectorAll(".nav-option");

// affiche le menu déroulant lorsque le curseur est passé dessus, le dé-affiche lorsque le curseur quitte la zone

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
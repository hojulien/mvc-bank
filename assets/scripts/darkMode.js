let darkMode = document.getElementById("dark");
let lightMode = document.getElementById("light");
let body = document.querySelector("body");

// affiche une icône et "cache" l'autre

function displayDarkIcon(){
    lightMode.style.display = "none";
    darkMode.style.display = "block";
}

function displayLightIcon(){
    darkMode.style.display = "none";
    lightMode.style.display = "block";
}

// applique les changements du site selon la valeur de localStorage, puis affiche le site
// cela permet d'être sûr que les changements de style soient effectifs avant d'afficher le contenu du site

document.addEventListener("DOMContentLoaded", () => {
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-mode");
        displayLightIcon();
    } else {
        displayDarkIcon();
    }
});

darkMode.addEventListener("click", () => {
    body.classList.add("dark-mode");
    localStorage.setItem("theme", "dark"); 
    displayLightIcon();
});

lightMode.addEventListener("click", () => {
    body.classList.remove("dark-mode");
    localStorage.setItem("theme", "light");
    displayDarkIcon();
});
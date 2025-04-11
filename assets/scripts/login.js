let form = document.getElementById("login");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let emailPattern = /^[^@]+@[^@.]+\.[^@]+$/;
    let isValid = true;

    // EMAIL
    if (document.getElementById("email").value.length == 0) {
        document.getElementById("error-email").textContent = "Veuillez entrer une adresse email."
        isValid = setTo(isValid, false);
    } else if (!emailPattern.test(document.getElementById("email").value)) {
        document.getElementById("error-email").textContent = "L'adresse email n'est pas valide."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-email",isValid);
    }

    if (isValid) {
        form.submit();
    }
});

// setTo change un booléen en une valeur donnée
function setTo(bool, val){
    bool = val;
    return bool;
}

// resetText vide le message d'erreur et appelle setTo à true
function resetText(id, bool) {
    document.getElementById(id).textContent = "";
    bool = setTo(bool, true);
}
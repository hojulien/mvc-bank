let form = document.getElementById("formUser");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let emailPattern = /^[^@]+@[^@.]+\.[^@]+$/;
    let phoneNPattern = /^\+(\d{10,14})$/;
    let isValid = true;

    // NOM
    if (document.getElementById("fName").value.length == 0) {
        document.getElementById("error-fName").textContent = "Veuillez entrer un nom."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-fName",isValid);
    }

    // PRENOM
    if (document.getElementById("lName").value.length == 0) {
        document.getElementById("error-lName").textContent = "Veuillez entrer un prénom."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-lName",isValid);
    }

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

    // PHONE NUMBER
    if (document.getElementById("phoneN").value.length == 0) {
        document.getElementById("error-phoneN").textContent = "Veuillez entrer un numéro de téléphone."
        isValid = setTo(isValid, false);
    } else if (!phoneNPattern.test(document.getElementById("phoneN").value)) {
        document.getElementById("error-phoneN").textContent = "Le numéro de téléphone n'est pas valide. (Format: +111222333444, 10 à 14 chiffres)"
        isValid = setTo(isValid, false);
    } else {
        resetText("error-phoneN",isValid);
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
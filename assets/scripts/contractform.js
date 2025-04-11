let form = document.getElementById("formContract");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let isValid = true;

    // CONTRACT TYPE
    if (document.getElementById("typeC").value === "") {
        document.getElementById("error-typeC").textContent = "Veuillez sélectionner un type de contrat."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-typeC",isValid);
    }

    // PRICE
    if (document.getElementById("price").value === "") {
        document.getElementById("error-price").textContent = "Veuillez entrer un prix."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-price",isValid);
    }


    // DURATION
    if (document.getElementById("duration").value === "") {
        document.getElementById("error-duration").textContent = "Veuillez entrer le nombre de mois."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-duration",isValid);
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
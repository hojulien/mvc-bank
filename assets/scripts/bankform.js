let form = document.getElementById("formBank");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let ibanPattern = /^[A-Z]{2}\d{2}[A-Z0-9]{4,32}$/;
    let isValid = true;

    // IBAN
    if (document.getElementById("iban").value.length == 0) {
        document.getElementById("error-iban").textContent = "Veuillez entrer un IBAN."
        isValid = setTo(isValid, false);
    } else if (!ibanPattern.test(document.getElementById("iban").value)) {
        document.getElementById("error-iban").textContent = "L'IBAN n'est pas valide."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-iban",isValid);
    }

    // ACCOUNT TYPE
    if (document.getElementById("typeA").value == "") {
        document.getElementById("error-typeA").textContent = "Veuillez sélectionner un type de compte."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-typeA",isValid);
    }

    // BALANCE
    if (document.getElementById("balance").value == "") {
        document.getElementById("error-balance").textContent = "Veuillez entrer un solde bancaire."
        isValid = setTo(isValid, false);
    } else {
        resetText("error-balance",isValid);
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
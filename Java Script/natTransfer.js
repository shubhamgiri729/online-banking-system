function clearError() {
    document.getElementById("error").innerHTML = "";
}

function goto() {
    clearError();

    var accno = document.getElementById("accno").value.trim();
    var amount = parseInt(document.getElementById("amnt").value);

    // Basic validation
    if (accno.length !== 16 || isNaN(amount) || amount <= 0 || amount > 1000000) {
        document.getElementById("error").innerHTML =
            "Please enter a valid 16-digit account number and amount.";
        return;
    }

    // Submit form to PHP (server handles balance & DB)
    document.querySelector("form").submit();
}

function load() {
    wrong();
    document.getElementById("accno").value = "";
    document.getElementById("email").value = "";
}

function retEmail() {
    return document.getElementById("email").value;
}

function wrong() {
    document.getElementById("loginbtn").disabled = true;
    document.getElementById("accno").focus();
    document.getElementById("loginbtn").style.opacity = "0.5";
}

function validForm() {
    var email = document.getElementById("email").value;
    var accno = document.getElementById("accno").value;
    var pass = document.getElementById("password").value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!emailPattern.test(email)) {
        document.getElementById("result").innerHTML = "Invalid email format.";
        wrong();
        return false;
    }

    if (!/^\d{11}$/.test(accno)) {
        document.getElementById("result").innerHTML = "Account No. must be exactly 16 numeric characters.";
        wrong();
        return false;
    }

    if (pass.length < 6) {
        document.getElementById("result").innerHTML = "Password must contain more than 6 characters.";
        wrong();
        return false;
    } else {
        document.getElementById("loginbtn").disabled = false;
        document.getElementById("result").innerHTML = "";
        document.getElementById("loginbtn").style.opacity = "1";
        return true;
    }
}

// function goto() {
//     document.getElementById("loginbtn").style.borderStyle = "inset";
//     window.location.replace("index.php");
//     return true;
// }
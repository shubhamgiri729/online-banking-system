let verify = document.querySelector(".verify");
let submit = document.getElementById("submit");
let accountnum = document.querySelector(".acnum");
let conf = document.querySelector(".confirm");


let checkRequiredFields = () => {
    let requiredFields = document.querySelectorAll("input[required]");
    let allFilled = true;
    
    requiredFields.forEach(field => {
        if (field.value.trim() === "") {
            allFilled = false;
        }
    });

    submit.disabled = !allFilled;
};

let con = (event) => {
    event.preventDefault(); 
    conf.classList.remove("blank");
};


let load = () => {
    verify.classList.remove("hide");
    setTimeout(() => {
        verify.innerHTML = "!!Your account is verified!!";
        verify.style.color = "green"; 
    }, 40000000);
};


document.querySelectorAll("input").forEach(input => {
    input.addEventListener("input", checkRequiredFields);
});

submit.addEventListener("click", con);
conf.addEventListener("click", load);

submit.disabled = true;

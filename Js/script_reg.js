// variables

let name = document.querySelector(".input1");
let Username = document.querySelector(".input2");
let email = document.querySelector(".input3");
let Password = document.querySelector(".input4");
let Repeat_Password = document.querySelector(".input5");

//Check name
var regName = /^([a-zA-Zà-úÀ-Ú]{2,})+\s+([a-zA-Zà-úÀ-Ú\s]{2,})+$/i;

name.oninput = function () {

    if(!regName.test(name)){
        console.log('Invalid name given.');
        name.style.border = "1px solid red";
    }else{
        console.log('Valid name given.');
        name.style.border = "1px solid #16FF00";
    }
};
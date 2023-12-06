// Script pour l'affichage de la force du mdp via une barre colorée 

let parameters = {
    uppercase : false,
    lowercase : false,
    number : false,
    specChars : false
}


function passwdStrength(){
    var strenghBar = document.getElementById("strength-bar");

    let password = document.getElementById("password").value;

    parameters.uppercase = (/[A-Z]+/.test(password))?true:false;
    parameters.lowercase = (/[a-z]+/.test(password))?true:false;
    parameters.number = (/[0-9]+/.test(password))?true:false;
    parameters.specChars = (/[!@#$%&*()_+\-=\[\]{};:|.<>\/?]+/.test(password))?true:false;
    
    // console.log(Object.values(parameters));

    var uppercaseNum = 0;
    var lowercaseNum = 0;
    var numberNum = 0;
    var specCharsNum = 0;
    var passwordLg = password.length;
    var strengh = 0;
    var barWidth = 0;
    var barWidthPercentage = 0;

    if(parameters.uppercase) {
        uppercaseNum = 26;
    }
    
    if(parameters.lowercase) {
        lowercaseNum = 26;
    }

    if(parameters.number) {
        numberNum = 10;
    }

    if(parameters.specChars) {
        specCharsNum = 26;
    }

    possibleCharNum = uppercaseNum + lowercaseNum + numberNum + specCharsNum;

    // console.log(possibleCharNum);
    // console.log(passwordLg);


    strengh = Math.ceil(passwordLg * Math.log2(possibleCharNum));

    if(strengh > 120){
        strengh = 120;
    }

    // console.log(strengh);

    barWidth = strengh + (4*passwordLg);

    barWidthPercentage = (barWidth*100)/240;

    // console.log(barWidthPercentage);


    if(barWidthPercentage < 20){

        strenghBar.style.background = `linear-gradient(to right, rgb(252, 13, 13) 0 ${barWidthPercentage}%, rgb(214, 214, 214) ${barWidthPercentage}%)`;

    } else if(barWidthPercentage < 40){

        strenghBar.style.background = `linear-gradient(to right, rgb(252, 13, 13) 20%, rgb(255, 196, 0) ${barWidthPercentage}%, rgb(214, 214, 214) ${barWidthPercentage}%)`;
        
    } else if(barWidthPercentage < 60){

        strenghBar.style.background = `linear-gradient(to right, rgb(252, 13, 13) 20%, rgb(255, 196, 0) 40%, rgb(255, 217, 0) ${barWidthPercentage}%,  rgb(214, 214, 214) ${barWidthPercentage}%)`;
        
    } else {

        strenghBar.style.background = `linear-gradient(to right, rgb(252, 13, 13) 20%, rgb(255, 196, 0) 40%, rgb(255, 217, 0) 60%, rgb(26, 206, 9) ${barWidthPercentage}%, rgb(214, 214, 214) ${barWidthPercentage}%)`;

    }

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function resetStyle(ele){
    var id = ele.id;
    if(ele.value != ''){
        document.getElementById(id).style.borderColor = 'black';
    }
}

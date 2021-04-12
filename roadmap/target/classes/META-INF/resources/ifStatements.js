//I'm spliting all of this up onto its own js file

// 1. Yes I know this many if statement isn't smart
// 2. Yes I know this is error prone
// 3. Yes I've looked into other options before implementation
// 4. I just want this to work ;-;

//Declaring variables for checkboxes
var cppCheck
var pythonCheck
var jsCheck
var cSharpCheck
var cCheck
var goCheck
var javaCheck
var swiftCheck
var phpCheck


const saveCBToLocalstorage = () =>{
    cppCheck = document.getElementById("cpp").checked;
    pythonCheck = document.getElementById("python").checked;
    jsCheck = document.getElementById("js").checked;
    cSharpCheck = document.getElementById("c#").checked;
    cCheck = document.getElementById("c").checked;
    goCheck = document.getElementById("go").checked;
    javaCheck = document.getElementById("java").checked;
    swiftCheck = document.getElementById("swift").checked;
    phpCheck = document.getElementById("php").checked;

    //storing each in localstorage
    if (cppCheck){localStorage.setItem('cppStatus', cppCheck);}
    else{localStorage.setItem('cppStatus', 'false');}

    if (pythonCheck){localStorage.setItem('pythonStatus', pythonCheck);}
    else{localStorage.setItem('pythonStatus', 'false');}
    
    if (jsCheck){localStorage.setItem('jsStatus', jsCheck);}
    else{localStorage.setItem('jsStatus', 'false');}

    if (cSharpCheck){localStorage.setItem('cSharpStatus', cSharpCheck);}
    else{localStorage.setItem('cSharpStatus', 'false');}

    if (cCheck){localStorage.setItem('cStatus', cCheck);}
    else{localStorage.setItem('cStatus', 'false');}

    if (goCheck){localStorage.setItem('goStatus', goCheck);}
    else{localStorage.setItem('goStatus', 'false');}

    if (javaCheck){localStorage.setItem('javaStatus', javaCheck);}
    else{localStorage.setItem('javaStatus', 'false');}

    if (swiftCheck){localStorage.setItem('swiftStatus', swiftCheck);}
    else{localStorage.setItem('swiftStatus', 'false');}

    if (phpCheck){localStorage.setItem('phpStatus', phpCheck);}
    else{localStorage.setItem('phpStatus', 'false');}
}


//outputting each on tree-landing
// NOTE: Any data passed into localStorage is automatacally converted into a string, 
// hense the 'false' & 'true' . Some of them are strings and some of them are booleans

if (localStorage.getItem('cppStatus') == 'true'){document.getElementById("cpp").innerHTML = 'C++';}

if (localStorage.getItem('pythonStatus') == 'true'){document.getElementById("python").innerHTML = 'Python';}

if (localStorage.getItem('jsStatus') == 'true'){document.getElementById("js").innerHTML = 'Javascript';}

if (localStorage.getItem('cSharpStatus') == 'true'){document.getElementById("c#").innerHTML = 'C#';}

if (localStorage.getItem('cStatus') == 'true'){document.getElementById("c").innerHTML = 'C';}

if (localStorage.getItem('goStatus') == 'true'){document.getElementById("go").innerHTML = 'GO';}

if (localStorage.getItem('javaStatus') == 'true'){document.getElementById("java").innerHTML = 'Java';}

if (localStorage.getItem('swiftStatus') == 'true'){document.getElementById("swift").innerHTML = 'Swift';}

if (localStorage.getItem('phpStatus') == 'true'){document.getElementById("php").innerHTML = 'PHP';}

const btn = document.getElementById('btn');

if(btn){
    btn.addEventListener('click',saveCBToLocalstorage);
}
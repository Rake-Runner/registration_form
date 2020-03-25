let hideSIF = function(){
    document.getElementById("signinform").style.display="none";
    document.getElementById("regform").style.display="block";
};
let showSIF = function(){
    document.getElementById("signinform").style.display="block";
    document.getElementById("regform").style.display="none";
};

document.getElementById("regB").addEventListener("click", hideSIF);
document.getElementById("back").addEventListener("click", showSIF);
var dataOk=true;

function testString(str,champ){
    //document.write("intest");
    if (str==null || str=="") return "vide";
    if (str.length==0){
        dataOk=false;
        return "Vous n'avez pas choisi "+champ+"\n";
    }
    if (!isNaN(str) || str.indexOf('/',0)!=-1 || str.indexOf('\\',0)!=-1 || str.indexOf('<',0)!=-1 || str.indexOf('>',0)!=-1 || str.indexOf('^',0)!=-1 || str.indexOf('¨',0)!=-1 || str.indexOf(':',0)!=-1){
        dataOk=false;
        return "N'utilisez que des lettres et/ou des chiffres pour "+champ+" (au moins une lettre)\n";
    }
    return "";
}
function testMail(mail){
    if (mail==null || mail=="" ) return "vide";
    var a = mail.indexOf('@',0);
    if (a<1 || mail.length<6 || a>(mail.length-5) || mail.indexOf('.',0)<(a+2)){
        dataOk=false;
        return "il y a certainement une erreur dans le mail\n";
    }
    return "";
}
function testSelect(){
    CONTROL = document.getElementById("selectart");
    var selec=false;
    for(var i = 0;i < CONTROL.length;i++){
        if (CONTROL.options[i].selected) selec = true;
    }
    if (!selec){
        dataOk=false;
        return "Choisissez au moins un domaine artistique parmi la liste\n";
    }
    else return "";
}
function testCP(cp){
    if (cp.length<5 || isNaN(cp)){
        dataOK=false;
        return "Désignez votre ville par son code postal complet\n";
    }
    else return "";
}
function testPsw(psw,conf){
    if (psw!=conf) {
        dataOk=false;
        return "Le mot de passe et sa confirmation sont différents\n";
    }
    else return testString(psw, "votre mot de passe");
}
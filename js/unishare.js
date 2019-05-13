// Welcome to UNISHARE Base Script
// It used for exemple - You can use it like licence MIT (see LICENCE)
function UNISHARE_Val(elemid){
    return document.getElementById(elemid).value
};
function UNISHAIRE_ExtractInstance(userinstancelabel){
    var InstanceRes = "";
    
    if(userinstancelabel == "" || userinstancelabel == null)
    {
        return  InstanceRes;
    }

    if(userinstancelabel.includes("@"))
    {
        InstanceRes = userinstancelabel.split("@")[1];
    }
    else
    {
        InstanceRes = userinstancelabel;
    }
    return "https://"+InstanceRes;
};
function GAFAM_Share_FB(SHR_Text, SHR_URL){
    var URLDist = "https://www.facebook.com/sharer.php";
    URLDist += "?quote="+encodeURIComponent(SHR_Text);
    URLDist += "&u="+encodeURIComponent(SHR_URL);
    window.location.href =  URLDist;
    return false;
};
function GAFAM_Share_TW(SHR_Text, SHR_URL){
    var URLDist = "http://twitter.com/share";
    URLDist += "?text="+encodeURIComponent(SHR_Text);
    URLDist += "&url="+encodeURIComponent(SHR_URL);
    window.location.href =  URLDist;
    return false;
};

function FEDI_Share_Masto(SHR_Text, SHR_URL, SHR_Instance){
    var URLDist = UNISHAIRE_ExtractInstance(SHR_Instance)+"/share";
    URLDist += "?text="+encodeURIComponent(SHR_Text);
    URLDist += "&url="+encodeURIComponent(SHR_URL);
    if(SHR_Instance != "" && SHR_Instance != null){
        window.location.href =  URLDist;
    }
    return false;

};

function FEDI_Share_Diaspora(SHR_Text, SHR_URL, SHR_Instance){
    var URLDist = UNISHAIRE_ExtractInstance(SHR_Instance)+"/bookmarklet";
    URLDist += "?title="+encodeURIComponent(SHR_Text);
    URLDist += "&url="+encodeURIComponent(SHR_URL);
    if(SHR_Instance != "" && SHR_Instance != null){
        window.location.href =  URLDist;
    }
    return false;
};

function FEDI_Comment_Masto(SHR_URL, SHR_Instance){
    var URLDist = UNISHAIRE_ExtractInstance(SHR_Instance)+"/authorize_interaction";
    URLDist += "?uri="+encodeURIComponent(SHR_URL);
    if(SHR_Instance != "" && SHR_Instance != null && SHR_URL != "" && SHR_Instance!=null){
        window.location.href =  URLDist;
    }

    return false;

};


function createCookie(nom, valeur, jours) {
    if (jours) {
        var date = new Date();
        date.setTime(date.getTime() + (jours*24*60*60*1000));
        var expires = "; expires=" + date.toUTCString();
    }else {
        var expires = "";
    }
    document.cookie = nom + "=" + valeur + ';' + expires + "; path=/";
};

function readCookie(nom) {
    var nomE = nom + "=";
    var cookies = document.cookie.split(';');
    for (var i=0 ; i<cookies.length ; i++) {
        var cookie = cookies[i]
        while (cookie.charAt(0)==' ') {
            cookie = cookie.substring(1,cookie.length);
        }
        if (cookie.indexOf(nomE)==0) {
            return cookie.substring(nomE.length,cookie.length);
        }
    }
    return "";
}

function afficherCookie() {
    var user = readCookie('yourInstance');
    if (user != "") {
      document.getElementById('InstanceUser').value = user;
    }
  } 

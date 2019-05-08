// Welcome to UNISHARE Base Script
// It used for exemple - You can use it like licence MIT (see LICENCE)
function UNISHARE_Val(elemid){
    return document.getElementById(elemid).value
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
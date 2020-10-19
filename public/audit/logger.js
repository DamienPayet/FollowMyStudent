function target(ip, ipinfo, navigateur, date, url) {
    this.ip = ip;
    this.ipinfo = ipinfo;
    this.navigateur = navigateur;
    this.date = date;
    this.url = url;
}

var t = new target();
var tt = 0;

window.addEventListener("DOMContentLoaded", (event) => {
    getip();
});
function getip() {
    $(function () {
        $.getJSON("https://api.ipify.org?format=jsonp&callback=?",
            function (json) {
                t.ip = json.ip;
                getipinfo()
            }
        );
    });
}

function getipinfo() {
    var requestURL = 'http://api.ipstack.com/' + t.ip + '?access_key=6d47e38078a81cc352c560288cf1c38f&format=1';
    var request = new XMLHttpRequest();

    request.open('GET', requestURL);
    request.responseType = 'json';
    request.send();

    request.onload = function () {
        t.ipinfo = request.response;
        getnav();
    }
}

function getnav(){
    t.navigateur = navigator.userAgent;
    geturl();
}
function geturl(){
    t.url = document.location.href;
    godb();
}
function godb(){
    console.log(t);
    $.ajax({
        type:'get',
        url:"/logger",
        data: {
            _token: '{{csrf_token()}}',
            ip : t.ip,
            city: t.ipinfo.city,
            country : t.ipinfo.country_name,
            more : t.ipinfo,
            navigateur:t.navigateur,
            page : t.url
        },
        dataType: 'JSON',
        success:function(response){
            console.log(response);
        },
        error: function(){console.log('Erreur');}
    });
}






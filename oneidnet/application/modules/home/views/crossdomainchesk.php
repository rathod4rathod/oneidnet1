<!--dont delete this page importent-->
<script src="https://oneidnet.com/assets/js/path.js"></script>
<script src="https://oneidnet.com/assets/js/jquery-1.11.2.min.js"></script>

<script>
    var url="https://192.168.0.14/corscheck.php",method="POST";
    function createCORSRequest(method, url){
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr){
        // XHR has 'withCredentials' property only if it supports CORS
        xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined"){ // if IE use XDR
        xhr = new XDomainRequest();
        xhr.open(method, url);
    } else {
        xhr = null;
    }
    return xhr;
}
alert(createCORSRequest(method, url));
$.get(url,{username:"venkatasravani1","insertqur":"insertqur",fullname:"venkatesh",passwordhash:"passwordhash"},function(data){
    alert(data);
});
</script>
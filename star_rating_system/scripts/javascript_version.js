function fOnload() {
    var contentId = 1; //should be the identity id for which rating needs to be updated
    var imgs = document.getElementById('setrating').getElementsByTagName('img');
    for (i = 0; i < imgs.length; i++) {
        imgs[i].addEventListener("mouseover", function(e) { setRating(parseInt(e.target.alt) + 1) }, false)
        imgs[i].addEventListener("click", function(e) { submitRating(contentId, (parseInt(e.target.alt) + 1)) },false)
    }
}
  
function setRating(point)
{
  stars = new Array("R1","R2","R3","R4","R5");
  start = parseInt(point);
  for(i=0;i<5;i++)
  {
	  if(i >= start)document.getElementById(stars[i]).src="images/rate0.png";
	  if(i < parseInt(point))document.getElementById(stars[i]).src="images/rate1.png";
  }
}

function submitRating(id,p) {
    if (p > 0) {
        var url = 'setrating.php';
        document.getElementById('setrating').innerHTML = '<img src="images/progress.gif" alt="Submitting Rating..." align="center">';
        if (typeof XMLHttpRequest == "undefined")
            XMLHttpRequest = function() {
                try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }
                catch (e) { }
                try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }
                catch (e) { }
                throw new Error("This browser does not support XMLHttpRequest.");
            };
            onSuccess = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var r = eval('(' + xmlhttp.responseText + ')');
                    eval(r.s);
                }
            }
            xmlhttp = XMLHttpRequest();
            var params = "id=" + id + "&p=" + p;
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.setRequestHeader("Content-length", params.length);
            xmlhttp.setRequestHeader("Connection", "close");
            xmlhttp.onreadystatechange = onSuccess;
            xmlhttp.send(params);
  }
  else
      alert("Please select your rating and submit!");
}
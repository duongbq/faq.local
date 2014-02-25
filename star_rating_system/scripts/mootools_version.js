window.addEvent('domready', function() {
    var contentId = 1;//should be the identity id for which rating needs to be updated
    $each($$('#setrating img'), function(e, i) {
        $(e).addEvent('mouseover', function() { setRating(i + 1) });
        $(e).addEvent('click', function() { submitRating(contentId, i + 1) });
    });
});
  
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
        $('setrating').set('html', '<img src="images/progress.gif" alt="Submitting Rating..." align="center">');
        var url = 'setrating.php';
        var req = new Request.JSON({
            method: 'post',
            url: url,
            data: { 'id': id, 'p': p },
            onSuccess: function(r) {eval(r.s)},
            onFailure: function() { alert('Our server is tired, Please try after some time.') }
        }).send();
  }
  else
      alert("Please select your rating and submit!");
}
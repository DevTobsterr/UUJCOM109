// THIS SCRIPTS HIDES DIV DEPENDING ON CHECKING IF THE
// USER HAS ACCEPTED TERMS AND POLICIES
$(document).ready(function(){
  
// CREATING VARS FOR EASIER LOGIC
  var cname = "Terms and Conditions"; 
  var cvalue = "Accepted"; 
  var exdays = 30; 
  var terms = getCookie(cname);

  if (terms != "Accepted"|| terms == null || terms == "") {
    console.log("Cookie is not found");
  }
  else {
    console.log("Cookie is found");
    $("#conditions").hide();
  }

  $("#accept").click(function(){
    setCookie(cname, cvalue, exdays);
    $("#conditions").hide();

});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
}
}); 

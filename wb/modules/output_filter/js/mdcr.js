
// $Id$


function mdcr(a,b) {
  location.href=sdcr(a,b);
}

function sdcr(a,f) {
  var b = a.charCodeAt(a.length-1) -97;
  var c=""; var e;
  
  for(var d=a.length-2; d>-1; d--) {
    if(a.charCodeAt(d) < 97) {
      if(a.charCodeAt(d) == 70) { c+=String.fromCharCode(64); }
      if(a.charCodeAt(d) == 90) { c+=String.fromCharCode(46); }
      if(a.charCodeAt(d) == 88) { c+=String.fromCharCode(95); }
      if(a.charCodeAt(d) == 45) { c+=String.fromCharCode(45); }
    } else {
      e=(a.charCodeAt(d) - 97 - b) % 26;
      e+=(e<0 || e>25) ? +26 : 0;
      c+=String.fromCharCode(e+97);
    }
  }
  return "mailto:"+c+f;
}
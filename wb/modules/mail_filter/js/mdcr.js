/*
--------------------------------------------------------------------------------
  MDCR (Mail DeCrypt Routine) for Website Baker v2.6.x
  Licencsed under GNU, written by Christian Sommer (Doc)
--------------------------------------------------------------------------------
*/

function mdcr(s) {
  location.href=dcstr(s);
}

function dcstr(s) {
  var m = unescape(s);
  var x = m.charCodeAt(7)-97;
  var c = m.substr(0,7) + m.substr(8);
  var n=0;
  var r="";

  for(var i=0; i<c.length; i++) {
    r+=String.fromCharCode(c.charCodeAt(i) - x);
  }
  return r;
}
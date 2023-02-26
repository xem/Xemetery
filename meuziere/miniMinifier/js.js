// Reset textarea
document.getElementById("code").value = "// Remove comments \n  /* one-line comment */\n\n     /* This \n     is \n     a \n     multiline \n     comment */\n\n var test0;  // inline comment\n\n// Remove spaces around [ ] and =\nvar test1 = [ ];\n\n// Remove spaces around ( )\nvar test2 = ( 2 + 2 );\n\n// Remove spaces around { }\nvar test3 = { };\n\n// Remove spaces around , ;\nvar test4 , test4bis ;\n\n// Remove spaces around .\nvar test5 = Math . round( 5.5 );\n\n// Remove spaces around  ? :\nvar test6 = true ? false : true;\n\n// Remove spaces around < >\nvar test7 = ( 1 > 0 && 0 < 1);\n\n// Remove spaces around + - * / %\nvar test8 = ((((1 * 2) / 3) + 4) - 5) % 6;\n\n// Remove spaces around & |\nvar test9 = (0xFF & 0x33) | 0xdd;\n\n// Remove spaces around ~\nvar test10 = ~ 1.5;\n\n// Remove spaces around !\nvar test11 = ! false;\n\n// Remove final ; and ; before } \n var test12 = function(){var r = 1; return r;};\n\n// Gather the consecutive variables declarations that are in the same scope\n var test13; var test13bis = function(){ console.log('outer'); var r = 1; return function(){ console.log('inner'); var r2; var r3; console.log('inner 2'); var r4 = 4; return r4; };";

// Handle click on "Minify!"
document.getElementById("minify").addEventListener("click", function(){
  var code = document.getElementById("code").value;
  var size = code.length;
  code = minify(code);
  document.getElementById("code").value = code;
  var size2 = code.length;
  alert("Before: " + size + "Bytes. After: " + size2 + "Bytes. Saved: " + ((100 - Math.round(size2 / size * 100)) || 0) + "%.");
})

function minify(c){
  return c.replace(/(\/\*[^]*?\*\/|\/\/.*|\s)+/gm,' ')
          .replace(/^ |;? ?$|; *(})| *([\[\]\(\)\{\};,.=?:<>+\-*\/%&|~!]) */g,'$1$2')
          .replace(/(var [^{(=.;]*?);var /g, "$1,")
          .replace(/(var [^{(=.;]*?);var /g, "$1,")
          .replace(/(var [^{(=.;]*?);var /g, "$1,")
          .replace(/(var [^{(=.;]*?);var /g, "$1,")
}
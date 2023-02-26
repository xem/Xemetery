var c1 = CodeMirror.fromTextArea(document.getElementById("code1"), {readOnly: 'nocursor'});
var c2 = CodeMirror.fromTextArea(document.getElementById("code2"));
var c3 = CodeMirror.fromTextArea(document.getElementById("code3"), {readOnly: 'nocursor'});

eval(c1.getValue());
eval(c2.getValue());
eval(c3.getValue());

document.getElementById("code").onkeyup = function(){try {eval(c2.getValue())} catch(e){}};
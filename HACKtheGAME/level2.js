var c1 = CodeMirror.fromTextArea(document.getElementById("code1"), {readOnly: 'nocursor'});
var c2 = CodeMirror.fromTextArea(document.getElementById("code2"));
var background = document.getElementById("background").getContext("2d");
background.fillStyle = "#afa";
background.fillRect (270, 270, 40, 330);
try{
  eval(c1.getValue() + c2.getValue());
}
catch(e){
  console.log(e);
}
document.getElementById("code").onkeyup = function(){
  if(hero.y > 600){
    hero.y = 275;
    gravity = function(){};
  }
  try{
    gravity = function(){}
    eval(c1.getValue() + c2.getValue());
  }
  catch(e){
    console.log(e);
  }
};
var steps = 0;
var orig_drawImage = CanvasRenderingContext2D.prototype.drawImage;
CanvasRenderingContext2D.prototype.drawImage = function(a,x,y,u,v){
  orig_drawImage.apply(this, arguments);
  if(x == 275 && y > 275){
    steps++;
    if(y == 595 && steps == 127){
      alert("well done! next level!");
      window.location = "level3.html";
    }
  }
};

// answer: function gravity(){hero.y += g} */
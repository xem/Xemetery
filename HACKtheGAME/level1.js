var c1 = CodeMirror.fromTextArea(document.getElementById("code1"), {readOnly: 'nocursor'});
var c2 = CodeMirror.fromTextArea(document.getElementById("code2"));
var background = document.getElementById("background").getContext("2d");
background.fillStyle = "#afa";
background.fillRect (270, 270, 40, 40);
var heroes = 0;
try {
  heroes = 0;
  eval(c1.getValue() + c2.getValue());
}
catch(e){
  console.log(e)
}
document.getElementById("code").onkeyup = function(){
  ctx.clearRect(0,0,500,500);
  heroes = 0;
  try {
    eval(c1.getValue() + c2.getValue());
  }
  catch(e){
    console.log(e)
  }
};
var alert1 = false;
var alert2 = false;
var orig_drawImage = CanvasRenderingContext2D.prototype.drawImage;
CanvasRenderingContext2D.prototype.drawImage = function(a,x,y,u,v){
  orig_drawImage.apply(this, arguments);
  if(a.src == hero.idle.src){
    heroes++;
    if(heroes > 1 && !alert2){
      alert("Hey! One hero is enough!");
      alert2 = true;
    }
    if(x == 300 && y == 300 && !alert1 && !alert2){
      alert("Nice try! But it's not really centered!");
      alert1 = true;
    }
    if(x == 275 && y == 275 && heroes == 1){
      alert("Bravo! Let's go to the second level!");
      window.location = "level2.html";
    }
  }
};

// answer: function draw(){ctx.drawImage(hero.idle, 275, 275);}
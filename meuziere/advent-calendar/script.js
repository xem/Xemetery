//angle.value = 0;
threefaces = [];
sixfaces = [];
transformbackup = [];
hoveredcubes = [];
has6faces = [];
lasthoveredcube = -1;
//currentday = 25;
mouseovers = [];

// Init cubes

initcube = function(i, j){

  // Color
  hue = Math.random() * 360;
  
  // Transform
  transformbackup[j*7+i] = 'translateX('+(-200 + (i - 2) * 165) + 'px) translateY(' + (0 + (j - 2) * 165) + 'px) translateZ(-150px)';
  
  // innerHTML for 3 faces
  threefaces[j*7+i] =
  
  (i>2? '<div class="face left"></div>':'<div class="face right"></div>')+' '+(j>2?'<div class="face top"></div>':'<div class="face bottom"></div>')+'<div class="face front"></div>';
    
  
  // innerHTML for 6 faces
  sixfaces[j*7+i] = 
  
  '<div class="face back"></div> <div class="face left"></div> <div class="face right"></div> <div class="face top"></div> <div class="face bottom"></div> <div class="face front"></div>';
  
  // Mouseovers
  mouseovers[j*7+i] = 'event.stopPropagation();cubeover(this,' + i + ', ' + j + ', ' + hue + ')';
  
  // HTML
  scene.innerHTML +=
  
  '<div class="cube' + (((j*7+i) >= (currentday + 3)) ? " disabled" : "") + '" style="transform: ' + transformbackup[j*7+i] + '" onmouseover="' + mouseovers[j*7+i] + '" onclick="cubeclick(' + (j*7+i) + ')" id="cube' + (j*7+i) + '">' + threefaces[j*7+i] + '</div>';
  
  // Hovered cubes
  hoveredcubes[j*7+i] = 0;
  
  // Has 6 faces?
  has6faces[j*7+i] = 0;

}

for(i = 0; i < 3; i++) {
  for(j = 0; j < 4; j++) {
  
    if(!(j==0 && i < 3))
      initcube(i,j);
    
  }
}

for(i = 6; i >= 3; i--) {
  for(j = 0; j < 4; j++) {
  
    if(!(j == 3 && i == 6))
      initcube(i,j);
    
  }
}

cubeover = function(cube, i, j, hue){
  
  hoveredcubes[j*7+i] = 100;
  lasthoveredcube = j*7+i;
  if(!has6faces[j*7+i] && (j*7+i) < (currentday + 3)){
    cube.innerHTML = sixfaces[j*7+i];
    has6faces[j*7+i] = 1;
    rotation = 
    [
      " rotateY(-179deg) translateX(-130px)",
      " rotateY(179deg) translateX(-130px)",
      " rotateX(-179deg) translateY(-130px)",
      " rotateX(179deg) translateY(-130px)"
    ][~~(Math.random() * 4)];
    cube.style.transform = transformbackup[j*7+i] + rotation;
  }
}

clicked = 0;
cubeclick = function(n){

  if(n < (currentday + 3)){
  
    httpRequest = new XMLHttpRequest();
    httpRequest.open('GET', '/?day=' + (n-2) + '&action=box_click', true);
    httpRequest.send();
  
  
    clicked = 1;
    for(z in sixfaces){
      setTimeout('window["cube" + ' + z + '].style.transform = "translateX(0) translateY(0) translateZ(-1000px) rotateZ(' + (Math.random() < 0.5 ? -179 : 179) + 'deg) scaleX(.01) scaleY(.01)"', Math.random() * 250);
    }
    
    billboard.style.transform = "translateX(0) translateY(0) translateZ(-1000px) scaleX(0.01) scaleY(0.01)"

    window["popin" + (n-2)].className = "popin visible";
    window["popin" + (n-2)].scrollTop = 0;
    popinclose.className = "visible";
    
    wrapper.style.height = (parseInt(window.getComputedStyle(window["popin" + (n-2)]).getPropertyValue("height")) + 700) + "px";
    
    document.documentElement.scrollTop = document.body.scrollTop = 0;
  }
}

popincloseclick = function(n){
  clicked = 0;
  for(z in sixfaces){
    setTimeout('window["cube' + z + '"].style.transform = transformbackup[' + z + ']', Math.random() * 250);
  }
  popinclose.className = "";
  popins = document.querySelectorAll(".popin");
  for(z in popins){
    popins[z].className = "popin";
  }
  
  billboard.style.transform = "";
  wrapper.style.height = "";
  
  document.documentElement.scrollTop = document.body.scrollTop = 430;
}

// Snow near
snow1x = 0;
snow1y = -420;

// Snow far
snow2x = 0;
snow2y = -420;

time = 0;

snowandreset = function(){

  // Snow fall
  time++;
  
  if(snow1y >= -380) snow1y = -795;
  snow1y += 1;
  snow1.style.top = snow1y + "px";
  
  if(snow2y >= -380) snow2y = -690;
  snow2y += .5;
  snow2.style.top = snow2y + "px";
  
  for(z in hoveredcubes){
    if(hoveredcubes[z] > 0 && lasthoveredcube != z){
      hoveredcubes[z]--;
    }
    
    if(hoveredcubes[z] == 95 && lasthoveredcube != z && !clicked){
      window["cube" + z].style.transform = transformbackup[z];
    }
    if(hoveredcubes[z] == 60 && lasthoveredcube != z && !clicked){
      window["cube" + z].innerHTML = threefaces[z];
      has6faces[z] = 0;
    }
  }
  
  requestAnimationFrame(snowandreset);
};

snowandreset();


quizclick = function(li, correct, wrong, tick){
  
  for(i in ticks = document.querySelectorAll(".tick")){
    ticks[i].className = "tick";
  }
  
  tick.className = "tick active";
  
  if(li.className == "correct"){
    correct.style.opacity = "1";
    wrong.style.opacity = "0";
  }
  else if(li.className == "wrong"){
    correct.style.opacity = "0";
    wrong.style.opacity = "1";
  }
}

carousel_left = function(c){
  left = parseInt(c.style.left);
  width = parseInt(c.style.width);
  
  if(left < 280) {
    c.style.left = 0;
  }
  else {
    c.style.left = (left + 280) + "px";
  }
}

carousel_right = function(c){
  left = parseInt(c.style.left);
  width = parseInt(c.style.width);
  
  if(left < -width +900) {
    c.style.left = 0;
  }
  else{
    c.style.left = (left - 280) + "px";
  }
}

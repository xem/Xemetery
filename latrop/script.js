// Common
x = c.getContext("2d");

colors = [ "white", "grey", "black", "yellow", "blue", "orange", , , , "red" ];

solid = [0, 1, 1, 0, 0, 0, , , , ];
portalable = [0, 1, 0, 0, 0, 0, , , , ];

keys = [];

map = [
  1,1,1,1,1,1,1,1,1,1,
  1,0,0,0,0,0,0,0,0,1,
  1,0,0,0,0,0,0,0,0,1,
  1,0,0,0,0,3,0,0,0,1,
  1,0,0,0,2,2,2,0,0,1,
  1,0,0,0,0,0,0,0,0,1,
  1,0,0,0,0,0,9,0,0,1,
  1,0,0,0,0,0,0,0,0,1,
  1,0,0,0,0,0,0,0,0,1,
  1,1,1,1,1,1,1,1,1,1,
];

hero = {
  
  // Position
  x: 0,
  y: 0,
  
  // Size
  w: 20,
  h: 20,
  
  // Vertical speed (jump/fall)
  vy: 0,
  
  // Speed
  xs: 0,
  ys: 0,
  
  // Gravity
  g: 5,
  
  // Gravity direction
  gd: "bottom",
  
  // Falling
  f: 1
}


mouse = {
  x: 0,
  y: 0
}

blue = {
  x: 0,
  y: 0,
  index: -1,
  orientation: "top"
}

orange = {
  x: 0,
  y: 0,
  index: -1,
  orientation: "top"
}

alt1 = function(){  
  for(i = 0; i < 10; i++){
    for(j = 0; j < 10; j++){
      x.fillStyle = colors[map[j * 10 + i]];
      x.fillRect(100 + i * 20, 100 + j * 20, 20, 20);
      if(map[j * 10 + i] == 9){
        hero.x = 100 + i * 20;
        hero.y = 100 + j * 20;
        map[j * 10 + i] = 0;
      }
    }
  }
  
};

setInterval(function(){
  
  // Reset canvas
  c.width = c.width;
  
  // Fall
  hero.f = 1;
  hero.vy += hero.g;
  if(hero.vy > 15){
    hero.vy = 15;
  }  
  if(hero.gd == "bottom") hero.y += hero.vy;
  if(hero.gd == "top") hero.y -= hero.vy;
  if(hero.gd == "right") hero.x += hero.vy;
  if(hero.gd == "left") hero.x -= hero.vy;
  
  if(hero.gd == "bottom"){
    
    // Stop falling if bottom-left or bottom-right of hero box is in a solid
    // Go through a portal under the hero
    tx1 = hero.x;
    tx1 = Math.floor((tx1 - 100) / 20);
    
    ty1 = hero.y + hero.h;
    ty1 = Math.floor((ty1 - 100) / 20);
    
    if(solid[map[ty1 * 10 + tx1]]){
      hero.y = 100 + (ty1 - 1) * 20;
      hero.f = 0;
    }
    
    
    tx2 = hero.x + hero.w - 1;
    tx2 = Math.floor((tx2 - 100) / 20);
    
    ty2 = hero.y + hero.h;
    ty2 = Math.floor((ty2 - 100) / 20);
    
    if(solid[map[ty2 * 10 + tx2]]){
      hero.y = 100 + (ty2 - 1) * 20;
      hero.f = 0;
    }
    
    // Blue
    if(map[ty1 * 10 + tx1] == 4 || map[ty2 * 10 + tx2] == 4){
      hero.x = orange.x;
      hero.y = orange.y;
      if(orange.orientation == "bottom") hero.gd= "right";
      if(orange.orientation == "left") hero.gd = "top";
      if(orange.orientation == "top") hero.gd = "left";
      if(orange.orientation == "right") hero.gd = "bottom";
    }
    
    // Orange
    if(map[ty1 * 10 + tx1] == 5){
      hero.x = blue.x;
      hero.y = blue.y;
      if(blue.orientation == "bottom") hero.gd = "right";
      if(blue.orientation == "left") hero.gd = "top";
      if(blue.orientation == "top") hero.gd = "left";
      if(blue.orientation == "right") hero.gd = "bottom";
    }
  }
  
  
  // Draw scene
  for(i = 0; i < 10; i++){
    for(j = 0; j < 10; j++){
      x.fillStyle = colors[map[j * 10 + i]];
      x.fillRect(100 + i * 20, 100 + j * 20, 20, 20);
    }
  }
  
  // Jump
  if(keys[1] && !hero.f){
    hero.vy = -20;
  }
  
  // Gravity bottom / Go left
  // Gravity top / Go right
  // Gravity left / Go top
  // Gravity right / Go bottom
  if(keys[0]){
    
    if(hero.gd == "bottom"){
      hero.x -= 5;

      tx1 = hero.x;
      tx1 = Math.floor((tx1 - 100) / 20);
      
      ty1 = hero.y;
      ty1 = Math.floor((ty1 - 100) / 20);
      
      if(solid[map[ty1 * 10 + tx1]]){
        hero.x = 100 + (tx1 + 1) * 20;
      }
      
      tx2 = hero.x;
      tx2 = Math.floor((tx2 - 100) / 20);
      
      ty2 = hero.y + hero.h - 1;
      ty2 = Math.floor((ty2 - 100) / 20);
      
      if(solid[map[ty2 * 10 + tx2]]){
        hero.x = 100 + (tx2 + 1) * 20;
      }
    }
  }
  
  // Go right
  if(keys[2]){
    if(hero.gd == "bottom"){
      hero.x += 5;
    
      tx1 = hero.x + hero.w - 1;
      tx1 = Math.floor((tx1 - 100) / 20);
      
      ty1 = hero.y;
      ty1 = Math.floor((ty1 - 100) / 20);
      
      if(solid[map[ty1 * 10 + tx1]]){
        hero.x = 100 + (tx1 - 1) * 20;
      }
      
      // Blue portal
      if(map[ty1 * 10 + tx1] == 4){
        hero.x = orange.x;
        hero.y = orange.y;
        if(orange.orientation == "bottom") hero.gd= "right";
        if(orange.orientation == "left") hero.gd = "top";
        if(orange.orientation == "top") hero.gd = "left";
        if(orange.orientation == "right") hero.gd = "bottom";
      }
      
      // Orange portal
      if(map[ty1 * 10 + tx1] == 5){
        hero.x = blue.x;
        hero.y = blue.y;
        if(blue.orientation == "bottom") hero.gd = "right";
        if(blue.orientation == "left") hero.gd = "top";
        if(blue.orientation == "top") hero.gd = "left";
        if(blue.orientation == "right") hero.gd = "bottom";
      }
      
      tx2 = hero.x + hero.w - 1;
      tx2 = Math.floor((tx2 - 100) / 20);
      
      ty2 = hero.y + hero.h - 1;
      ty2 = Math.floor((ty2 - 100) / 20);
      
      if(solid[map[ty2 * 10 + tx2]]){
        hero.x = 100 + (tx2 - 1) * 20;
      }
    }
  }
  
  // Draw hero
  x.fillStyle = colors[9];
  x.fillRect(hero.x, hero.y, 20, 20);
  
  // Draw ray
  x.beginPath();
  x.moveTo(hero.x + hero.w / 2, hero.y + hero.h / 2);
  x.lineTo(mouse.x, mouse.y);
  x.stroke();
  
}, 30);


onkeydown = onkeyup = function(e){
  keys[e.keyCode - 37] = e.type[5];
  if([37,38,39,40].indexOf(e.keyCode) != -1){
    e.preventDefault();
  }
}

onmousemove = function(e){
  mouse.x = e.pageX;
  mouse.y = e.pageY;
}

onclick = function(e){
  if(e.which == 1){
    map[map.indexOf(4)] = 1;
    tx = Math.floor((mouse.x - 100) / 20);
    ty = Math.floor((mouse.y - 100) / 20);
    if(portalable[map[ty * 10 + tx]]){
      map[blue.index = ty * 10 + tx] = 4;
      blue.x = 100 + tx * 20;
      blue.y = 100 + ty * 20;
      if(tx == hero.x){
        if(ty < hero.y){
          blue.orientation = "bottom";
        }
        else {
          blue.orientation = "top";
        }
      }
      else if(tx < hero.x){
        blue.orientation = "right";
      }
      else if(tx > hero.x){
        blue.orientation = "left";
      }
    }
  }
}

oncontextmenu = function(e){
  map[map.indexOf(5)] = 1;
  tx = Math.floor((mouse.x - 100) / 20);
  ty = Math.floor((mouse.y - 100) / 20);
  if(portalable[map[ty * 10 + tx]]){
    map[orange.index = ty * 10 + tx] = 5;
    orange.x = 100 + tx * 20;
    orange.y = 100 + ty * 20;
    if(tx == hero.x){
      if(ty < hero.y){
        orange.orientation = "bottom";
      }
      else {
        orange.orientation = "top";
      }
    }
    else if(tx < hero.x){
      orange.orientation = "right";
    }
    else if(tx > hero.x){
      orange.orientation = "left";
    }
  }
  e.preventDefault();
}
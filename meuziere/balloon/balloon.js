// Balloon
balloon = {
  
  // Balloon angle
  ang: 0,

  // Balloon position on the map
  xm: 0,
  ym: 0,

  // Balloon position on the canvas
  xc: 500,
  yc: 500,

  // Grab bar
  grabbed: 0,
  grab_pos: 0,
}

// Draw balloon and detect clicks on the bar
draw_balloon = function(x, y, ang){
  c.save();
    
    c.translate(balloon.xc, balloon.yc);
    c.rotate(balloon.ang);
    
    // Rope's click area
    c.beginPath();
      c.moveTo(-20, 100);
      c.lineTo(20, 100);
      c.lineTo(20, 300);
      c.lineTo(-20, 300);
      c.fillStyle = "#def";
      c.fill();
      if(!balloon.grabbed && mousedown && c.isPointInPath(down_x, down_y)){
        balloon.grabbed = true;
        balloon.grab_pos = down_y - 500;
      }
    c.closePath();
    
    // black line
    c.beginPath();
      c.moveTo(0, 0);
      c.lineTo(0, 300);
      c.strokeStyle = "#000";
      c.lineWidth = 3;
      c.stroke();
    c.closePath();
    
    // Balloon
    c.beginPath();
      c.arc(0, 0, 100, 0, 7);
      c.fillStyle = "rgba(255, 0, 0, 1)";
      c.fill();
    c.closePath();
    
    // Triangle
    c.beginPath();
      c.moveTo(0, 100);
      c.lineTo(10, 110);
      c.lineTo(-10, 110);
      c.fillStyle = "rgba(255, 0, 0, 1)";
      c.fill();
    c.closePath();
    
    // Mouth
    c.beginPath();
      c.moveTo(-30, 30);
      c.lineTo(30, 30);
      c.arc(0, 30, 30, 0, -3);
      c.fillStyle = "#C00";
      c.fill();
    c.closePath();
    c.beginPath();
      c.moveTo(-30, 30);
      c.lineTo(30, 30);
      c.lineTo(30, 35);
      c.lineTo(-30, 35);
      c.fillStyle = "#fff";
      c.fill();
    c.closePath();
    
    // Eyes
    c.beginPath();
      c.arc(-20, -20, 10, 0, 7);
      c.arc(20, -20, 10, 0, 7);
      c.fillStyle = "#fff";
      c.fill();
    c.closePath();
    
    c.beginPath();
      c.arc(-15, -20, 5, 0, 7);
      c.arc(25, -20, 5, 0, 7);
      c.fillStyle = "#000";
      c.fill();
    c.closePath();
  
  c.restore();
}
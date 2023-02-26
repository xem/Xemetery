// Start / game loop
onload = e => {
  onresize();
  setInterval(e => {

    a.width ^= 0;
  
    if(balloon.grabbed){
      //balloon.xc = 500; //move_x;
      //balloon.yc = 500; //move_y - balloon.grab_pos;
      balloon.ang = -Math.atan2(move_x - 500, move_y - 500);
      balloon.ang_speed = 0;
      balloon.ang_acceleration = 0.005;
      balloon.xm -= (move_x - 500) / 50;
      balloon.ym -= (move_y - 500) / 50;
    }
    
    else {
      balloon.ym++;
      
      if(balloon.ang > 0){
        balloon.ang_speed -= balloon.ang_acceleration;
        balloon.ang += balloon.ang_speed;
      }
      if(balloon.ang < 0){
        balloon.ang_speed += balloon.ang_acceleration;
        balloon.ang += balloon.ang_speed;
      }
      if(Math.abs(balloon.ang_speed) < 0.008 && Math.abs(balloon.ang) < 0.008){
        balloon.ang_speed = 0;
        balloon.ang = 0;
      }
      else if(Math.abs(balloon.ang_speed) < 0.1 && Math.abs(balloon.ang) < 0.1){
        balloon.ang_speed *= 0.9;
      }
      else {
        balloon.ang_speed *=  0.991;
      }
    }
    
    // Update position
    a.style.backgroundPosition = `${balloon.xm}px ${balloon.ym}px`;
    
    draw_balloon(balloon.xc, balloon.yc, 0);
    
    console.log(balloon.ang, balloon.ang_speed);
    
    t.innerHTML = `click_x ${click_x}
click_y ${click_y}
down_x ${down_x}
down_y ${down_y}
move_x ${move_x}
move_y ${move_y}`;
    
  }, 33);
}
// Draw current screen (on load, when draw_screen is called, and when the hash changes)
var draw_screen = onload = onhashchange = () => {
  
  // Reset canvas
  a.width ^= 0;
  
  // Global text settings
  c.font = "bold 30px arial";
  c.textAlign = "center";
  
  // Init local storage to 1 if it's not already set
  localStorage["scpm_level"] |= 2;

  // If a hash is set, play the level directly
  if(location.hash){
    leveldata = location.hash.slice(1);
    screen = 2;
    draw_screen();
  }
  
  // Main menu
  // =========

  if(screen == 0){
  
    // Pixelize graphics
    c.mozImageSmoothingEnabled = false;
    c.imageSmoothingEnabled = false;
 
    // Show title
    c.drawImage(tileset, 512, 0, 70, 16, 120, 150, 280, 64);
    c.drawImage(tileset, 583, 0, 270, 16, 120, 250, 1080, 64);

    // Draw buttons
    c.fillStyle = "#000";
    c.beginPath();
    c.fillRect(500, 400, 100, 80);
    c.fillRect(650, 400, 100, 80);
    c.fillStyle = "#fff";
    c.fillText("MAKE", 700, 450);
    c.fillText("PLAY", 550, 450);
    c.stroke();
    c.closePath();
  }
  
  // Level selection menu
  // ====================
  
  if(screen == 1){
    
    c.beginPath();
    c.fillStyle = "#000";
    c.fillRect(590, 520, 100, 80);
    
    for(i = 0; i < 10; i++){
      for(j = 0; j < 3; j++){
        number = j * 10 + i + 1;
        c.fillStyle = "#000";
        c.fillRect(i * 120 + 50, j * 100 + 120, 100, 80);
        c.fillStyle = "#fff";
        c.fillText(+localStorage["scpm_level"] >= number ? number : "?", i * 120 + 100, j * 100 + 170);
      }
    }
    c.fillText("LEVELS", 640, 70);
    c.fillText("MORE LEVELS ONLINE", 640, 470);
    c.fillText("GO", 640, 570);
    c.fillText("◀", 40, 70);
    c.stroke();
    c.closePath();
  }
  
  // Playing
  // =======
  
  if(screen == 2){
    
    if(loop){
      clearInterval(loop);
    }
    loop = setInterval(play, 33);
    
    //play();
  }
  
  // Level editor
  // ============
  
  if(screen == 3){
    
    // Pixelize graphics
    c.mozImageSmoothingEnabled = false;
    c.imageSmoothingEnabled = false;
    
    c.strokeStyle = "#777";
    c.lineWidth = 1;
    
    // White BG (all screen)
    c.fillStyle = "#fff";
    c.fillRect(0, 0, 1280, 648);
    
    // Blue BG (tileset, grid)
    c.fillStyle = "#5C94FC";
    c.fillRect(0, 40, 1280, 640);
    
    c.beginPath();
    
    // Tileset
    for(i = 0; i < 16; i++){
      c.fillRect(8 + i * 35, 3, 32, 32);      
      c.rect(8 + i * 35, 3, 32, 32);
      draw_sprite(i, 8 + i * 35, 3);
    }
    
    // Tiles on grid
    for(j = 0; j < level_data.tiles.length; j++){
      for(i = 0; i < level_data.tiles[j].length; i++){
        drawn_tile = level_data.tiles[j][i];
        draw_tile(drawn_tile, i, j);
        
        // Special cases
        
        // Tile #2: draw flag pole
        if(drawn_tile == 2){
          end_pole = false;
          if(j < 20){
            for(k = j + 1; k < 20; k++){
              if(!level_data.tiles[k][i] && !end_pole){
                draw_tile(24, i, k);
              }
              else{
                end_pole = true;
              }
            }
          }
        }
      }
    }
    
    // Pipes
    for(i in level_data.pipes){
      
      pipe_low = level_data.pipes[i][1];
      
      // If the two positions of the pipe were placed
      if(level_data.pipes[i][2]){
        
        // Pipe body between low ang high (we save it in the map to avoid overwrite)
        pipe_high = level_data.pipes[i][1] < level_data.pipes[i][2] ? level_data.pipes[i][1] : level_data.pipes[i][2];
        pipe_low = level_data.pipes[i][1] < level_data.pipes[i][2] ? level_data.pipes[i][2] : level_data.pipes[i][1];
        for(k = pipe_high + 1; k < pipe_low; k++){
          draw_tile(18, level_data.pipes[i][0], k);
          draw_tile(19, level_data.pipes[i][0] + 1, k);
          level_data.tiles[k][level_data.pipes[i][0]] = 18;
          level_data.tiles[k][level_data.pipes[i][0] + 1] = 19;
        }
      }
      
      // If the first position of the pipe was placed
      if(level_data.pipes[i][1]){
        
        // Pipe body below low position (can be overwritten)
        end_pipe = false;
        for(k = pipe_low + 1; k < 21; k++){
          if(k < 20 && !level_data.tiles[k][level_data.pipes[i][0]] && !level_data.tiles[k][level_data.pipes[i][0] + 1] && !end_pipe){
            draw_tile(18, level_data.pipes[i][0], k);
            draw_tile(19, level_data.pipes[i][0] + 1, k);
          }
          else{
            end_pipe = true;
          }
        }
      }
      
      // Pipe position 1
      if(level_data.pipes[i][1]){
        draw_tile(16, level_data.pipes[i][0], level_data.pipes[i][1]);
        draw_tile(17, level_data.pipes[i][0] + 1, level_data.pipes[i][1]);
      }
      
      // Pipe position 2
      if(level_data.pipes[i][2]){
        draw_tile(16, level_data.pipes[i][0], level_data.pipes[i][2]);
        draw_tile(17, level_data.pipes[i][0] + 1, level_data.pipes[i][2]);
      }
      
      // Switch
      if(level_data.pipes[i][4]){
        draw_tile(20, level_data.pipes[i][3], level_data.pipes[i][4]);
      }
    }
    
    // Show the tile being placed:
    
    if(mouse_tile_y >= 0 && !rightclick){
      
      // Special cases:
      // Tile #1: time machine
      if(current_editor_tile == 1){
        if(mouse_tile_y > 0){
          draw_tile(22, mouse_tile_x, mouse_tile_y - 1);
          draw_tile(23, mouse_tile_x, mouse_tile_y);
        }
      }
      
      // Tile #14: pipe
      else if(current_editor_tile == 14){
        if(pipe_click == 0){
          draw_tile(16, mouse_tile_x, mouse_tile_y);
          draw_tile(17, mouse_tile_x + 1, mouse_tile_y);
        }
        if(pipe_click == 1){
          draw_tile(16, level_data.pipes[current_pipe][0], mouse_tile_y);
          draw_tile(17, level_data.pipes[current_pipe][0] + 1, mouse_tile_y);
        }
        if(pipe_click == 2){
          draw_tile(20, mouse_tile_x, mouse_tile_y);
        }
      }
      
      // Tile #15: balance
      else if(current_editor_tile == 15){
        draw_tile(15, mouse_tile_x - 1, mouse_tile_y);
        draw_tile(15, mouse_tile_x, mouse_tile_y);
        draw_tile(15, mouse_tile_x + 1, mouse_tile_y);
      }
      
      // Normal case:
      else {
        draw_tile(current_editor_tile, mouse_tile_x, mouse_tile_y);
      }
    }
    
    // Grid
    for(i = 0; i < 40; i++){
      c.moveTo(i * 32, 40);
      c.lineTo(i * 32, 648);
    }
    for(j = 0; j < 20; j++){
      c.moveTo(0, 40 + j * 32);
      c.lineTo(1280, 40 + j * 32);
    }
    
    // Buttons
    c.fillStyle = "#000";
    c.fillRect(750, 4, 100, 32);
    c.fillRect(875, 4, 100, 32);
    c.fillRect(1000, 4, 100, 32);
    c.fillRect(1125, 4, 100, 32);
    c.fillStyle = "#fff";
    c.font = "bold 20px arial";
    c.fillText("TEST", 800, 28);
    c.fillText("SHARE", 925, 28);
    c.fillText("CLEAR", 1050, 28);
    c.fillText("EXIT", 1175, 28);
    c.stroke();
    
    c.closePath();
    
    // Current tile on the tileset
    c.beginPath();
    i = current_editor_tile;
    c.strokeStyle = "red";
    c.lineWidth = 3;
    c.rect(8 + i * 35, 3.5, 32, 32);
    c.stroke();
    c.closePath();
  }
}

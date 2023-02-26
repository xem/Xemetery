// Mouse/touch inputs
update_mouse = e => {
  return [
    ~~(((e.pageX || e.changedTouches[0].pageX) - canvas_left) * 1000 / canvas_size),
    ~~(((e.pageY || e.changedTouches[0].pageY) - canvas_top) * 1000 / canvas_size)
  ];
}

// Click
onclick = e => {
  [click_x, click_y] = update_mouse(e);
};

// Down
onmousedown = ontouchstart = e => {
  mousedown = 1;
  [down_x, down_y] = update_mouse(e);
  [move_x, move_y] = update_mouse(e);
};

// Move
onmousemove = ontouchmove = e => {
  [move_x, move_y] = update_mouse(e);
};

// Up
onmouseup = ontouchend = e => {
  mousedown = 0;
  grabbed = 0;
  [up_x, up_y] = update_mouse(e);
  balloon.grabbed = 0;
};
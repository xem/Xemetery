// Resize/rotate
onresize = onrotate = b => {
  b = a.getBoundingClientRect();
  canvas_size = b.width;
  canvas_left = b.left;
  canvas_top = b.top;
};
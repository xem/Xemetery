// Mini Knob
// The code is generic but the design is specific to Qwant Music's Flux player.
// @param container: container's id
// @param value: initial value from 0 to 1 (0 by default; the colored arc will start from here)
// @param size: 0 = small (54x54px) / 1 = big (142x142px)
// @param color: arc's color (replaced by a rainbow if the knob is big).
// @param callback: function called after every change
var MiniKnob = class MiniKnob {
  
  constructor(container, value, size, color, callback){
  
    // Params
    this.container = container;
    this.value = value;
    this.size = size ? 142 : 54;
    this.color = color;
    this.callback = callback || function(){};
    
    // Variables
    this.container_el = document.querySelector("#" + this.container);
    this.center = {x: this.container_el.offsetLeft + this.size / 2, y: this.container_el.offsetTop + this.size / 2 };
    this.clicked = 0;
    this.initial_angle = this.value * 5.2 + Math.PI / 2 + 0.55;
    this.white_line_begin = size ? 34 : 14;
    this.white_line_end = size ? 45 : 20;
    this.arc_radius = size ? 50 : 22;
    this.arc_width = size ? 10 : 6;
    
    // Init
    var it = this;
    
    // Canvas
    this.container_el.innerHTML = "<canvas id='canvas_" + this.container + "' width='" + this.size + "' height='" + this.size + "'></canvas>";
    this.canvas = document.querySelector("#canvas_" + this.container);
    this.ctx = this.canvas.getContext("2d");
    
    // Mouse controls
    this.container_el.onmousedown =
    this.container_el.ontouchstart = 
    function(e){
      MiniKnob.currentKnob = it;
      e.preventDefault();
    }
  
    // Draw
    // Draws the knob at the right position (0 = bottom left / 0.5 = top / 1 = bottom right)
    this.draw = function(value){
      it.callback(value);
      it.ctx.clearRect(0, 0, it.size, it.size);
      
      // Transform value into valid angle (in radians)
      //
      //       ->  4 --> 5 --    
      //     /                \  
      //    |                  v 
      //                         
      //    3                  6 
      //                         
      //    ^                   |  
      //     \                 /   
      //      -   2      7   <-
      
      var angle = value * 5.2 + Math.PI / 2 + 0.55;
      var arc_start = Math.min(it.initial_angle, angle);
      var arc_end = Math.max(it.initial_angle, angle);
      
      // Arc
      if(it.size == 142){
        var context = it.ctx;

        it.ctx.save();
        it.ctx.beginPath();
        it.ctx.fillStyle = "red";
        it.ctx.arc(70, 70, 100, arc_start, arc_end);
        it.ctx.lineTo(it.size / 2, it.size / 2);;
        context.clip();
        context.drawImage(MiniKnob.rainbow, 0, 0, 142, 142);
        it.ctx.restore();
      }
      else {
        it.ctx.beginPath();
        it.ctx.strokeStyle = it.color;
        it.ctx.lineWidth = it.arc_width;
        it.ctx.arc(it.size / 2, it.size / 2, it.arc_radius, arc_start, arc_end);
        it.ctx.stroke();
        it.ctx.closePath();
      }
          
      // White line
      it.ctx.beginPath();
      it.ctx.strokeStyle = "#fff";
      it.ctx.lineWidth = 3;
      it.ctx.moveTo(it.size / 2 + it.white_line_begin * Math.cos(angle), it.size / 2 + it.white_line_begin * Math.sin(angle));
      it.ctx.lineTo(it.size / 2 + it.white_line_end * Math.cos(angle), it.size / 2 + it.white_line_end * Math.sin(angle));
      it.ctx.stroke();
      it.ctx.closePath();
      
    }
    
    this.draw(value);
  }
  
  // Mousemove handler (for body)
  static mousemove(e){
    if(MiniKnob.currentKnob){
      
      // Detect touch, save finger's pageX and pageY as if it was a mouse event
      var pointerX = e.clientX;
      var pointerY = e.clientY;
      if(e.touches && e.touches[0]){
          pointerX = e.touches[0].clientX;
          pointerY = e.touches[0].clientY;
      }
      
      // Measure angle between mouse and knob and transform it:
      //
      //   Angle returned by atan2:   //     Angle transformed:
      //                              //
      //       --> -Pi   Pi <--       //      ---   Pi   <--- 
      //     /                  \     //    /                 \
      //     |                   |    //   |                   |
      //                              // 
      //    -Pi/2             Pi/2    //  3*Pi/2             Pi/2
      //                              // 
      //      ^                 ^     //    |                 ^
      //       \               /      //     \               /
      //        -----  0 -----        //      -> 2*PI    0 --
      
      var angle = Math.atan2(pointerX - MiniKnob.currentKnob.center.x, pointerY - MiniKnob.currentKnob.center.y);
      angle += 2* Math.PI;
      angle %= (2 * Math.PI);
      
      // Clamp angle between 0.55 (knob value 1) and 5.75 (knob value 0)
      if(angle > 5.75){
        angle = 5.75;
      }
      
      if(angle < 0.55){
        angle = 0.55;
      }
      
      // Transform angle into a value between 0 and 1
      var value = 1 - ((angle - 0.55) / 5.2);
      
      // Draw knob and call the callback function with this value
      MiniKnob.currentKnob.draw(value);
    }
  }
  
  // Mouseup handler (for body)
  static mouseup(e){
    if(MiniKnob.currentKnob){
      MiniKnob.currentKnob = null;
    }
  }
}

// Clear event listeners on window (if any)
document.body.removeEventListener("mousemove", MiniKnob.mousemove);
document.body.removeEventListener("touchmove", MiniKnob.mousemove);
document.body.removeEventListener("mouseup", MiniKnob.mouseup);
document.body.removeEventListener("touchend", MiniKnob.mouseup);

// Listen to mouse moves and ups on window when a knob is clicked
document.body.addEventListener("mousemove", MiniKnob.mousemove);
document.body.addEventListener("touchmove", MiniKnob.mousemove);
document.body.addEventListener("mouseup", MiniKnob.mouseup);
document.body.addEventListener("touchend", MiniKnob.mouseup);

// Rainbow image for big knob
MiniKnob.rainbow = new Image();
MiniKnob.rainbow.src = "rainbow.png";
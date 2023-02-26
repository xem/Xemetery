/* Global vars */
var x,                                          // Position of finger 1 on the screen
    vw,                                         // Viewport width
    sl,                                         // Value of scroll left
    dir;                                        // Sliding direction (-1: left, 0: none, 1: right)

/* Measure viewport width now and on orientation change */
vw = document.documentElement.clientWidth;
window.onorientationchange = function(e){ vw = document.documentElement.clientWidth; };

/* Reset scroll */
setTimeout( function(){ window.scrollTo(0, 0); }, 100);

/* Touch events */
document.ontouchstart = function(e){            // on touch
  x = e.touches[0].pageX;                       // save x as the finger's position on the page
};

document.ontouchmove = function(e){             // on move:
  e.preventDefault();                           // disable native scroll
  window.scrollTo(x - e.touches[0].clientX, 0); // scroll using the finger's position on the screen
  dir = x - e.touches[0].pageX;                 // detect direction using the finger's position on the page
  if(dir < 0) dir = -1;                         // convert it to -1 if it's negative
  if(dir > 0) dir = 1;                          // or 1 if it's positive
};

document.ontouchend = function(e){              // on touch end
  sl = document.body.scrollLeft;                // measure current scroll left
  sl += dir * vw / 3;                           // add/remove the third of a slide width
  $('body').animate(                            // smooth transition to the nearest slide
    {scrollLeft: vw * Math.round(sl/vw)},
    200
  );
  $("video").each(function(){
    this.pause();
  });
  $("video").get(Math.round(sl/vw) - 1).play();
};





// debug
//document.getElementById("test").innerHTML = "Slide 1<br>scroll:" + (x - e.touches[0].clientX) + "; direction:" + dir;
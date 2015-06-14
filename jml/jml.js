/* JML ~ Javascript Markup Language */

function _(text) { document.write(text); }              // JML uses this function to write the page.
_('<style id="jml_temp">html *{display:none}</style>'); // Add a temporary CSS page hider into the head
window.onload = function()                              // When the page is loaded
{
  b = document.body.innerHTML;                          // Save the body (JML code)
  document.body.innerHTML = "";                         // Empty the body
  var element = document.getElementById("jml_temp");    // Delete the temporary CSS mask
  element.parentNode.removeChild(element);
  _(b);                                                 // Process JML and write HTML
}
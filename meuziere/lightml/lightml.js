/** 
* LigHTML decompressor
* This file is included automatically at the beginning of lightml files
*/

// Hide everything
document.write("<style>*{display:none}</style>");

// When the page is loaded
window.onload = function(){

  // Set list of HTML5 tags
  var html_tags_1 = ["a","abbr","address","area","article","aside","NO","audio","b","bb","base","bdi","bdo","blockquote","body","br","button","canvas","caption","cite","code","col","colgroup","command","data","datagrid","datalist","dd","del","NO","NO","details","dfn"];
  var html_tags_2 = ["div","dl","dt","em","embed","NO","eventsource","fieldset","figcaption","figure","footer","form","h1","h2","NO","h3","h4","h5","h6","head","header","hgroup","hr","html","i","iframe","img","NO","input","ins","kbd","keygen","label"];
  var html_tags_3 = ["legend","li","link","mark","map","menu","NO","meta","meter","nav","noscript","object","ol","optgroup","option","output","p","param","pre","progress","q","ruby","rp","rt","s","samp","script","section","select","NO","small"];
  var html_tags_4 = ["source","span","strong","style","sub","summary","NO","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","u","ul","var","video","wbr"];

  // Get the LigHTML code (the body's content)
  var code_lightml = document.getElementsByTagName("body")[0].innerHTML;

  // Replace keywords starting with 0x01-0x0f with corresponding HTML5 tag
  var code_html = code_lightml
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "<" + html_tags_1[p1.charCodeAt(0) - 32] + ">"})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "<" + html_tags_1[p1.charCodeAt(0) - 32] + " "})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "</" + html_tags_1[p1.charCodeAt(0) - 32] + ">"})
                  
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 33); return "<" + html_tags_2[p1.charCodeAt(0) - 33] + ">"})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 33); return "<" + html_tags_2[p1.charCodeAt(0) - 33] + " "})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 33); return "</" + html_tags_2[p1.charCodeAt(0) - 33] + ">"})
                  
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "<" + html_tags_3[p1.charCodeAt(0) - 32] + ">"})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "<" + html_tags_3[p1.charCodeAt(0) - 32] + " "})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "</" + html_tags_3[p1.charCodeAt(0) - 32] + ">"})
                  
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "<" + html_tags_4[p1.charCodeAt(0) - 32] + ">"})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "<" + html_tags_4[p1.charCodeAt(0) - 32] + " "})
                  .replace(/(.)/g, function(match,p1){console.log(p1.charCodeAt(0) - 32); return "</" + html_tags_4[p1.charCodeAt(0) - 32] + ">"})
                  
                  .replace(/&gt;/g, ">")
                  .replace("<head>", "<head><style>*{margin:0;padding:0}</style>");
  
  // Write HTML
  console.log(code_lightml);
  console.log(code_html);
  document.write(code_html);
  document.close();
}
/** Basis JS for old IE **/

// Enable HTML5 elements display on IE < 9
'AbbrArticleAsideAudioBdiCanvasDataDatalistDetailsFigureFigcaptionFooterHeaderHgroupKeygenMainMathMarkMeterNavOutputProgressSectionSummarySvgTimeVideo'.replace(
	/.[a-z]+/g,
	function(n){
		document.createElement(n)
	}
);

// Add the classes "lt-ie7/8/9/10/11" on the <html> element on IE < 7/8/9/10/11
document.documentElement.className = navigator.userAgent.replace(
	/.*IE (\d+).*|.*/,
	function(a,b,c){
		c = "";
		if(b)
			for(a = 11; a > b; a--)
				c += " lt-ie" + a;
		return c
	}
);
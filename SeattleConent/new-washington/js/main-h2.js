jQuery(document).ready(function($){
//$(window).bind("load", function() {

	$("article h2, article h3, article h4, article h5, article h6").each(function(i,el) {
	//$('article h2').each(function(i,el){
				    el.id = 'anchor' + (i+1)
				      //  el.id = 'anchor' + (i+1)
				});
		var ToC =
		  "<div itemscope itemtype='http://schema.org/Table'>
		  <div itemscope itemtype='http://schema.org/ItemList'>
		  <nav role='navigation' class='table-of-contents'  >" +
		    "<h2 itemprop='about name'>Page Sections:</h2>" +
		    "<ul itemprop='itemListOrder' >";

		 var newLine, el, title, link, level, baseLevel;

		$("article h2, article h3, article h4, article h5, article h6").each(function() {

  	              el = $(this)

		  title = el.text();
		  link = "#" + el.attr("id");

var prevLevel = level || 0;
	level = this.nodeName.substr(1);
	if(!baseLevel) {
		baseLevel = level;
	}

	if(prevLevel == 0) {
		newLine = '<li itemprop=\"itemListElement\">';
	} else if(level == prevLevel) {
		newLine = '</li><li itemprop=\"itemListElement\">';
	} else if(level > prevLevel) {
		newLine = '<ul><li itemprop=\"itemListElement\">'.repeat(level - prevLevel);
	} else if(level < prevLevel) {
		newLine = '</li></ul>'.repeat(prevLevel - level) +
		'</li><li itemprop=\"itemListElement\">';
	}
	newLine += "<a itemprop=\"url\" href='" + link + "'><span  itemprop=\"name\">" + title + "</span></a>";

		  ToC += newLine;

		});

		ToC +=
		   "</ul>" +
		  "</nav> </div>   </div>  <br style=\"clear:both\" />";

		//$(".tablecontents").prepend(ToC);
		$(".linklist").prepend(ToC);
		   // code here

});
	jQuery(document).ready(function($){
// 		//$('body').flowtype({   minimum   : 500,   maximum   : 1200,   minFont   : 12,   maxFont   : 40,   fontRatio : 30});

// $("body").responsiveText();
// // $("p").responsiveText();
// // $("body p").responsiveText({    min: 13,    max: 20,    split: 50});
// $('body').flowtype({ fontRatio : 30});

$("article h2").before("<hr/>");

	$("div#questions ul li a").click(function(){
		var selected = $(this).attr('href');
		selected += '"'+selected+'"'
		$('.top-button').remove();
		$('.current-faq').removeClass();
		$.scrollTo(selected, 400 ,function(){
			$(selected).addClass('current-faq',400,function(){
				$(this).append('<a href="#" class="top-button">TOP</a>');
			});
		});
		return false;
	});
	$('.top-button').live('click',function(){
		$('.top-button').remove();
		$('.current-faq').removeClass('current-faq',400,function(){
			$.scrollTo('0px', 800);
		});
		return false;
	})
	$('.top-button').live('click',function(){
		$(this).remove();
		$('.current-faq').removeClass('current-faq',400,function(){
			$.scrollTo('0px', 800);
		});
		return false;
	})


				$('article h2').each(function(i,el){
				    el.id = 'anchor' + (i+1)
				      //  el.id = 'anchor' + (i+1)
				});


		var ToC =
		  "<div itemscope itemtype='http://schema.org/Table'><meta itemprop='mainContentOfPage' content='true'/><div itemscope itemtype='http://schema.org/ItemList'> <nav role='navigation' class='table-of-contents' itemscope itemtype='http://schema.org/SiteNavigationElement' >" +
		    "<h2 itemprop='about name'>On this page:</h2>" +
		    " <meta itemprop='itemListOrder' content='Descending' /><ul>";

		// var newLine, el, title, link;
		 var newLine, el, title, link, level, baseLevel;

		$("article h2, article h3, article h4, article h5, article h6").each(function() {

  	              el = $(this)

		  title = el.text();
		  link = "#" + el.attr("id");

var prevLevel = level || 0;
	level = this.nodeName.substr(1);
	if(!baseLevel) { // make sure you start with highest level of heading or it won't work
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
	newLine += "<a href='" + link + "'><span  itemprop=\"name\">" + title + "</span></a>";


		  // newLine =
		  //   "<li itemprop=\"itemListElement\">" +
		  //     "<a href='" + link + "'><span  itemprop=\"name\">" +
		  //       title +
		  //     "</span></a>" +
		  //   "</li>";

		  ToC += newLine;

		});

		ToC +=
		   "</ul>" +
		  "</nav> </div>   </div>  <br style=\"clear:both\" />";

		$(".tablecontents").prepend(ToC);



});

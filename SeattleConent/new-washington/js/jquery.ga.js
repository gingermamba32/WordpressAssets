(function($){
	var load = false;
	var queue = new Array();
	
	var gaPush = function(){
		if ((typeof _gaq != undefined) && load){
			_gaq.push(arguments[0]);
		} else if (!load) {
			queue.push(arguments[0]);
		} else {
			$.error('_gaq is undefined');
		}
	};

	$.ga = function(){
		if (typeof arguments[0] === 'object'){
			gaPush(arguments[0]);
		} else if (typeof arguments[0] === 'string'){
			var ua = arguments[0];
			gaPush(['_trackPageview']);
			$.ajax({type: 'GET', url: ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js', cache: true, dataType: 'script', data: null}).complete(function(){
				load = true;
				queue.unshift(['_setAccount', ua]);
				$.each(queue, function(ind){
					gaPush(queue[ind]);
				});
			});
		}
	};
	
	$.fn.ga = function(){
		if (typeof arguments[0] === 'string') {
			var event = arguments[0];
			var args = arguments[1];
			return this.each(function(){
				var $this = $(this);
				$this.bind(event + '.ga', function(){
					gaPush(args);
				});
			});
		} else {
			return this;
		}
	};
})(jQuery);
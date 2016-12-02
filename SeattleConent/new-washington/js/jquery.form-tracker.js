jQuery(document).ready(function(){
	$('form.track-me input[type="text"],form.track-me input[type="password"],form.track-me select,form.track-me textarea').each(function(){
		var $this = $(this), gaCat = $this.parents('form').attr('gaCat'), gaLabel = $this.attr('gaLabel');
		$this.bind('focus.formTracker', function(){
			focusTime = Date.parse(new Date())/1000;
		});
		$this.bind('blur.formTracker', function(){
			blurTime = Date.parse(new Date())/1000;
			gaValue = blurTime - focusTime;
			$.ga(['_trackEvent', gaCat, 'input_exit', gaLabel, gaValue]);
		});
	});
	$('form.track-me input[type="submit"]').each(function(){
		var $this = $(this), gaCat = $this.parents('form').attr('gaCat'), gaLabel = $this.attr('gaLabel');
		$this.bind('click', function(){
			$.ga(['_trackEvent', gaCat, 'submit', gaLabel]);
		});
	});

});
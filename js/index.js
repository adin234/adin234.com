var active = null;
var hideTime = 1300;
var showTime = 1300;


$('a', '.mainmenu').click(function() {
	if(!$(this).hasClass('active')) { 
		active = this;
		$('.section:visible').fadeOut(hideTime, function() {
			$('a', '.mainmenu').removeClass('active');  
			$(active).addClass('active');
			var newActive = $($(active).attr('href'));
			newActive.fadeIn(showTime);
		});
	}
	return false;
});	
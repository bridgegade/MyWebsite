$(function() {
	$('h4.alert').hide().fadeIn(700);
	$('<span class="exit">X</span>').appendTo('h4.alert');
	

	$('span.exit').click(function() {
		$('h4.alert').fadeOut('slow');						   
	});
	 $(":submit").mouseenter(function(){
        $(":submit").fadeTo("fast", 1);
    });
	$(":submit").mouseleave(function(){
        $(":submit").fadeTo("fast", .5);
    });
     $("#recover").mouseenter(function(){
        $("#recover").fadeTo("fast", 1);
    });
	$("#recover").mouseleave(function(){
        $("#recover").fadeTo("fast", .5);
    });
});

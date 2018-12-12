$(document).ready(function(){
	$('.product h3').each(function() {
        if($(this).text().length >= 40)
            $(this).text($(this).text().substr(0, 45) + '...');
    });
    $('.carousel .item h2').each(function() {
        if($(this).text().length >= 28)
            $(this).text($(this).text().substr(0, 28) + '...');
    });
});
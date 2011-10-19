
$(function() {
	
	// Tabs
	$('a', '[data-role="tabs"]').bind('click', function () {
		obj = $(this);
		// Set all off
		$('a', '[data-role="tabs"]').removeClass('selected');
		$('.tab').hide();
		// Set selected on
		obj.addClass('selected');
		$('#' + obj.attr('data-content')).show();
	});


	// Cambiar autor segun inicial
	$('[data-action="autor"]').bind('change', function () {
		letra = $(this).val();
		// Set all off
		$('[data-letra]').addClass('hide');
		// Set selected on
		$('[data-letra=' + letra + ']').removeClass('hide');
	});
	
	
	// Cambiar de listado por titulo segun inicial
	$('[data-action="titulo"]').bind('change', function () {
		letra = $(this).val();
		window.location.href = '/web/catalogo/titulo/' + letra;
	});



	
	

// Equal Height	

$('.equal').each(function() {
    
    var maxHeight = -1;
    obj = $(this).children('li');

	obj.each(function() {
		maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
	});

	obj.each(function() {
		$(this).height(maxHeight);
	});

});

	
	
});



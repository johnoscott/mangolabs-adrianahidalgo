
$(function() {
	
	$('[data-modal]').modal();

	// Leer mas en prensa
	$('.opinion-leer-mas').live('click', function(ev) {
		ev.preventDefault();		
		$('#opinion-'+$(this).attr('id_opinion')).show();
		$(this).hide();
		$('#opinion-leer-menos-'+$(this).attr('id_opinion')).show();
	});

	// Leer menos en prensa
	$('.opinion-leer-menos').live('click', function(ev) {
		ev.preventDefault();		
		$('#opinion-'+$(this).attr('id_opinion')).hide();
		$(this).hide();
		$('#opinion-leer-mas-'+$(this).attr('id_opinion')).show();
	});

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

	// Lightbox
	$('.ligthbox').lightBox(); // Select all links that contains lightbox in the attribute rel

//alert($('a[@rel*=lightbox]'));	

// Equal Height	
/*
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
*/
	
	
});



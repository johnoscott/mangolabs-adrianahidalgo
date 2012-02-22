(function($){

	$.fn.modal = function() {
		obj = this;
		obj.each(function() {
			$(this).click(function(e) {
				e.preventDefault();
				$.modal.show({url : $(this).attr('rel')});
			});
		});

	}
	
	$.modal = {};
	
	$.extend($.modal, {

		opt: {
			
			// The piece of html that we append to the body
			html : '<div class="modal" data-modal="wrap"><div data-modal="overlay" class="m-overlay"></div><div data-modal="box"><a class="m-close" data-modal="close"><span>Cerrar</span></a><div data-modal="container"><div data-modal="message" class="m-message"></div><div data-modal="controls" class="m-controls"></div></div></div></div>',
			
			// The set of buttons
			alert : '<button class="button" data-modal="close">Aceptar</button>',
			confirm : '<button class="button" data-modal="ok">Aceptar</button> <button class="button" data-modal="close">Cancelar</button>',
			
			// The selectors of the components
			wrap: '[data-modal=wrap]',
			box : '[data-modal=box]',
			message : '[data-modal=message]',
			container : '[data-modal=container]',
			controls : '[data-modal=controls]',
			ok : '[data-modal=ok]',
			close : '[data-modal=close]'
			
		},
		
		show : function(data) {
			
			// Create the box in the DOM
			$('body').append($.modal.opt.html);
			var box = $($.modal.opt.box);
			
			// Define the content
			if (data.alert) {
				$($.modal.opt.message).html(data.alert);
				$($.modal.opt.controls).html($.modal.opt.alert);
			} else if (data.confirm) {
				$($.modal.opt.message).html(data.confirm);
				$($.modal.opt.controls).html($.modal.opt.confirm);
			} else {
				$.ajax({
					url : data.url,
					async : false,
					success : function(res) { content = res }
				});
				$($.modal.opt.container).html(content);
			}
			
			// Get scroll position
			if (typeof(window.pageYOffset) == 'number') {
				var scroll = window.pageYOffset;
			} else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
				var scroll = document.body.scrollTop;
			}
			
			// Center the modal box and show it
			box
				.addClass('m-box')
				.css({
					'marginLeft' : '-' + (box.width() / 2) + 'px',
					'marginTop': (parseInt( '-' + (box.height() / 2)) + scroll) + 'px',
					'display': 'none'
				})
				.fadeIn();
				
			// Bind the OK and close buttons
			$($.modal.opt.ok).focus().live('click', function() {data.callback()});
			$($.modal.opt.close).live('click', function(e) {e.preventDefault(); $.modal.close()});
			
			// If ESC is pressed, close the modal
			$(window).keypress(function(e) { if (e.keyCode == 27) $.modal.close() });
			
		},

		close : function() {
			$($.modal.opt.wrap).remove();
		},
		
		/* Shortcuts */
		
		alert : function(p) {
			$.modal.show({alert : p});
		},
		
		confirm : function(p, o) {
			$.modal.show({confirm : p, callback: o});
		},
		
		load : function(p) {
			$.modal.show({url : p});
		},
		
	});
	
})(jQuery);
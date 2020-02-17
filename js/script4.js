$( document ).ready(function() {
	$('body').on('click', '.tab-panes .button',function() {
		var scrollTop = window.pageYOffset;

		$('.fixed-overlay').toggle("slow");
		$('body').css({
			'position':'fixed', 
			'overflow': 'hidden',
			'top': scrollTop
		});
     
	});

	$('body').on('click', '.fixed-overlay .close', function () {
		var bodyTop = $('body').css('top');

		$('.fixed-overlay').toggle("slow");
		$('body').removeAttr( 'style' );

		window.scrollTo(0, parseFloat(bodyTop));
	});

	$('body').on('click', '.interview-block-loader', function() {
		var button = $('.interview-block-loader');

		$('.interview-block.hide').toggle("slow");

		if ((button.text()).toLowerCase() == ('Загрузить ещё').toLowerCase()) {
			$(button).text('Скрыть');
		} else {
			$(button).text('Загрузить ещё');
		}
	});

	$('body').on('click', '.reviews-block-loader', function() {
		var button = $('.reviews-block-loader');

		$('.reviews-item.hide').toggle("slow");

		if ((button.text()).toLowerCase() == ('Загрузить ещё').toLowerCase()) {
			$(button).text('Скрыть');
		} else {
			$(button).text('Загрузить ещё');
		}
	});

	$('body').on('click', '.reviews-item-description .show', function() {
		var button = $(this);

		$(this).parent('.reviews-item-description').find('.hide').toggle("slow");

		if ((button.text()).toLowerCase() == ('«Читать весь отзыв»').toLowerCase()) {
			$(button).text('«Скрыть весь отзыв»');
		} else {
			$(button).text('«Читать весь отзыв»');
		}
	});

	$('body').on('click', '.js-successbox .close', function() {
		$(this).parent('.js-successbox').hide();
	});

        $('body').on('click', '.toggle-menu', function() {
		$(this).parent().find('.menu').toggle();
	});
});
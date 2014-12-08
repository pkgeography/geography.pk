;(function(p,k,g)	{

	p.pkgeography = p.pkgeography || g;

})(window, document, (function($)	{

	var pkg = {};

	pkg.backToTop =  function(e) {
		e.preventDefault();
		var $this = $(this);
		var $window = $(window);
		return $('html, body').animate({
			scrollTop: 0
		}, 600, 'linear').promise().done();
	};

	pkg.validate = function(e) {
		var formFields = {
			_name: $('#nameField'),
			_email: $('#emailField'),
			_enquiry: $('#enquiryField')
		};


		$('.gpk-form-alerts').remove();

		var notice = $('<p />', {
			'class': 'text-danger text-right gpk-form-alerts',
			'html': '<i class="fa fa-info-circle"></i> '
		});

		if ( formFields._name.val() === '' ) {
			notice.html( notice.html() + 'Please provide your name.' )
				.insertAfter(formFields._name)
				.hide()
				.slideDown();
			formFields._name.focus();
		}
		else if ( formFields._name.val() !== '' && formFields._name.val().length > 100 ) {
			notice.html( notice.html() + 'Given name is too long.' )
				.insertAfter(formFields._name)
				.hide()
				.slideDown();
			formFields._name.focus();
		}
		else if ( formFields._email.val() === '' ) {
			notice.html( notice.html() + 'A valid email is required.' )
				.insertAfter(formFields._email)
				.hide()
				.slideDown();
			formFields._email.focus();
		}
		else if ( formFields._email.val() !== '' && (!(new RegExp(/@/)).test(formFields._email.val()) || !(new RegExp(/\./)).test(formFields._email.val())) ) {
			notice.html( notice.html() + 'A valid email is required.' )
				.insertAfter(formFields._email)
				.hide()
				.slideDown();
			formFields._email.select();
		}
		else if ( formFields._enquiry.val() === '' ) {
			notice.html( notice.html() + 'Your message is required.' )
				.insertAfter(formFields._enquiry)
				.hide()
				.slideDown();
			formFields._enquiry.focus();
		}
		else if ( formFields._enquiry.val() !== '' && formFields._enquiry.val().length > 5000 ) {
			notice.html( notice.html() + 'Your message is bit too long... o.O' )
				.insertAfter(formFields._enquiry)
				.hide()
				.slideDown();
			formFields._enquiry.focus();
		}
		else {
			// return true;
		}

		return e.preventDefault();
	};

	pkg.init = function() {

		// Back to top
		$('.gpk-back-to-top').on('click', pkg.backToTop);

		// Track click event
		$('a[rel=bookmark], a[rel=author], a[rel=home]').on('click', function(e)	{
			var $this = $(this);
			var annotate = $this.text().toLowerCase();
			annotate = annotate.replace(/[^a-z0-9\s]/gi, '');
			annotate = annotate.replace(/\s/gi, '-');
			annotate = annotate.replace(/([-]{3,})/gi, '-');

			// Track event
			if (typeof ga !== 'undefined')
				ga('send', 'event', 'a--rel-Bookmark-Author', annotate);

		});

		// Toggle mobile navigation menu
		$('.gpk-mobile-nav-btn').on('click', function(e) {
			e.preventDefault();
			$('.gpk-mobile-nav').slideToggle();
		});


		// Form client-side validation
		$('#submitEnquiry').on('click', pkg.validate);

	};

	return pkg;

})(jQuery));


jQuery(document).ready(pkgeography.init);
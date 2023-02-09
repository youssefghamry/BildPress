(function($) {
  "use strict";
  
	$(document).ready(function(){

		/** white logo **/

		$('button#primary_logo_info').on('click', (function( e ){
			e.preventDefault();

			var imageUploader = wp.media({
				'title'		: 'Upload White Logo',
				'button'	: {
					'text'		: 'Set White Logo'
				},
				'multiple'	: false
			});

			imageUploader.open();

			imageUploader.on('select', function(){
				var image = imageUploader.state().get("selection").first().toJSON();

				var link = image.url;

				$('input.primary_logo_link').val( link );
				$('.primary-logo-show img').attr( 'src', link );

			});

		}));


		/** dark logo **/

		$('button#dark_logo_info').on('click', (function( e ){
			e.preventDefault();

			var imageUploader = wp.media({
				'title'		: 'Upload Dark Logo',
				'button'	: {
					'text'		: 'Set Dark Logo'
				},
				'multiple'	: false
			});

			imageUploader.open();

			imageUploader.on('select', function(){
				var image = imageUploader.state().get("selection").first().toJSON();

				var link = image.url;

				$('input.dark_logo_link').val( link );
				$('.dark-logo-show img').attr( 'src', link );

			});

		}));


		/** others info **/
		$('button#author_info_image').on('click', (function( e ){
			e.preventDefault();

			var imageUploader = wp.media({
				'title'		: 'Upload  Image',
				'button'	: {
					'text'		: 'Set  Image'
				},
				'multiple'	: false
			});

			imageUploader.open();

			var button = $(this);

			imageUploader.on('select', function(){
				var image = imageUploader.state().get("selection").first().toJSON();

				var link = image.url;

				button.next('input.image_er_link').val( link );
				button.parent('.widget_field').find('img').attr( 'src', link );
			});
		}));


	});
})(jQuery); 
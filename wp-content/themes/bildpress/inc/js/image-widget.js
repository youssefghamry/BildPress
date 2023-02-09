(function($) {
  "use strict";

	rianaWidget = {

		// Call this from the upload button to initiate the upload frame.
		uploader : function( widget_id, widget_id_string ) {
			
			var frame = wp.media({
				title : TribeImageWidget.frame_title,
				multiple : false,
				library : { type : 'image' },
				button : { text : TribeImageWidget.button_title }
			});
			// Handle results from media manager.
			frame.on('close',function( ) {
				var attachments = frame.state().get('selection').toJSON();
				rianaWidget.render( widget_id, widget_id_string, attachments[0] );
			});
			
			frame.open();
			return false;
		},

		// Output Image preview and populate widget form.
		render : function( widget_id, widget_id_string, attachment ) {
			
			$("#" + widget_id_string + 'preview').html(rianaWidget.imgHTML( attachment ));

			$("#" + widget_id_string + 'fields').slideDown();

			$("#" + widget_id_string + 'attachment_id').val(attachment.id);
			$("#" + widget_id_string + 'imageurl').val(attachment.url);
			$("#" + widget_id_string + 'aspect_ratio').val(attachment.width/attachment.height);
			$("#" + widget_id_string + 'width').val(attachment.width);
			$("#" + widget_id_string + 'height').val(attachment.height);

			$("#" + widget_id_string + 'size').val('full');
			$("#" + widget_id_string + 'custom_size_selector').slideDown();
			rianaWidget.toggleSizes( widget_id, widget_id_string );
		},

		// Update input fields if it is empty
		updateInputIfEmpty : function( widget_id_string, name, value ) {
			var field = $("#" + widget_id_string + name);
			if ( field.val() == '' ) {
				field.val(value);
			}
		},

		// Render html for the image.
		imgHTML : function( attachment ) {
			var img_html = '<img src="' + attachment.url + '" ';
			img_html += 'width="' + 300 + '" ';
			img_html += 'height="' + 300 + '" ';
			if ( attachment.alt != '' ) {
				img_html += 'alt="' + attachment.alt + '" ';
			}
			img_html += '/>';
			return img_html;
		},

		// Hide or display the WordPress image size fields depending on if 'Custom' is selected.
		toggleSizes : function( widget_id, widget_id_string ) {
			if ( $( '#' + widget_id_string + 'size' ).val() == 'tribe_image_widget_custom' ) {
				$( '#' + widget_id_string + 'custom_size_fields').slideDown();
			} else {
				$( '#' + widget_id_string + 'custom_size_fields').slideUp();
			}
		},

		// Update the image height based on the image width.
		changeImgWidth : function( widget_id, widget_id_string ) {
			var aspectRatio = $("#" + widget_id_string + 'aspect_ratio').val();
			if ( aspectRatio ) {
				var width = $( '#' + widget_id_string + 'width' ).val();
				var height = Math.round( width / aspectRatio );
				$( '#' + widget_id_string + 'height' ).val(height);
				//rianaWidget.changeImgSize( widget_id, widget_id_string, width, height );
			}
		},

		// Update the image width based on the image height.
		changeImgHeight : function( widget_id, widget_id_string ) {
			var aspectRatio = $("#" + widget_id_string + 'aspect_ratio').val();
			if ( aspectRatio ) {
				var height = $( '#' + widget_id_string + 'height' ).val();
				var width = Math.round( height * aspectRatio );
				$( '#' + widget_id_string + 'width' ).val(width);
				//rianaWidget.changeImgSize( widget_id, widget_id_string, width, height );
			}
		}

	};

})(jQuery);
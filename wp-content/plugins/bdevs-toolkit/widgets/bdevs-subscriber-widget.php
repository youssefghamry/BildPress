<?php
	/**
	 * Medodove Social Widget
	 *
	 *
	 * @author 		basictheme
	 * @category 	Widgets
	 * @package 	Medodove/Widgets
	 * @version 	1.0.1
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_subscriber_widget');
	function bdevs_subscriber_widget() {
		register_widget('bdevs_subscriber_widget');
	}
	
	
	class Bdevs_Subscriber_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_subscriber_widget',esc_html__('BildPress Subscriber','bdevs-toolkit'),array(
				'description' => esc_html__('BildPress Subscriber Widget','bdevs-toolkit'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
			extract($instance);
		 	print $before_widget; 

		 	if ( ! empty( $title ) ) {
				print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			}
		?>

				<?php if( !empty($mailchimp_shortcode) ): ?>	
                <div class="newslater-wrap">
                    <div class="newslater-form">
		            	<?php print do_shortcode($mailchimp_shortcode); ?>
                	</div>
                </div>
                <?php endif; ?>
                
                <div class="social-links">
                	<?php if( !empty($social_heading) ): ?>	
                	<h4 class="title"><?php print wp_kses_post($social_heading); ?></h4>
                	<?php endif; ?>

                	<?php if( !empty($facebook) ): ?>
                    <a href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
                	<?php endif; ?>

					<?php if( !empty($twitter) ): ?>
                    <a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>

					<?php if( !empty($instagram) ): ?>
                    <a href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a>
					<?php endif; ?>


					<?php if( !empty($linkedin) ): ?>	
                    <a href="<?php print esc_url($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a>
                	<?php endif; ?>

					<?php if( !empty($youtube) ): ?>	
                    <a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a>
                	<?php endif; ?>
                	<p></p>
                </div>
                
 

	    	<?php print $after_widget; ?>  

		<?php
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$mailchimp_shortcode  = isset($instance['mailchimp_shortcode'])? $instance['mailchimp_shortcode']:'';

			$social_heading  = isset($instance['social_heading'])? $instance['social_heading']:'';
			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';
			$youtube  = isset($instance['youtube'])? $instance['youtube']:'';
			$linkedin  = isset($instance['linkedin'])? $instance['linkedin']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Mailchimp Shortcode:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">

			<p>
				<label for="title"><?php esc_html_e('Social Title','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('social_heading')); ?>"  name="<?php print esc_attr($this->get_field_name('social_heading')); ?>" class="widefat" value="<?php print esc_attr($social_heading); ?>">

			<p>
				<label for="title"><?php esc_html_e('Facebook:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">


			<p>
				<label for="title"><?php esc_html_e('Twitter:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Instagram:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" value="<?php print esc_attr($instagram); ?>">
			<p>
				<label for="title"><?php esc_html_e('Youtube:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('youtube')); ?>"  name="<?php print esc_attr($this->get_field_name('youtube')); ?>" value="<?php print esc_attr($youtube); ?>">

			<p>
				<label for="title"><?php esc_html_e('linkedin:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('linkedin')); ?>"  name="<?php print esc_attr($this->get_field_name('linkedin')); ?>" value="<?php print esc_attr($linkedin); ?>">
			
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['subscribe_style'] = ( ! empty( $new_instance['subscribe_style'] ) ) ? strip_tags( $new_instance['subscribe_style'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';


			$instance['social_heading'] = ( ! empty( $new_instance['social_heading'] ) ) ? strip_tags( $new_instance['social_heading'] ) : '';
			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
			$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
			$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
			return $instance;
		}
	}
<?php
	/**
	 * Contact Info Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	pohat/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'kingfact_contact_info_widget');
	function kingfact_contact_info_widget() {
		register_widget('kingfact_contact_info_widget');
	}
	
	
	class Kingfact_Contact_Info_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('kingfact_contact_info_widget',esc_html__('BildPress Contact Info', 'bdevs-toolkit'),array(
				'description' => esc_html__('BildPress Contact Info Widget', 'bdevs-toolkit'),
			));
		}
		
		public function widget($args, $instance){
			extract($args);
			extract($instance);
			

			 print $before_widget; 
                                 
		        if ( ! empty( $title ) ) {
					print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
				}
		?>

                    <ul class="footer-info">
	                    <?php 
                    	if($address): ?>
                        	<li><span><i class="far fa-map-marker-alt"></i> <?php print esc_html($address); ?></span></li>
                        <?php 
						endif; ?>

						<?php 
						if($email): ?>
                        	<li><span><i class="far fa-envelope-open"></i> <?php print esc_html($email); ?></span></li>
                        <?php 
                    	endif; ?>

                       	<?php 
						if($phone_number): ?>
                            <li><span><i class="far fa-phone"></i> <?php print esc_html($phone_number); ?></span></li>
                        <?php 
						endif; ?>  

						<?php 
						if($website): ?>
                        	<li><span><i class="far fa-paper-plane"></i> <?php print esc_html($website); ?></span></li>
                        <?php 
                        endif; ?> 	
                    </ul>

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
			$address  = isset($instance['address'])? $instance['address']:'';
			$email  = isset($instance['email'])? $instance['email']:'';
			$phone_number  = isset($instance['phone_number'])? $instance['phone_number']:'';
			$website  = isset($instance['website'])? $instance['website']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" class="widefat" value="<?php print esc_attr($title); ?>">


			<p>
				<label for="title"><?php esc_html_e('Address:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('address')); ?>"  name="<?php print esc_attr($this->get_field_name('address')); ?>" class="widefat" value="<?php print esc_attr($address); ?>">

			<p>
				<label for="title"><?php esc_html_e('Email Address:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('email')); ?>"  name="<?php print esc_attr($this->get_field_name('email')); ?>" class="widefat" value="<?php print esc_attr($email); ?>">

			<p>
				<label for="title"><?php esc_html_e('Phone Number:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('phone_number')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number')); ?>" class="widefat" value="<?php print esc_attr($phone_number); ?>">

			<p>
				<label for="title"><?php esc_html_e('Website Url:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('website')); ?>"  name="<?php print esc_attr($this->get_field_name('website')); ?>" class="widefat" value="<?php print esc_attr($website); ?>">
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
			$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
			$instance['phone_number'] = ( ! empty( $new_instance['phone_number'] ) ) ? strip_tags( $new_instance['phone_number'] ) : '';
			$instance['website'] = ( ! empty( $new_instance['website'] ) ) ? strip_tags( $new_instance['website'] ) : '';

			return $instance;
		}
	}